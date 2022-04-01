<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Mail\notificationmail;
use App\Mail\contactmail;
use Illuminate\Support\Facades\Mail;
use App\member;
use App\favorite_item;
use App\item;
use App\item_image;
use App\order;
use App\order_item;
use App\setting;
use App\notification;
use App\following;
use App\ad_image;
use Carbon\Carbon;
use App\cart;
use App\member_location;
use App\member_suggestion;
use App\country_area;
use DB;


class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // myprofil information
    public function index()
    {
        $mainactive  = 'myprofile';
        $myprofile   = member::find(Auth()->user()->id);
        $mylocations = member_location::where('user_id',auth()->user()->id)->get();
        $countries   = country_area::where('parent',0)->get();
        $cities      = country_area::where('parent',auth()->user()->country)->get();
        $areas       = country_area::where('parent',auth()->user()->city)->get();
        $myorders          = order::where('user_id',Auth()->user()->id)->orderBy('id','desc')->get();
        $favouriteitems_ids = favorite_item::where('user_id',auth()->user()->id)->pluck('item_id')->toArray();
        $favouriteitems = item::whereIn('id', $favouriteitems_ids)->get();
        return view('front.profile.myprofile',compact('mainactive','myprofile','mylocations','countries','cities','areas', 'myorders', 'favouriteitems' ));
    }

    // myorders
    public function index2()
    {
        $mainactive        = 'myorders';
        $mytotal           = 0;
        $errormessage      = '';
        $myorders          = order::where('user_id',Auth()->user()->id)->orderBy('id','desc')->get();
        if(count($myorders) == 0)
        {
            $errormessage = session('locale') == 'en' ? 'No Orders Found' : 'لا يوجد طلبات' ;
        }
        return view('front.profile.myorders',compact('mainactive','myorders','mytotal','errormessage'));
    }

    // show order
    public function showorder($id)
    {
        $mainactive        = 'showorder';
        $showorder         = order::where('id',$id)->where('user_id',Auth()->user()->id)->orderBy('id','desc')->first();
        if($showorder)
        {
            $orderitems        = order_item::where('order_id',$id)->get();
        }
        else
        {
            return redirect('myorders');
        }

        return view('front.profile.showorder',compact('mainactive','orderitems'));
    }

    // mybills
    public function index5()
    {
        $mainactive        = 'mybills';
        $mytotal           = 0;
        $errormessage      = '';
        $mybills           = order::where('user_id',Auth()->user()->id)->orderBy('id','desc')->get();
        if(count($mybills) == 0)
        {
            $errormessage = session('locale') == 'en' ? 'No Bills Found' : 'لا يوجد فواتير' ;
        }
        return view('front.profile.mybills',compact('mainactive','mybills','mytotal','errormessage'));
    }

    // myfavoriteitems
    public function index3(Request $request)
    {
        $mainactive     = 'myfavorites';
        $errormessage   = '';
        $favouriteitems = array();
        $favitems       = favorite_item::where('user_id',Auth()->user()->id)->orderBy('id','desc')->get();
            if(count($favitems) == 0)
            {
              $errormessage = session('locale') == 'ar' ? 'لا يوجد منتجات ف المفضلة' : 'There are no favorite products';
            }
            else
            {
              $lang      = session('locale') == 'ar' ? 'ar' : 'en';
              foreach($favitems as $item)
              {
                $allfavads[] = item::where('id',$item->item_id)->first();
              }

              foreach($allfavads as $item)
              {
                $image     = item_image::where('item_id',$item->id)->first();
                $favorited = 0;

                $fav = DB::table('favorite_items')->where('user_id',$request->user_id)->where('item_id',$item->id)->get();
                $favorited = count($fav) != 0 ? 1 : 0;

                array_push($favouriteitems,
                array(
                    "id"              => $item->id,
                    'image'           => $image->image,
                    'title'           => $item[$lang.'title'],
                    "price"           => $item->price,
                    "offer"           => $item->offer,
                    "discountprice"   => $item->discountprice,
                    'favorited'       => $favorited,
                    ));
              }
            }
            return view('front.profile.myfavorites',compact('mainactive','favouriteitems','errormessage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $updateinfo   = member::where('id',auth()->user()->id)->first();

        if(Input::has('oldpassword'))
        {
            $this->validate($request,
            [
                'oldpassword'                 => 'required',
                'password'                    => 'required|min:8',
                'password_confirmation'       => 'required|same:password',
            ],
            [
                'oldpassword.required'      => session('locale')     == 'en'     ?  'The :attribute field is required.'              : ' هذا الحقل مطلوب',
                'password.required'         => session('locale')     == 'en'     ?  'The :attribute field is required.'              : ' هذا الحقل مطلوب',
                'password.min'              => session('locale')     == 'en'     ?  'The :attribute must be at least :min.'          : ' كلمة المرور لا تقل عن 8 احرف',
                'password.same'             => session('locale')     == 'en'     ?  'The :attribute confirmation does not match.'    : 'كلمة المرور غير متطابقة',
            ]);

            if(Hash::check($request->password,$updateinfo->password))
            {
                $hashpassword =  Hash::make($request['password']);
                member::where('id',$updateinfo->id)->update(['password' => $hashpassword]);
                session()->flash('success', 'تم تغيير كلمة المرور بنجاح');
            } else {
                session()->flash('error', 'كلمة المرور الحالية غير متطابقة');
            }
        }
        elseif(Input::has('addnewlocation'))
        {
            $data        = $request->all();
            $data['user_id'] = auth()->user()->id;
            member_location::create($data);
            session()->flash('success', 'تم الحفظ بنجاح');
            return back();
        }
        elseif(Input::has('addnewsuggestion'))
        {
            $data            = $request->all();
            $data['user_id'] = auth()->user()->id;
            member_suggestion::create($data);
            session()->flash('success', 'تم إرسال الإقتراح بنجاح');
            return back();
        }
        else
        {
            $this->validate($request, [
                'phone'       => 'unique:members,phone,'.$updateinfo->id,
                'email'       => 'unique:members,email,'.$updateinfo->id,
            ],
            [
                'phone.unique'          => session('locale') == 'en' ?  'The :attribute has already been taken.'  : 'تم اخذ رقم الجوال سابقا',
                'email.unique'          => session('locale') == 'en' ?  'The :attribute has already been taken.'  : 'تم اخذ البريد الإلكترونى سابقا',
            ]);

            $data = $request->all();
            $updateinfo->update($data);
            session()->flash('success', 'تم تحديث البيانات بنجاح');
        }
        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Input::has('updateuserlocation'))
        {
            $mylocation = member_location::where('id',$id)->where('user_id',auth()->user()->id)->first();
            if($mylocation)
            {
                $data        = $request->all();
                $mylocation->update($data);
                session()->flash('success', 'تم التعديل بنجاح');
            }
            return back();
        }
    }

    public function makeReturn(Request $request, $id)
    {
        $uporder = order::find($id);
        if(Input::has('status') && $request->status==4)
        {
            DB::table('orders')->where('id',$id)->update(['status' => 4]);
            $notification                = new notification();
            $notification->user_id       = $uporder->user_id;
            $notification->notification  = 'تم عمل طلب ارتجاع ';
            $notification->save();
            $usertoken = member::where('id',$uporder->user_id)->where('firebase_token','!=',null)->where('firebase_token','!=',0)->value('firebase_token');
            if($usertoken)
            {
                $optionBuilder = new OptionsBuilder();
                $optionBuilder->setTimeToLive(60*20);

                $notificationBuilder = new PayloadNotificationBuilder('قبول الطلب');
                $notificationBuilder->setBody($request->notification)
                                    ->setSound('default');

                $dataBuilder = new PayloadDataBuilder();
                $dataBuilder->addData(['a_type' => 'message']);
                $option       = $optionBuilder->build();
                $notification = $notificationBuilder->build();
                $data         = $dataBuilder->build();
                $token        = $usertoken ;

                $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

                $downstreamResponse->numberSuccess();
                $downstreamResponse->numberFailure();
                $downstreamResponse->numberModification();
                $downstreamResponse->tokensToDelete();
                $downstreamResponse->tokensToModify();
                $downstreamResponse->tokensToRetry();
            }
            session()->flash('success','تم عمل طلب ارتجاع بنجاح');
            return back();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Input::has('deletelocation'))
        {
            $mylocation = member_location::where('id',$id)->where('user_id',auth()->user()->id)->first();
            if($mylocation)
            {
                $mylocation->delete();
                session()->flash('success', 'تم الحذف بنجاح');
            }
            return back();
        }
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Mail\contactmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendemail;
use App\member;  
use App\item; 
use App\order;
use App\favorite_item;
use App\country_area;
use App\member_location;
use App\wallet_transaction;
use App\member_suggestion;
use App\rate;
use App\category;
use Carbon\Carbon;
use DB;  


class adminvendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  
    {
        $mainactive = 'vendors';
        $subactive  = 'vendors';
        $logo       = DB::table('settings')->value('logo');
        $allvendors = member::where('role',1)->where('activate',1)->orderBy('id','desc')->get();
        return view('admin.vendors.index2',compact('mainactive','subactive','logo','allvendors'));
    }

    public function index2()  
    {
        $mainactive = 'vendors';
        $subactive  = 'newvendors';
        $logo       = DB::table('settings')->value('logo');
        $allvendors = member::where('role',1)->where('activate',0)->orderBy('id','desc')->get();
        return view('admin.vendors.index',compact('mainactive','subactive','logo','allvendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainactive = 'vendors';
        $subactive  = 'addvendor';
        $logo       = DB::table('settings')->value('logo');
        $countries  = country_area::where('parent',0)->get();
        $categories = category::where('parent',0)->get();
        return view('admin.vendors.create',compact('mainactive','logo','subactive','countries','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'company'         => 'required',
            'name'            => 'required',
            'phone'           => 'required|unique:members',
            'email'           => 'required|email|unique:members',
            'job'             => 'required',
            'country'         => 'required',
            'city'            => 'required',
            'area'            => 'required',
            'classfication'   => 'required',
            'password'        => 'required|min:8|confirmed',
        ]);

        $data               = $request->all();
        $classfications     = $request->classfication;
        $classficationarray = array();
        foreach($classfications as $classfication)
        {
            array_push($classficationarray,$classfication);
            $strclassfication = join(",", $classficationarray);
        }
        $data['classfication'] = $strclassfication;
        $data['role']          = 1;
        $data['activate']      = 1;
        $data['type']          = 'email';
        $data['password']      = Hash::make($data['password']);
        $traderinfo            = member::create($data);
        session()->flash('success','تم إضافة تاجر بنجاح');
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
        $mainactive        = 'vendors';
        $subactive         = 'vendors';
        $logo              = DB::table('settings')->value('logo');
        $showuser          = member::findorfail($id);
        $mylocations       = member_location::where('user_id',$id)->get();
        $myorders          = order::where('user_id',$id)->orderBy('id','desc')->get();
        $myfavourites      = favorite_item::where('user_id',$id)->orderBy('id','desc')->get();
        $mytotal           = 0 ;
        $usercountry       = country_area::where('id',$showuser->country)->first();
        $usercity          = country_area::where('id',$showuser->city)->first();
        $userarea          = country_area::where('id',$showuser->area)->first();
        $userdeposites     = wallet_transaction::where('user_id',$id)->where('type','d')->get();
        $userdepositesar   = wallet_transaction::where('user_id',$id)->where('type','d')->sum('value');
        $userwithdraws     = wallet_transaction::where('user_id',$id)->where('type','w')->get();
        $userwithdrawsar   = wallet_transaction::where('user_id',$id)->where('type','w')->sum('value');
        $userrecoveries    = wallet_transaction::where('user_id',$id)->where('type','r')->get();
        $userrecoverysar   = wallet_transaction::where('user_id',$id)->where('type','r')->sum('value');
        $myrates           = rate::where('user_id',$id)->orderby('created_date','desc')->get();
        $mysuggetions      = member_suggestion::where('user_id',$id)->orderby('created_at','desc')->get();

        return view('admin.vendors.show',compact('mainactive','subactive','logo','showuser','mylocations','myorders','myfavourites','mytotal','usercountry','usercity','userarea',
        'userdeposites','userdepositesar','userwithdraws','userwithdrawsar','userrecoveries','userrecoverysar','myrates','mysuggetions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mainactive = 'vendors';
        $subactive  = 'vendors';
        $logo       = DB::table('settings')->value('logo');
        $eduser     = member::findorfail($id);
        $countries  = country_area::where('parent',0)->get();
        $cities     = country_area::where('parent',$eduser->country)->get();
        $areas      = country_area::where('parent',$eduser->city)->get();
        $categories = category::where('parent',0)->get();
        $selectedclassfications =  explode(",",$eduser->classfication);
        return view('admin.vendors.edit',compact('mainactive','subactive','logo','eduser','countries','cities','areas','categories','selectedclassfications'));
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
        $upmember = member::find($id);

        if(Input::has('suspensed'))
        {
            if($upmember->suspensed == 0)
            {
                DB::table('members')->where('id',$id)->update(['suspensed' => 1]);
                session()->flash('success','تم تعطيل عضوية العضو بنجاح');
                return back();
            }
            else 
            {
                DB::table('members')->where('id',$id)->update(['suspensed' => 0]);
                session()->flash('success','تم تفعيل عضوية العضو بنجاح');
                return back();
            }
        }
        elseif(Input::has('accept'))
        {
            DB::table('members')->where('id',$id)->update(['activate' => 1]);
            $logo       = DB::table('settings')->value('logo');
            $mytemplate = '<!DOCTYPE html>
                            <html lang="en">
                                <body>
                                    <head>
                                        <div class="content">
                                            <div class="img_cont">
                                                <img class="logo" src="'.asset("users/images/".$logo).'">
                                            </div>

                                            <h2>شكرا لانضمامك إلى إيلف</h2>
                                            <h3>ابدأ البيع الآن حيث يتسوق الملايين من المشترين يومياً </h3>
                                            
                                            <section>
                                                <div>
                                                    <p> يمكنك تسجيل الدخول باستخدام عنوان بريدك الإلكتروني</p>
                                                    <span>( '.$upmember->email.' )</span>
                                                </div>
                                                <a target="_blank" href="'.asset('login').'" class="confirm">حسابي</a>
                                            </section>
                                        </div>
                                    </head>
                                </body>
                            </html>';
            Mail::to($upmember->email)->send(new sendemail($upmember->email,$mytemplate));
            session()->flash('success','تم القبول بنجاح');
            return back();
        }
        elseif(Input::has('deposite'))
        {
            DB::table('members')->where('id',$id)->increment('wallet',$request->deposite);
            $newwallet_transaction          = new wallet_transaction;
            $newwallet_transaction->user_id = $id;
            $newwallet_transaction->value   = $request->deposite;
            $newwallet_transaction->type    = 'd';
            $newwallet_transaction->save();
            session()->flash('success','تم إيداع المبلغ بنجاح');
            return back();
        }
        else 
        {
            $this->validate($request,[
                'company'         => 'required',
                'name'            => 'required',
                'phone'           => 'required|unique:members,phone,'.$id,
                'email'           => 'required|unique:members,email,'.$id,
                'job'             => 'required',
                'country'         => 'required',
                'city'            => 'required',
                'area'            => 'required',
                'classfication'   => 'required',
            ]);

            $data               = $request->all();
            $classfications     = $request->classfication;
            $classficationarray = array();
            foreach($classfications as $classfication)
            {
                array_push($classficationarray,$classfication);
                $strclassfication = join(",", $classficationarray);
            }
            $data['classfication'] = $strclassfication;
            $data['password']      = $request['password'] ? Hash::make($request['password']) : $upmember->password;
            $upmember->update($data);
            session()->flash('success','تم تعديل بيانات التاجر بنجاح');
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
        if(Input::has('delrate'))
        {
            rate::where('id',$id)->delete();
            session()->flash('success','تم الحذف بنجاح');
            return back();
        }
        elseif(Input::has('dellocation'))
        {
            member_location::where('id',$id)->delete();
            session()->flash('success','تم الحذف بنجاح');
            return back();
        }
        elseif(Input::has('delsuggetion'))
        {
            member_suggestion::where('id',$id)->delete();
            session()->flash('success','تم الحذف بنجاح');
            return back();
        }
        else 
        {
            $deluser = member::find($id);
            if($deluser)
            {
                $deluser->delete();
                session()->flash('success','تم حذف العضو بنجاح');
            }
            return back();
        }    
    }
}

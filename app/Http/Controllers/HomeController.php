<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
use Auth;
use Session;
use App\slider;
use App\item;
use App\item_image;
use App\setting;
use App\category;
use App\subscriped_email;
use App\member;
use App\notification;
use App\favorite_item;
use App\item_feature;
use App\country_area;
use App\category_feature;
use App\feature;
use App\coupon;
use App\order;

class HomeController extends Controller
{
    public function index()
    {
        $lang   = session('locale') == 'en' ? 'en' : 'ar';
        $allsliders    = slider::where('suspensed',0)->get();
        $slideritems   = item::where('suspensed',0)->orderBy('id','desc')->limit(2)->get();
        $lastitems     = item::where('suspensed',0)->whereNull('before_price')->orderBy('id','desc')->limit(6)->get();
        $items         = item::where('suspensed',0)->orderBy('id','asc')->limit(6)->get();
        $discounted_items    = item::where('suspensed',0)->where('before_price', '>', 0)->orderBy('id','asc')->limit(6)->get();
        $allcategories = category::all();
        $specialcats = category::where('special', 1)->get();
        $users_num = member::count();
        $purchases_num = order::count();
        $products_num = item::count();
        $setting = setting::first();
        $home_cats = category::with(['items' => function ($query) {
            $query->take(6);
        }])
        ->where(['parent' => 0, 'view_at_home' => 1])
        ->whereHas('items')
        ->limit('3')->get();

        return view('front.home',compact('lang', 'allsliders','slideritems','lastitems','allcategories', 'specialcats', 'items', 'users_num', 'purchases_num', 'products_num', 'setting', 'home_cats', 'discounted_items' ));
    }

    public function search($id)
    {
        $allsliders    = slider::where('suspensed',0)->get();
        $category            =  Input::get('CAT');
        $subcategory         =  Input::get('SCAT');
        $subsubcategory      =  Input::get('SSCAT');
        $keyword             =  Input::get('keyword');
        $categoryinfo        = category::where('encategory',$id)->first();
        $includedcategories  = category::where('parent',$category)->get();
        $includedsubcats     = category::where('parent',$subcategory)->get();
        $discounted_items    = item::where('suspensed',0)->where('before_price', '>', 0)->orderBy('id','asc')->limit(8)->get();


        $results    = item::when($category, function ($query) use ($category) {
                            return $query->where('category',$category);
                        })->when($subcategory, function ($query) use ($subcategory) {
                            return $query->where('subcategory',$subcategory);
                        })->when($subsubcategory, function ($query) use ($subsubcategory) {
                            return $query->where('subsubcategory',$subsubcategory);
                        })->when($keyword, function ($query) use ($keyword) {
                            return $query->where('artitle', 'LIKE', '%'.$keyword.'%')
                                    ->orWhere('entitle', 'LIKE', '%'.$keyword.'%')
                                    ->orWhere('ardesc', 'LIKE', '%'.$keyword.'%')
                                    ->orWhere('endesc', 'LIKE', '%'.$keyword.'%');
                        })->where('suspensed',0)->orderBy('id','desc')->paginate(6);

        $parentcatfeatures  = category_feature::where('category',$subcategory)->pluck('parentfeature')->toArray();
        $subcatfeatures     = category_feature::where('category',$subcategory)->pluck('feature')->toArray();
        $parentfeatures     = feature::whereIn('id',$parentcatfeatures)->get();
        $subfeatures        = feature::whereIn('id',$subcatfeatures)->get();

        return view('front.items.index',compact('allsliders', 'results','categoryinfo','category','subcategory','subsubcategory','keyword',
        'includedcategories','includedsubcats','parentfeatures','subfeatures', 'discounted_items'));
    }

    public function search2()
    {
        $allsliders    = slider::where('suspensed',0)->get();
        $keyword             =  Input::get('keyword');
        $discounted_items    = item::where('suspensed',0)->where('before_price', '>', 0)->orderBy('id','asc')->limit(8)->get();


        $results    = item::when($keyword, function ($query) use ($keyword) {
                            return $query->where('artitle', 'LIKE', '%'.$keyword.'%')
                                    ->orWhere('entitle', 'LIKE', '%'.$keyword.'%')
                                    ->orWhere('ardesc', 'LIKE', '%'.$keyword.'%')
                                    ->orWhere('endesc', 'LIKE', '%'.$keyword.'%');
                        })->where('suspensed',0)->orderBy('id','desc')->paginate(6);


        return view('front.items.search',compact('allsliders', 'results','discounted_items'));
    }

    public function products()
    {
        $allsliders    = slider::where('suspensed',0)->get();
        $type             =  Input::get('type');
        if(isset($type) && $type=='offer') {
            $results    = item::where('suspensed',0)->where('before_price', '>', 0)->orderBy('id','desc')->paginate(6);
        } elseif(isset($type) && $type=='special') {
            $special_cats = category::where('special', 1)->where('parent', 0)->pluck('id')->toArray();
            $special_sub_cats = category::where('special', 1)->where('parent', '!=', 0)->pluck('id')->toArray();
            $results    = item::where('suspensed',0)
            ->whereIn('category', $special_cats)
            ->orWhereIn('subcategory', $special_sub_cats)
            ->orderBy('id','desc')->paginate(6);
        } else {
            $results    = item::where('suspensed',0)->orderBy('id','desc')->paginate(6);
        }
        $discounted_items    = item::where('suspensed',0)->where('before_price', '>', 0)->orderBy('id','asc')->limit(8)->get();


        return view('front.items.all',compact('allsliders', 'results', 'discounted_items' ));
    }

    public function showproduct($id)
    {
        $showitem      = item::whereId($id)->first();
        if($showitem)
        {
            $adimg              = item_image::where('item_id',$showitem->id)->first();
            $adimages           = item_image::where('item_id',$showitem->id)->get();
            $parentcat          = category::where('id',$showitem->category)->first();
            $subcat             = category::where('id',$showitem->subcategory)->first();
            $subsubcat          = category::where('id',$showitem->subsubcategory)->first();
            $traderinfo         = member::where('id',$showitem->trader_id)->first();
            $favcount           = auth()->user() ? favorite_item::where('user_id',auth()->user()->id)->count() : 0;
            $recommendproducts  = item::where('id','!=',$showitem->id)->where('category',$showitem->category)->limit(10)->get();

            $parentfeatures = item_feature::where('item_id',$showitem->id)->pluck('parentfeature')->toArray();
            $subfeatures    = item_feature::where('item_id',$showitem->id)->pluck('feature')->toArray();

            $parentitemfeatures     = DB::table('features')->whereIn('id',$parentfeatures)->get();
            $subitemfeatures        = DB::table('features')->whereIn('id',$subfeatures)->get();

            return view('front.items.show',compact('showitem','adimages','adimg','parentcat','subcat','subsubcat',
            'traderinfo','recommendproducts','parentitemfeatures','subitemfeatures','favcount'));
        }else
        {
           return back();
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'email'=>'email|required',
        ],
        [
            'email.required'     => session('locale') == 'en' ?  'The :attribute field is required.'              : ' هذا الحقل مطلوب',
            'email.email'        => session('locale') == 'en' ?  'The :attribute must be a valid email address.'  : ' صيغة البريد الالكترونى خاطئة',
        ]);

        $newsubscriped_email = new subscriped_email;
        $newsubscriped_email->email = $request->email;
        $newsubscriped_email->created_at = now();
        $newsubscriped_email->save();
        session()->flash('success',__('messages.successsubscribeemail') );
        return back();
    }

    // signinphone form
    public function signinphone()
    {
        return view('auth.phone.login');
    }

    // login with phone
    public function loginwithphone(Request $request)
    {
        $this->validate($request,[
            'phone'=>'required',
        ],
        [
            'phone.required'         => session('locale') == 'en' ?  'The :attribute field is required.' : ' هذا الحقل مطلوب',
        ]);

        $user           = member::where('phone',$request->phone)->first();
        $randomregcode  = substr(str_shuffle("0123456789"), 0, 6);
        if($user)
        {
            member::where('id',$user->id)->update(['activate' => 1 , 'registercode' => $randomregcode]);
        }
        else
        {
           $user = member::create([
                'phone'         => $request['phone'],
                'type'          => 'phone',
                'activate'      => '1',
                'registercode'  => $randomregcode,
            ]);
        }

        session()->put('userID',$user->id);
        session()->put('randomcode',$randomregcode);
        return redirect('signinphone_activation');
    }

    // Activation login form
    public function signinphone_activation()
    {
        $userinfo = member::where('id',session('userID'))->first();
        return view('auth.phone.activation',compact('userinfo'));
    }


    // Activate Account
    public function activat_account(Request $request)
    {
        $userinfo = member::where('id',session('userID'))->first();
        if($userinfo->registercode == $request->code)
        {
            $userinfo->activate = 1;
            $userinfo->save();
            Auth::login($userinfo);
            return redirect('/');
        }
        else
        {
            $errormessage = session('locale') == 'en' ? 'Activate Code Not Correct' :'كود التفعيل غير صحيح' ;
            session()->flash('error', $errormessage);
            return back();
        }
    }


    // join illff form - vendor-register-form
    public function vendorjoin()
    {
        $countries  = country_area::where('parent',0)->get();
        $categories = category::where('parent',0)->get();
        return view('auth.joiniilff',compact('countries','categories'));
    }

    // join illff form - vendor-register-form
    public function vendorregister(Request $request)
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
        ],
        [
            'company.required'      => session('locale') == 'en' ?  'The :attribute field is required.'   : ' هذا الحقل مطلوب',
            'name.required'         => session('locale') == 'en' ?  'The :attribute field is required.'   : ' هذا الحقل مطلوب',
            'phone.required'        => session('locale') == 'en' ?  'The :attribute field is required.'   : ' هذا الحقل مطلوب',
            'phone.unique'          => session('locale') == 'en' ?  'The :attribute has already been taken.'         : 'تم اخذ رقم الجوال سابقا',
            'email.required'        => session('locale') == 'en' ?  'The :attribute field is required.'   : ' هذا الحقل مطلوب',
            'email.unique'          => session('locale') == 'en' ?  'The :attribute has already been taken.'         : 'تم اخذ البريد الإلكترونى سابقا',
            'password.required'     => session('locale') == 'en' ?  'The :attribute field is required.'              : ' هذا الحقل مطلوب',
            'password.min'          => session('locale') == 'en' ?  'The :attribute must be at least :min.'          : ' كلمة المرور لا تقل عن 8 احرف',
            'password.confirmed'    => session('locale') == 'en' ?  'The :attribute confirmation does not match.'    : 'كلمة المرور غير متطابقة',
            'job.required'          => session('locale') == 'en' ?  'The :attribute field is required.'   : ' هذا الحقل مطلوب',
            'country.required'      => session('locale') == 'en' ?  'The :attribute field is required.'   : ' هذا الحقل مطلوب',
            'city.required'         => session('locale') == 'en' ?  'The :attribute field is required.'   : ' هذا الحقل مطلوب',
            'area.required'         => session('locale') == 'en' ?  'The :attribute field is required.'   : ' هذا الحقل مطلوب',
            'classfication.required'=> session('locale') == 'en' ?  'The :attribute field is required.'   : ' هذا الحقل مطلوب',
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
        $data['type']          = 'email';
        $data['password']      = Hash::make($data['password']);
        $traderinfo            = member::create($data);
        return redirect('/join_iilff_response');
    }

    public function joiniilffresponse()
    {
        return view('auth.joiniilffresponse');
    }


    // aboutus
    public function aboutus()
    {
        $lang   = session('locale') == 'en' ? 'en' : 'ar';
        $about  = setting::first();
        return view('front.aboutus.aboutus',compact('lang','about'));
    }

    // privacy
    public function privacy()
    {
        $lang   = session('locale') == 'en' ? 'en' : 'ar';
        $privacy  = setting::first();
        return view('front.aboutus.privacy',compact('lang','privacy'));
    }

    // policy
    public function policy()
    {
        $lang   = session('locale') == 'en' ? 'en' : 'ar';
        $policy  = setting::first();
        return view('front.aboutus.policy',compact('lang','policy'));
    }

    // faq
    public function faq()
    {
        $lang   = session('locale') == 'en' ? 'en' : 'ar';
        $faq  = setting::first();
        return view('front.aboutus.faq',compact('lang','faq'));
    }

    // support
    public function support()
    {
        $lang   = session('locale') == 'en' ? 'en' : 'ar';
        $support  = setting::first();
        return view('front.aboutus.support',compact('lang','support'));
    }

    // charge
    public function charge()
    {
        $lang   = session('locale') == 'en' ? 'en' : 'ar';
        $charge  = setting::first();
        return view('front.aboutus.charge',compact('lang','charge'));
    }

    // return
    public function return()
    {
        $lang   = session('locale') == 'en' ? 'en' : 'ar';
        $return  = setting::first();
        return view('front.aboutus.return',compact('lang','return'));
    }

    // epolicy
    public function epolicy()
    {
        $lang   = session('locale') == 'en' ? 'en' : 'ar';
        $epolicy  = setting::first();
        return view('front.aboutus.epolicy',compact('lang','epolicy'));
    }

    // addtowishlist
    public function addtowishlist(Request $request)
    {
        $favorited = favorite_item::where('item_id',$request->item_id)->where('user_id',auth()->user()->id)->first();
        if($favorited)
        {
            $data['count']   = favorite_item::where('user_id',auth()->user()->id)->count();
            $data['message'] = session('locale') == 'en' ? 'This product is already in my favorites' : 'هذا المنتج موجود ف المفضلة';
            return response()->json($data);
        }
        else
        {
            $newfavad            = new favorite_item;
            $newfavad->user_id   = Auth()->user()->id;
            $newfavad->item_id   = $request->item_id;
            $newfavad->save();
            $data['count']        = favorite_item::where('user_id',auth()->user()->id)->count();
            $data['message']      = session('locale') == 'en' ? 'The favorite product has been successfully added' : ' تم اضافة المنتج ف المفضلة بنجاح';
            return response()->json($data);
        }
    }

    // show wishlist
    public function wishlist(Request $request)
    {
        $favouriteitems = favorite_item::where('user_id',auth()->user()->id)->pluck('item_id')->toArray();
        $items = item::whereIn('id', $favouriteitems)->get();

        //return $items;
        return view('front.profile.myfavorites',compact('items'));
    }

    // remove from wishlist
    public function removefromwishlist($id)
    {
        favorite_item::where('user_id',Auth()->user()->id )->where('item_id',$id)->delete();
        $successmessage = session('locale') == 'en' ? 'The product has been Removed from favorites' : 'تم حذف المنتج من المفضلة ';
        session()->flash('success', $successmessage);
        return back();
    }

    public function filtercity(Request $request)
    {
        $filtercity = DB::table('country_areas')->where('parent',$request->count_id)->get();
        return response()->json($filtercity);
    }

    public function useCoupon($code) {
        $coupon = coupon::where(['code' => $code, 'status' => 1])->where('expire_date', '<=', date('Y-m-d'))->first();
        if($coupon) {
            session()->put('discount',$coupon->value);
            $coupon->status = 0;
            $coupon->save();
            echo "You get discount ". session()->get('discount') . __('messages.sar');
        } else {
            echo "Invalid coupon code";
        }
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Mail\notificationmail;
use App\Mail\contactmail;
use Illuminate\Support\Facades\Mail;
use App\member;  
use App\item; 
use App\order;
use App\favorite_item;
use App\country_area;
use App\member_location;
use App\wallet_transaction;
use App\member_suggestion;
use App\rate;
use Carbon\Carbon;
use DB;  


class adminmemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  
    {
        $mainactive = 'users';
        $subactive  = 'user';
        $logo       = DB::table('settings')->value('logo');
        $allusers   = member::where('type','email')->where('role',0)->orderBy('id','desc')->get();
        return view('admin.users.index',compact('mainactive','subactive','logo','allusers'));
    }

    public function index2()  
    {
        $mainactive = 'users';
        $subactive  = 'phoneuser';
        $logo       = DB::table('settings')->value('logo');
        $allusers   = member::where('type','phone')->where('role',0)->orderBy('id','desc')->get();
        return view('admin.users.index2',compact('mainactive','subactive','logo','allusers'));
    }

    public function index3()  
    {
        $mainactive = 'users';
        $subactive  = 'facebookuser';
        $logo       = DB::table('settings')->value('logo');
        $allusers   = member::where('type','facebook')->where('role',0)->orderBy('id','desc')->get();
        return view('admin.users.index3',compact('mainactive','subactive','logo','allusers'));
    }

    public function index4()  
    {
        $mainactive = 'users';
        $subactive  = 'googleuser';
        $logo       = DB::table('settings')->value('logo');
        $allusers   = member::where('type','google')->where('role',0)->orderBy('id','desc')->get();
        return view('admin.users.index4',compact('mainactive','subactive','logo','allusers'));
    }
    
    public function newvendors()  
    {
        $mainactive = 'vendors';
        $subactive  = 'newvendors';
        $logo       = DB::table('settings')->value('logo');
        $allvendors = member::where('role',1)->where('activate',0)->orderBy('id','desc')->get();
        return view('admin.vendors.index',compact('mainactive','subactive','logo','allvendors'));
    }

    public function vendors()  
    {
        $mainactive = 'vendors';
        $subactive  = 'vendors';
        $logo       = DB::table('settings')->value('logo');
        $allvendors = member::where('role',1)->where('activate',1)->orderBy('id','desc')->get();
        return view('admin.vendors.index2',compact('mainactive','subactive','logo','allvendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainactive = 'users';
        $subactive  = 'adduser';
        $logo       = DB::table('settings')->value('logo');
        return view('admin.users.create',compact('mainactive','logo','subactive'));
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
            'name'        => 'required',
            'email'       => 'required|unique:members', 
            'pass'        => 'required|min:6',  
            'confirmpass' => 'required|same:pass',
        ]);

        $newmember            = new member;
        $newmember->name      = $request['name'];
        $newmember->email     = $request['email'];
        $newmember->type      = 'email';
        $newmember->password  = Hash::make($request['pass']);
        $newmember->save();
        session()->flash('success','تم إضافة عضو بنجاح');
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
        $mainactive        = 'users';
        $subactive         = 'user';
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

        return view('admin.users.show',compact('mainactive','subactive','logo','showuser','mylocations','myorders','myfavourites','mytotal','usercountry','usercity','userarea',
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
        $mainactive = 'users';
        $subactive  = 'edituser';
        $logo       = DB::table('settings')->value('logo');
        $eduser     = member::find($id);
        return view('admin.users.edit',compact('mainactive','subactive','logo','eduser'));
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
                'name'        => 'required',
                'email'       => 'required|unique:members,email,'.$id, 
            ]);
    
            $upmember->name      = $request['name'];
            $upmember->email     = $request['email'];
            $upmember->password  = $request['pass'] ? Hash::make($request['pass']) : $upmember->password;
            $upmember->save();
            session()->flash('success','تم تعديل بيانات العضو بنجاح');
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

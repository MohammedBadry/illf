<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\admin;
use App\setting;
use Illuminate\Support\Facades\Auth;

class adminloginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(Auth::guard('admin')->check()) 
        {
            $mainactive           ='dashboard';
            $subactive            ='dashboardcont';
            $logo                 = setting::value('logo');
            $allmembers           = count(DB::table('members')->where('type','email')->where('role',0)->get());
            $phonemembers         = count(DB::table('members')->where('type','phone')->where('role',0)->get());
            $facebookmembers      = count(DB::table('members')->where('type','facebook')->where('role',0)->get());
            $googlemembers        = count(DB::table('members')->where('type','google')->where('role',0)->get());
            $allcategories        = count(DB::table('categories')->get());
            $allitems             = count(DB::table('items')->get());
            $itemorders           = count(DB::table('orders')->get());
            $allmessages          = count(DB::table('contacts')->get());
            return view('admin.dashboard',compact('mainactive','subactive','logo','allmembers','phonemembers','facebookmembers','googlemembers','allitems','allcategories','itemorders','allmessages'));
        }
        else
        {
            $logo = setting::value('logo');
            return view('admin.login',compact('logo'));
        }
        
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
        $username = $request['username'];
        $pass     = $request['pass'];

        if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $pass])) 
        {
            return redirect('adminpanel');
        }
        else
        {
            session()->put('loginfailed','?????? ???????????????? ???? ???????? ???????????? ?????? ?????????? ! ???????? ?????? ????????');
            return back();
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Auth::guard('admin')->logout();
        return redirect('adminpanel');
    }
}

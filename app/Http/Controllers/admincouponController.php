<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Mail\notificationmail;
use App\Mail\contactmail;
use Illuminate\Support\Facades\Mail;
use App\feature;
use DB;
use Carbon\Carbon;
use App\coupon;


class admincouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainactive      = 'coupons';
        $subactive       = 'coupon';
        $logo            = DB::table('settings')->value('logo');
        $allcoupons   = coupon::get();
        return view('admin.coupons.index',compact('mainactive','subactive','logo','allcoupons'));
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
        $this->validate($request,[
            'code'   => 'required|unique:coupons,code',
            'value'     => 'required',
            'expire_date'     => 'required|date|after_or_equal:'.date('Y-m-d'),
            'status'     => 'required',
        ]);

        $newcoupon              = new coupon;
        $newcoupon->code  = $request['code'];
        $newcoupon->value  = $request['value'];
        $newcoupon->expire_date  = $request['expire_date'];
        $newcoupon->status      = $request['status'];
        $newcoupon->save();

        session()->flash('success','تم إضافة قسم');
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
        $mainactive      = 'coupons';
        $subactive       = 'coupon';
        $logo            = DB::table('settings')->value('logo');
        $showcoupon    = coupon::findorfail($id);
        return view('admin.coupons.show',compact('mainactive','subactive','logo','showcoupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mainactive             = 'coupons';
        $subactive              = 'coupon';
        $logo                   = DB::table('settings')->value('logo');
        $edcoupon             = coupon::findorfail($id);
        return view('admin.coupons.edit',compact('mainactive','subactive','logo','edcoupon'));
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
        $upcoupon = coupon::find($id);
        $this->validate($request,[
            'code'   => 'required|unique:coupons,code,'.$id,
            'value'     => 'required',
            'expire_date'     => 'required|date|after_or_equal:'.date('Y-m-d'),
            'status'   => 'required',
        ]);

        $upcoupon->code     = $request['code'];
        $upcoupon->value     = $request['value'];
        $upcoupon->expire_date     = $request['expire_date'];
        $upcoupon->status        = $request['status'];
        $upcoupon->save();
        session()->flash('success','تم تعديل كود الخصم بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        coupon::find($id)->delete();
        session()->flash('success','تم حذف كود الخصم بنجاح');
        return back();
    }
}

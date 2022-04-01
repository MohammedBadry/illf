<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use DB;
use App\slider;
use App\setting;

class adminhomeadvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainactive = 'setting';
        $subactive  = 'home-adv';
        $logo       = DB::table('settings')->value('logo');
        $edadv = setting::first();
        return view('admin.setting.home_adv',compact('mainactive', 'logo', 'subactive', 'edadv' ));
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
        $upslider = setting::find($id);

        $this->validate($request,[
            'home_adv_image'      => 'required|image',
        ]);

        if($request->hasFile('home_adv_image'))
        {
            $image = $request['home_adv_image'];
            $filename = rand(0,9999).'.'.$image->getClientOriginalExtension();
            $image->move(base_path('users/images/'),$filename);
            $upslider->home_adv_image = $filename;
        }

        $upslider->save();
        session()->flash('success','تم تعديل صورة الإعلان بنجاح');
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
        $delslider = slider::find($id)->delete();
        session()->flash('success','تم حذف السليدر بنجاح');
        return back();
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("sliders")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"تم الحذف بنجاح"]);
    }
}

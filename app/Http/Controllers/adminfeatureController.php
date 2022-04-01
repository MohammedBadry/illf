<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Mail\notificationmail;
use App\Mail\contactmail;
use Illuminate\Support\Facades\Mail;
use DB;    
use Carbon\Carbon;
use App\feature;


class adminfeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()   
    {
        $mainactive      = 'features';
        $subactive       = 'feature';
        $logo            = DB::table('settings')->value('logo');
        $allfeatures     = feature::where('parent',0)->get();
        return view('admin.features.index',compact('mainactive','subactive','logo','allfeatures'));
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
            'arname'   => 'required',
            'enname'   => 'required',
            'parent'   => 'required',
         ]);

        $newfeature          = new feature;
        $newfeature->arname  = $request['arname'];
        $newfeature->enname  = $request['enname'];
        $newfeature->parent  = $request['parent'];
        $newfeature->value   = $request['value'];
        $newfeature->save();
        session()->flash('success','تم الإضافة بنجاح');
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
        $mainactive      = 'features';
        $subactive       = 'feature';
        $logo            = DB::table('settings')->value('logo');
        $showfeature     = feature::findorfail($id);
        $parentfeature   = feature::where('parent',$id)->first();
        $subfeatures     = feature::where('parent',$id)->get();
        return view('admin.features.show',compact('mainactive','subactive','logo','showfeature','parentfeature','subfeatures'));
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
        $upfeature = feature::find($id);
        $this->validate($request,[
            'arname'   => 'required',
            'enname'   => 'required',
            'parent'   => 'required',
        ]);

        $upfeature->arname  = $request['arname'];
        $upfeature->enname  = $request['enname'];
        $upfeature->parent  = $request['parent'];
        $upfeature->value   = $request['value'];
        $upfeature->save();
        session()->flash('success','تم التعديل بنجاح');
        return back();
    }

    public static function delete_parent($id)
    {
        $feature_parent = feature::where('parent', $id)->get();
        foreach ($feature_parent as $sub) 
        {
            self::delete_parent($sub->id);
            $subdepartment = feature::find($sub->id);
            if (!empty($subdepartment)) 
            {
                $subdepartment->delete();
            }
        }
        $dep = feature::find($id)->delete(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delfeature = feature::find($id);
        if($delfeature)
        {
            self::delete_parent($id);
            session()->flash('success','تم الحذف بنجاح');
        }
        return back();   
    }
}

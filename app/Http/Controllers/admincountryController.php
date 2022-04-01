<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\country_area;
use App\ad;

class admincountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainactive = 'countries';
        $subactive  ='country';
        $logo = DB::table('settings')->value('logo');
        $allareas   = country_area::where('parent',0)->get();
        return view('admin.country.country_area',compact('mainactive','logo','subactive','allareas'));
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
        if(Input::has('addcountry'))
        {
            $this->validate($request,[
                'name'   => 'required|max:200',
                'enname' => 'required|max:200',
                'lat'    => 'required',
                'lng'    => 'required',
            ]);
            $newcountry = new country_area;
            $newcountry->name   = $request['name'];
            $newcountry->enname = $request['enname'];
            $newcountry->lat    = $request['lat'];
            $newcountry->lng    = $request['lng'];
            $newcountry->parent = 0;
            $newcountry->save();
            return back();
        }
        elseif(Input::has('addcity'))
        {

            $this->validate($request,[
                'parent'   => 'required',
                'cityname' => 'required|max:200',
                'enname'   => 'required|max:200',
                'lat'    => 'required',
                'lng'    => 'required',
            ]);

            $newcountry = new country_area;
            $newcountry->name   = $request['cityname'];
            $newcountry->enname = $request['enname'];
            $newcountry->lat    = $request['lat'];
            $newcountry->lng    = $request['lng'];
            $newcountry->parent = $request['parent'];
            $newcountry->save();
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
        $mainactive = 'countries';
        $subactive  ='country';
        $logo       = DB::table('settings')->value('logo');
        $showarea   = country_area::find($id);
        $allcities  = DB::table('country_areas')->where('parent',$id)->get();
        return view('admin.country.showarea',compact('mainactive','subactive','logo','showarea','allcities'));
    }

    public function show2($id)
    {
        $mainactive = 'countries';
        $subactive  ='country';
        $logo       = DB::table('settings')->value('logo');
        $showarea   = country_area::find($id);
        $allcities  = DB::table('country_areas')->where('parent',$id)->get(); 
        return view('admin.country.showcity',compact('mainactive','subactive','logo','showarea','allcities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mainactive = 'countries';
        $subactive  ='country';
        $editarea    = country_area::findorfail($id);
        $logo = DB::table('settings')->value('logo');
        return view('admin.country.edit_country_area',compact('mainactive','logo','subactive','editarea'));
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
        $upname = country_area::find($id);
        if(Input::has('suspensed'))
       {
         if($upname->suspensed == 0)
         {
           DB::table('country_areas')->where('id',$id)->update(['suspensed' => 1]);
           return back();
         }
         else 
         {
           DB::table('country_areas')->where('id',$id)->update(['suspensed' => 0]);
           return back();
         }
         
       }
       else 
       {
          $this->validate($request,[
           'name' => 'required|max:200',
           'enname' => 'required|max:200',
       ]);
       $upname->name   = $request['name'];
       $upname->enname = $request['enname'];
       $upname->lat    = $request['lat'];
       $upname->lng    = $request['lng'];
       $upname->save();
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
        if(Input::has('delcountry'))
        {
            $delcountry = country_area::find($id);
            $countryads = ad::where('country',$id)->delete();
            $delcountry->delete();
            $delsub  = DB::table('country_areas')->where('parent' , $id)->get();
            foreach($delsub as $obj)
            {
                DB::table('country_areas')->where('id' , $obj->id)->delete();
            }
        }
        else 
        {
            $cityads =  ad::where('city',$id)->delete();
            $delcity = country_area::find($id)->delete();
        }
        return back();
    }
}

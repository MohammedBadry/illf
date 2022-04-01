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
use App\category;
use App\category_feature;


class admincategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainactive      = 'categories';
        $subactive       = 'category';
        $logo            = DB::table('settings')->value('logo');
        $allcategories   = category::where('parent',0)->get();
        return view('admin.categories.index',compact('mainactive','subactive','logo','allcategories'));
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
            'arcategory'     => 'required',
            'encategory'     => 'required',
            'image'          => 'required|image',
        ]);

        $newcategory              = new category;
        $newcategory->arcategory  = $request['arcategory'];
        $newcategory->encategory  = $request['encategory'];
        $newcategory->parent      = $request['parent'];
        $newcategory->special     = $request['special'];
        $newcategory->view_at_home        = $request['view_at_home'];

        if($request->hasFile('image'))
        {
            $image = $request['image'];
            $filename = rand(0,9999).'.'.$image->getClientOriginalExtension();
            $image->move(base_path('users/images/'),$filename);
            $newcategory->image = $filename;
        }
        $newcategory->save();

        if($request->parentfeatures)
        {
            $this->validate($request,[
                'subfeatures'   => 'required',
            ]);

            $parentfeatures = $request->parentfeatures;
            $subfeatures    = $request->subfeatures;
            foreach($parentfeatures as $parentfeature)
            {
                foreach($subfeatures as $subfeature)
                {
                        $featureinfo = feature::where('id',$subfeature)->first();
                        if($featureinfo->parent == $parentfeature)
                        {
                            $new_category_features                = new category_feature;
                            $new_category_features->category      = $newcategory->id;
                            $new_category_features->parentfeature = $parentfeature;
                            $new_category_features->feature       = $subfeature;
                            $new_category_features->save();
                        }
                }
            }
        }

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
        $mainactive      = 'categories';
        $subactive       = 'category';
        $logo            = DB::table('settings')->value('logo');
        $showcategory    = category::findorfail($id);
        $parentcategory  = category::where('parent',$id)->first();
        $subcategories   = category::where('parent',$id)->get();
        $parentfeature   = feature::where('parent',0)->get();
        return view('admin.categories.show',compact('mainactive','subactive','logo','showcategory','parentcategory','parentfeature','subcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mainactive             = 'categories';
        $subactive              = 'category';
        $logo                   = DB::table('settings')->value('logo');
        $edcategory             = category::findorfail($id);
        $parentcategory         = category::where('id',$edcategory->parent)->first();
        $subcategories          = category::where('parent',$id)->get();
        $parentfeatures         = feature::where('parent',0)->get();
        $parentcategoryfeatures = category_feature::where('category',$id)->pluck('parentfeature')->toArray();
        $subcategoryfeatures    = category_feature::where('category',$id)->pluck('feature')->toArray();
        return view('admin.categories.edit',compact('mainactive','subactive','logo','edcategory','parentcategory','parentfeatures','subcategories','parentcategoryfeatures','subcategoryfeatures'));
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
        $upcategory = category::find($id);
        $this->validate($request,[
            'arcategory'   => 'required',
            'encategory'   => 'required',
        ]);

        $upcategory->arcategory     = $request['arcategory'];
        $upcategory->encategory     = $request['encategory'];
        $upcategory->special        = $request['special'];
        $upcategory->view_at_home        = $request['view_at_home'];
        if($request->hasFile('image'))
        {
            $image = $request['image'];
            $filename = rand(0,9999).'.'.$image->getClientOriginalExtension();
            $image->move(base_path('users/images/'),$filename);
            $upcategory->image = $filename;
        }

        if($request->parentfeatures)
        {
            $this->validate($request,[
                'subfeatures'   => 'required',
            ]);
            $categoryfeatures = category_feature::where('category',$id)->pluck('feature')->toArray();
            $parentfeatures   = $request->parentfeatures;
            $subfeatures      = $request->subfeatures;
            foreach($parentfeatures as $parentfeature)
            {
                foreach($subfeatures as $subfeature)
                {
                        $featureinfo = feature::where('id',$subfeature)->first();
                        if($featureinfo->parent == $parentfeature)
                        {
                            if(!in_array($subfeature,$categoryfeatures))
                            {
                                $new_category_features                = new category_feature;
                                $new_category_features->category      = $id;
                                $new_category_features->parentfeature = $parentfeature;
                                $new_category_features->feature       = $subfeature;
                                $new_category_features->save();
                            }
                        }
                }
            }

            foreach($categoryfeatures as $categoryfeature)
            {
                if(!in_array($categoryfeature,$subfeatures))
                {
                    category_feature::where('category',$id)->where('feature',$categoryfeature)->delete();
                }
            }
        }

        $upcategory->save();
        session()->flash('success','تم تعديل القسم بنجاح');
        return back();
    }

    public static function delete_parent($id)
    {
        $category_parent = category::where('parent', $id)->get();
        foreach ($category_parent as $sub)
        {
            self::delete_parent($sub->id);
            $subdepartment = category::find($sub->id);
            if (!empty($subdepartment))
            {
                $subdepartment->delete();
            }
        }
        $dep = category::find($id)->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delcategory = category::find($id);
        if($delcategory)
        {
            self::delete_parent($id);
            category_feature::where('category',$id)->delete();
            session()->flash('success','تم حذف القسم بنجاح');
        }
        return back();
    }
}

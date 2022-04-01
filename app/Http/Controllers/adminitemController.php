<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use DB;
use App\member;
use App\rate;
use App\item;
use App\item_image;
use App\favorite_item;
use App\item_feature;
use App\category;
use App\feature;
use App\category_feature;
use App\setting;

class adminitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $mainactive = 'items';
        $subactive  = 'item';
        $logo       = DB::table('settings')->value('logo');
        $allitems   = item::orderBy('id', 'desc')->get();
        return view('admin.items.index',compact('mainactive','logo','subactive','allitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainactive = 'items';
        $subactive  = 'additem';
        $logo       = DB::table('settings')->value('logo');
        $allcats    = category::get();
        return view('admin.items.create',compact('mainactive','subactive','logo','allcats'));
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
            'artitle'        => 'required|max:200',
            'entitle'        => 'required|max:200',
            'category'       => 'required',
            'subcategory'    => 'required',
            'subsubcategory' => 'required',
            'price'          => 'required',
            'before_price'   => 'nullable|gt:price',
            'stock'          => 'required',
            'ardesc'         => 'required',
            'endesc'         => 'required',
            'parentfeatures' => 'required',
            'subfeatures'    => 'required',
        ]);

        $newitem                = new item;
        $newitem->category      = $request['category'];
        $newitem->subcategory   = $request['subcategory'];
        $newitem->subsubcategory= $request['subsubcategory'];
        $newitem->code          = $request['code'];
        $newitem->artitle       = $request['artitle'];
        $newitem->entitle       = $request['entitle'];
        $newitem->price         = $request['price'];
        $upitem->before_price   = $request['before_price'];
        $newitem->stock         = $request['stock'];
        $newitem->ardesc        = $request['ardesc'];
        $newitem->endesc        = $request['endesc'];
        $newitem->save();

        $items = $request['items'];
        if($items)
        {
            foreach($items as $item)
            {
                $newimg   = new item_image;
                $img_name = rand(0, 999) . '.' . $item->getClientOriginalExtension();
                $item->move(base_path('users/images/'), $img_name);
                $newimg->image   = $img_name;
                $newimg->item_id = $newitem->id;
                $newimg->save();
            }
        }

        $parentfeatures = $request->parentfeatures;
        $subfeatures    = $request->subfeatures;

        foreach($parentfeatures as $parentfeature)
        {
            foreach($subfeatures as $subfeature)
            {
                $featureinfo = feature::where('id',$subfeature)->first();
                if($featureinfo->parent == $parentfeature)
                {
                    $new_item_features                = new item_feature;
                    $new_item_features->item_id       = $newitem->id;
                    $new_item_features->parentfeature = $parentfeature;
                    $new_item_features->feature       = $subfeature;
                    $new_item_features->save();
                }
            }
        }
        session()->flash('success','تم إضافة المنتج بنجاح');
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
        $mainactive    = 'items';
        $subactive     = 'item';
        $logo          = DB::table('settings')->value('logo');
        $showitem      = item::findorfail($id);
        $adimg         = item_image::where('item_id',$id)->first();
        $adimages      = item_image::where('item_id',$id)->get();
        $parentcat     = category::where('id',$showitem->category)->first();
        $subcat        = category::where('id',$showitem->subcategory)->first();
        $subsubcat     = category::where('id',$showitem->subsubcategory)->first();
        return view('admin.items.show',compact('mainactive','logo','subactive','showitem','adimages','adimg','parentcat','subcat','subsubcat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mainactive             = 'items';
        $subactive              = 'item';
        $logo                   = DB::table('settings')->value('logo');
        $editem                 = item::findorfail($id);
        $allcats                = category::where('parent',0)->get();
        $allsubcats             = category::where('parent',$editem->category)->get();
        $allsubsubcats          = category::where('parent',$editem->subcategory)->get();
        $adimages               = item_image::where('item_id',$id)->get();
        $parentitemfeatures     = item_feature::where('item_id',$id)->pluck('parentfeature')->toArray();
        $subitemfeatures        = item_feature::where('item_id',$id)->pluck('feature')->toArray();
        $parentcategoryfeatures = category_feature::where('category',$editem->subcategory)->pluck('parentfeature')->toArray();
        $subcategoryfeatures    = category_feature::where('category',$editem->subcategory)->pluck('feature')->toArray();
        $parentfeatures         = feature::whereIn('id',$parentcategoryfeatures)->get();
        $subfeatures            = feature::whereIn('id',$subcategoryfeatures)->get();

        return view('admin.items.edit',compact('mainactive','logo','subactive','editem','adimages','allcats','allsubcats',
        'allsubsubcats','parentfeatures','subfeatures','parentitemfeatures','subitemfeatures'));
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
        $upitem = item::find($id);
        if(Input::has('suspensed'))
        {
          if($upitem->suspensed == 0)
          {
                DB::table('items')->where('id',$id)->update(['suspensed' => 1]);
                session()->flash('success','تم تعطيل المنتج بنجاح');
                return back();
          }
          else
          {
                DB::table('items')->where('id',$id)->update(['suspensed' => 0]);
                session()->flash('success','تم تفعيل المنتج بنجاح');
                return back();
          }

        }
        else
        {
            $this->validate($request,[
                'artitle'        => 'required|max:200',
                'entitle'        => 'required|max:200',
                'category'       => 'required',
                'subcategory'    => 'required',
                'subsubcategory' => 'required',
                'price'          => 'required',
                'before_price'   => 'nullable|gt:price',
                'ardesc'         => 'required',
                'endesc'         => 'required',
                'parentfeatures' => 'required',
                'subfeatures'    => 'required',
            ]);

            $upitem->category      = $request['category'];
            $upitem->subcategory   = $request['subcategory'];
            $upitem->subsubcategory= $request['subsubcategory'];
            $upitem->code          = $request['code'];
            $upitem->artitle       = $request['artitle'];
            $upitem->entitle       = $request['entitle'];
            $upitem->price         = $request['price'];
            $upitem->before_price  = $request['before_price'];
            $upitem->ardesc        = $request['ardesc'];
            $upitem->endesc        = $request['endesc'];
            $upitem->save();

            $items = $request['items'];
            if($items)
            {
                foreach($items as $item)
                {
                $newimg   = new item_image;
                $img_name = rand(0, 999) . '.' . $item->getClientOriginalExtension();
                $item->move(base_path('users/images/'), $img_name);
                $newimg->image   = $img_name;
                $newimg->item_id = $id;
                $newimg->save();
                }
            }

            $upitemfeatures   = item_feature::where('item_id',$id)->pluck('feature')->toArray();
            $parentfeatures   = $request->parentfeatures;
            $subfeatures      = $request->subfeatures;
            foreach($parentfeatures as $parentfeature)
            {
                foreach($subfeatures as $subfeature)
                {
                    $featureinfo = feature::where('id',$subfeature)->first();
                    if($featureinfo && $featureinfo->parent == $parentfeature)
                    {
                        if(!in_array($subfeature,$upitemfeatures))
                        {
                            $new_item_features                = new item_feature;
                            $new_item_features->item_id       = $id;
                            $new_item_features->parentfeature = $parentfeature;
                            $new_item_features->feature       = $subfeature;
                            $new_item_features->save();
                        }
                    }
                }
            }

            foreach($upitemfeatures as $upitemfeature)
            {
                if(!in_array($upitemfeature,$subfeatures))
                {
                    item_feature::where('item_id',$id)->where('feature',$upitemfeature)->delete();
                }
            }


            session()->flash('success','تم تعديل المنتج بنجاح');
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
        if(Input::has('del-single-image'))
        {
            $delimg = item_image::find($id)->delete();
            session()->flash('success','تم حذف الصورة بنجاح');
            return back();
        }
        else
        {
            $delitem = item::find($id);
            item_feature::where('item_id',$id)->delete();
            item_image::where('item_id',$id)->delete();
            favorite_item::where('item_id',$id)->delete();
            rate::where('item_id',$id)->delete();
            $delitem->delete();
            session()->flash('success','تم حذف المنتج بنجاح');
            return back();
        }
    }

    // ajax functions

    public function filtercats(Request $request)
    {
        $filtercats['cats'] = DB::table('categories')->where('parent',$request->count_id)->get();
        return response()->json($filtercats);
    }

    public function filterfeatures(Request $request)
    {
        $parentcatfeatures  = DB::table('category_features')->where('category',$request->count_id)->pluck('parentfeature')->toArray();
        $subcatfeatures     = DB::table('category_features')->where('category',$request->count_id)->pluck('feature')->toArray();
        $parentfeatures     = DB::table('features')->whereIn('id',$parentcatfeatures)->get();
        $subfeatures        = DB::table('features')->whereIn('id',$subcatfeatures)->get();

        $parentitemfeatures = item_feature::where('item_id',$request->item_id)->pluck('parentfeature')->toArray();
        $subitemfeatures    = item_feature::where('item_id',$request->item_id)->pluck('feature')->toArray();

        $filter             = '1';
        return view('admin.items.filterfeatures',compact('filter','parentfeatures','subfeatures','subcatfeatures','parentitemfeatures','subitemfeatures'))->render();
    }
}

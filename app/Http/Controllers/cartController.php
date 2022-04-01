<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\setting;
use App\order;
use App\order_item;
use App\member_location;
use App\country_area;
use App\member;
use App\wallet_transaction;
use DB;

class cartController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartitems      = session('shopping_cart') ? session('shopping_cart')['items'] : [];
        $carttotal      = session('shopping_cart') ? session('shopping_cart')['total']-session('discount') : 0;
        $totalcartitems = 0;
        if(session('shopping_cart'))
        {
            foreach($cartitems as $key => $cartitem)
            {
                $totalcartitems += $cartitem['qty'];
            }
        }
        return view('front.cart.index',compact('cartitems','carttotal','totalcartitems'));
    }

    public function index2()
    {
        if(session('shopping_cart'))
        {
            $mylocations      = member_location::where('user_id',auth()->user()->id)->get();
            $countries        = country_area::where('parent',0)->get();
            $cities           = country_area::where('parent',auth()->user()->country)->get();
            $areas            = country_area::where('parent',auth()->user()->city)->get();
            $cartitems        = session('shopping_cart') ? session('shopping_cart')['items'] : [];
            $carttotal        = session('shopping_cart') ? session('shopping_cart')['total']-session('discount') : 0;
            $totalcartitems   = 0;
            foreach($cartitems as $key => $cartitem)
            {
                $totalcartitems += $cartitem['qty'];
            }
            return view('front.cart.cartcharge',compact('cartitems','carttotal','totalcartitems','mylocations','countries','cities','areas'));
        }else
        {
            return redirect('/cart');
        }

    }



    public function checkout()
    {
        if(session('shopping_cart'))
        {
            $cartitems        = session('shopping_cart') ? session('shopping_cart')['items'] : [];
            $carttotal        = session('shopping_cart') ? session('shopping_cart')['total']-session('discount') : 0;
            $totalcartitems   = 0;
            foreach($cartitems as $key => $cartitem)
            {
                $totalcartitems += $cartitem['qty'];
            }
            return view('front.cart.checkout',compact('cartitems','carttotal','totalcartitems'));
        }
        else
        {
            return redirect('/cart');
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
        if(Input::has('continuepayment'))
        {
            if(session('shopping_cart'))
            {
                $shopping_cart = session('shopping_cart');
                $shopping_cart['selectedlocation'] = $request->selectedlocation;
                session()->put('shopping_cart',$shopping_cart);
                return redirect('/checkout');
            }
            else
            {
                return redirect('/cart');
            }
        }
        elseif(Input::has('confirmcheckout'))
        {
            if(session('shopping_cart'))
            {
                $setting = setting::first();

                if($setting->charge_cost>0) {
                    $charge_cost = $setting->charge_cost;
                } else {
                    $charge_cost = 0;
                }

                $cartitems = session('shopping_cart')['items'];
                $carttotal = session('shopping_cart')['total']-session('discount');

                $neworder                = new order;
                $neworder->order_number  = date('dmY').rand(0,999);
                $neworder->user_id       = Auth()->user()->id;
                $neworder->shipping      = session('shopping_cart')['selectedlocation'];
                $neworder->total         = $carttotal+$charge_cost;
                $neworder->paid          = $request->paid;
                $neworder->save();

                foreach($cartitems as $arr)
                {
                    $neworderitem           = new order_item();
                    $neworderitem->order_id = $neworder->id;
                    $neworderitem->item_id  = $arr['item_id'];
                    $neworderitem->qty      = $arr['qty'];
                    $neworderitem->price    = $arr['price'];
                    $neworderitem->save();
                }

                if($request->paid == 1)
                {
                    member::where('id',Auth()->user()->id)->decrement('wallet',$carttotal);
                    $newwallet_transaction          = new wallet_transaction;
                    $newwallet_transaction->user_id = Auth()->user()->id;
                    $newwallet_transaction->value   = $carttotal;
                    $newwallet_transaction->type    = 'w';
                    $newwallet_transaction->save();
                }
                session()->forget('shopping_cart');
                $successmessage = session('locale') == 'en' ? 'The request was made successfully' : 'تم عمل الطلب بنجاح  ';
                return view('front.cart.finishedcheckout',compact('successmessage'));
            }
            else
            {
                return redirect('/cart');
            }
        }
        else
        {
            if(session('shopping_cart'))
            {
                $shopping_cart   = session('shopping_cart');
                $cartitems       = session('shopping_cart')['items'];

                foreach($cartitems as $key => $cartitem)
                {
                    if($request->item_id == $cartitem['item_id'])
                    {
                        $cartitem['qty']                = $cartitem['qty'] + 1 ;
                        $cartitem['price']              = $cartitem['price'] + $request->price ;
                        $cartitems[$key]                = $cartitem;
                        $shopping_cart['items']         = $cartitems;
                        $shopping_cart['cartcount']     = session('shopping_cart')['cartcount'];
                        $shopping_cart['total']         = session('shopping_cart')['total']-session('discount') + $request->price;
                        session()->put('shopping_cart',$shopping_cart);
                        return response()->json($shopping_cart);
                    }
                }

                $count           = count(session('shopping_cart')['items']);
                $item_array      = array(
                    'item_id'    =>  $request->item_id,
                    'price'      =>  $request->price,
                    'qty'        =>  $request->qty,
                );

                $shopping_cart['items'][$count] = $item_array;
                $shopping_cart['cartcount']     = session('shopping_cart')['cartcount'] +1;
                $shopping_cart['total']         = session('shopping_cart')['total']-session('discount') + $request->price;
                session()->put('shopping_cart',$shopping_cart);
                return response()->json($shopping_cart);
            }
            else
            {
                $shopping_cart = array();
                $item_array    = array(
                    'item_id'    =>  $request->item_id,
                    'price'      =>  $request->price,
                    'qty'        =>  $request->qty,
                );

                $shopping_cart['items'][0]     = $item_array;
                $shopping_cart['cartcount']    = 1;
                $shopping_cart['total']        = $request->price;
                session()->put('shopping_cart',$shopping_cart);
                return response()->json($shopping_cart);
            }
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
        if(Input::has('deletesessionitem'))
        {
            if(session('shopping_cart'))
            {
                $shopping_cart   = session('shopping_cart');
                $cartitems       = $shopping_cart['items'];
                $removedprice    = $cartitems[$id]['price'];
                unset($cartitems[$id]);
                $shopping_cart['items']         = $cartitems;
                $shopping_cart['cartcount']     = session('shopping_cart')['cartcount']- 1;
                $shopping_cart['total']         = session('shopping_cart')['total']-session('discount') - $removedprice;
                session()->put('shopping_cart',$shopping_cart);
                if($shopping_cart['cartcount'] == 0)
                {
                    session()->forget('shopping_cart');
                }
                $successmessage = session('locale') == 'en' ? 'Remove Item from Cart Successfully' : 'تم حذف المنتج من السلة بنجاح';
                session()->flash('success', $successmessage);
            }
        }
        else
        {
            if(session('shopping_cart'))
            {
                session()->forget('shopping_cart');
                $successmessage = session('locale') == 'en' ? 'Empty Cart Successfully' : 'تم تفريغ السلة بنجاح';
                session()->flash('success', $successmessage);
            }
        }
        return back();
    }

}

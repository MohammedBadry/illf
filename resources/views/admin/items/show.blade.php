@extends('admin/include/master')
@section('title') لوحة التحكم | مشاهدة تفاصيل المنتج @endsection
@section('content')
<?php use Carbon\Carbon; ?>
        <div class="box-body">
            <div style="margin-top: 7%;" class="col-md-6">
                
                <div class="form-group col-md-12">
                    <label>القسم الرئيسى</label>
                    <input type="text" class="form-control" value="{{$parentcat ? $parentcat->arcategory : '?????'}}" readonly> 
                </div>

                <div class="form-group col-md-12">
                    <label>القسم الفرعى</label>
                    <input type="text" class="form-control" value="{{$subcat ? $subcat->arcategory : '?????'}}" readonly> 
                </div>

                <div class="form-group col-md-12">
                    <label>القسم الفرعى</label>
                    <input type="text" class="form-control" value="{{$subsubcat ? $subsubcat->arcategory : '?????'}}" readonly> 
                </div>

                <div class="form-group col-md-12">
                    <label>اسم المنتج باللغة العربية</label>
                    <input type="text" class="form-control" value="{{$showitem->artitle}}" readonly> 
                </div>

                <div class="form-group col-md-12">
                    <label>اسم المنتج باللغة الانجليزية</label>
                    <input type="text" class="form-control" value="{{$showitem->entitle}}" readonly> 
                </div>

                <div class="form-group col-md-12">
                    <label>السعر [ريال]</label>
                    <input type="text" class="form-control" value="{{$showitem->price}}" readonly> 
                </div>


                <div class="form-group col-md-12">
                    <label>الكمية ف المخزن</label>
                    <input type="text" class="form-control" value="{{$showitem->stock}}" readonly> 
                </div>

            </div>

            <div class="col-md-6">
            <h6 class="box-title" style="float:left;"> تاريخ الاعلان : {{ $showitem->created_at }}</h6><br>
              
                <h4 style="float:right;margin-top: 5%;">
                     @if($showitem->suspensed == 0)
                      غير معطل<span> <i class="fa fa-unlock text-success"></i> </span>
                    @else 
                       معطل<span> <i class="fa fa-lock text-danger"></i> </span>
                    @endif 
                </h4>    

                <div class="col-md-12">
                      <img class="img-thumbnail" style="width:100%; height:30%;" src="{{asset('users/images/'.$adimg->image)}}" alt="">
                </div>
                
                <div class="form-group col-md-12">
                    <label>صور المنتج</label>
                    <br>
                    @foreach($adimages as $image)
                    <div style="padding: 2%;" class="col-md-4">
                        {{ Form::open(array('method' => 'DELETE','id' => 'del'.$image->id,"onclick"=>"return confirm('هل انت متأكد ؟!')",'files' => true,'url' => array('adminpanel/items/'.$image->id))) }}
                                <input type="hidden" name="del-single-image">
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        {!! Form::close() !!}
                        <img class="img-thumbnail" style="width:100%; height:10%;" src="{{asset('users/images/'.$image->image)}}" alt="">
                    </div>
                    @endforeach
                </div>

                </hr>
                <div class="form-group col-md-12">
                    <label>تفاصيل الاعلان باللغة العربية</label>                                    
                    <textarea rows='10' type="text" class="form-control" readonly>{!! $showitem->ardesc !!}</textarea>
                </div>
                <div class="form-group col-md-12">
                    <label>تفاصيل الاعلان باللغة الانجليزية</label>                                    
                    <textarea rows='10' type="text" class="form-control" readonly>{!! $showitem->endesc !!}</textarea>
                </div>
            </div>
        </div>    
@endsection
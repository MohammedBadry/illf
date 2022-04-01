@extends('admin/include/master')
@section('title') لوحة التحكم | المنتجات @endsection
@section('content')
<style>form{display: initial;}</style>
<section class="content"> 
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                
                <div class="box-header with-border">
                    <h3 class="box-title">كل المنتجات</h3>
                </div>
   
                <div class="table-responsive box-body">
                    <table id="example3" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;"> اسم المنتج</th>
                                <th style="text-align:center;"> الفئة</th>
                                <th style="text-align:center;">السعر [ريال]</th>
                                <th style="text-align:center;"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($allitems  as $item)
                            <?php $itemcategory = DB::table('categories')->where('id',$item->category)->first(); ?>
                            <tr>
                                <td style="text-align:center;">{{$item->artitle}}</td>
                                <td style="text-align:center;">{{$itemcategory ? $itemcategory->arcategory : '?????'}} </td>
                                <td style="text-align:center;">{{$item->price}}</td>
                                <td style="text-align:center;">
                                    <a href='{{asset("adminpanel/items/".$item->id)}}' class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> مشاهدة</a>
                                    {{ Form::open(array('method' => 'patch',"onclick"=>"return confirm('هل انت متاكد ؟!')",'files' => true,'url' =>'adminpanel/items/'.$item->id )) }}
                                        <input type="hidden" name="suspensed" >
                                        <button type="submit" class="btn btn-default">
                                            @if($item->suspensed == 1) 
                                                <i style="color:crimson" class="fa fa-lock" aria-hidden="true"></i>  تفعيل
                                            @else 
                                                <i style="color:#1FAB89" class="fa fa-unlock" aria-hidden="true"></i> تعطيل
                                            @endif
                                        </button>
                                    {!! Form::close() !!}

                                    <a href='{{asset("adminpanel/items/".$item->id."/edit")}}' class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</a>

                                    {{ Form::open(array('method' => 'DELETE',"onclick"=>"return confirm('هل انت متأكد ؟!')",'files' => true,'url' => array('adminpanel/items/'.$item->id))) }}
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>  حذف</button> 
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>   

            </div>      
        </div>
    </div>
     
</section>
@endsection

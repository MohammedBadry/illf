@extends('admin.include.master')
@section('title') لوحة التحكم @endsection
@section('content')

<section class="content">
<h2> لوحة التحكم | احصائيات </h2> 

<div class="row">
        

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$allmembers}}</h3>
              <p>العملاء المسجلين بالبريد الإلكترونى</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{asset('adminpanel/users')}}" class="small-box-footer">المزيد<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$phonemembers}}</h3>
              <p>العملاء المسجلين بالهاتف</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{asset('adminpanel/phoneusers')}}" class="small-box-footer">المزيد<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$facebookmembers}}</h3>
              <p>العملاء المسجلين بالفيس بوك</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{asset('adminpanel/facebookusers')}}" class="small-box-footer">المزيد<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$googlemembers}}</h3>
              <p>العملاء المسجلين بجوجل</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{asset('adminpanel/googleusers')}}" class="small-box-footer">المزيد<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$allcategories}}</h3>
              <p>الاقسام</p>
            </div>
            <div class="icon">
              <i class="fa fa-tags"></i>
            </div>
            <a href="{{asset('adminpanel/categories')}}" class="small-box-footer">المزيد<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

    
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$allitems}}</h3>
              <p>المنتجات</p>
            </div>
            <div class="icon">
              <i class="fa fa-tags"></i>
            </div>
            <a href="{{asset('adminpanel/items')}}" class="small-box-footer"> المزيد <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$itemorders}}</h3>
              <p>طلبات المنتجات</p>
            </div>
            <div class="icon">
              <i class="fa fa-tags"></i>
            </div>
            <a href="{{asset('adminpanel/orders')}}" class="small-box-footer"> المزيد <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$allmessages}}</h3>
              <p>رسائل التواصل معنا</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{asset('adminpanel/contactus')}}" class="small-box-footer">المزيد<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
      
</section>
@endsection 
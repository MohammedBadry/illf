@php
    $setting = \DB::table('settings')->first();
@endphp
                                    <div class="total-count cart-flex">
                                        <h2>{{__('messages.total_products')}}</h2>
                                        <p>{{$totalcartitems}}</p>
                                    </div>

                                    <div class="mycharge cart-flex">
                                        <!--h2>الشحن إلى</h2>
                                        <div class="form">
                                            <select class="selectpicker form-control">
                                                <option selected="selected">السعودية</option>
                                                <option value="1">السعودية</option>
                                                <option value="2">السعودية</option>
                                                <option value="3">السعودية</option>
                                            </select>
                                        </div-->
                                        @if($setting->charge_cost>0)
                                        <div class="total-charge cart-flex">
                                            <div>
                                                <h6>{{__('messages.charge_cost')}}</h6>
                                                <span>{{$setting->charge_cost}} {{__('messages.sar')}}</span>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="total-charge cart-flex">
                                            <div>
                                                <h6>{{__('messages.delivery_time')}}</h6>
                                                <span>{{$setting->charge_time}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cart-flex">
                                            <h2>{{__('messages.enter_coupon')}}</h2>
                                            <input type="text" name="coupon_code" id="coupon_code">
                                            <a type="button" href="javascript:;" onclick="use_couopon()" class="btn-red">{{__('messages.execute')}}</a>
                                        </form>
                                    </div>

                                    <div class="total cart-flex">
                                        <div>
                                            <h6>{{__('messages.total_cost')}}</h6>
                                            <span>{{$carttotal}} {{__('messages.sar')}}</span>
                                        </div>
                                    </div>
                                    <div class="cart-flex">

                                    </div>

<script>
    function use_couopon() {
        var code = $('#coupon_code').val();
        if(code>0) {
            $.ajax({
                method: "POST",
                url: "{{url('/coupon')}}/"+code,
                success: function(res) {
                    alert(res);
                    if(res!="Invalid coupon code") {
                        window.location = "";
                    }
                }
            });
        } else {
            alert('Enter coupon code first');
        }
    }
</script>

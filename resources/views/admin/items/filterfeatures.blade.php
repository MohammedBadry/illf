        <div class="form-group col-md-12">
            @if ($errors->has('subfeatures'))
                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('subfeatures') }}</div>
            @endif 

            @foreach($parentfeatures as $parentfeatur)
                <div class="card card-secondary col-md-4">
                    
                    <div class="card-header">
                        <h3 class="card-title">
                            <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="parentfeatures[]" value="{{$parentfeatur->id}}" @if(in_array($parentfeatur->id,$parentitemfeatures)) checked @endif>
                            {{$parentfeatur->arname}}
                        </h3>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    @foreach($subfeatures as $subfeature)
                                        @if($subfeature->parent == $parentfeatur->id)
                                            <div class="custom-control custom-checkbox col-md-6">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="subfeatures[]" value="{{$subfeature->id}}" @if(in_array($subfeature->id,$subitemfeatures)) checked @endif>
                                                <label for="customCheckbox1" class="custom-control-label">{{$subfeature->arname}}</label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
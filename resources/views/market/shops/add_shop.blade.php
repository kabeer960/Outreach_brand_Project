@extends('layouts.app')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-12 bg-white">
                    <div>
                        <div class="">
                            <h2 class="text-center mt-3 mb-3">
                                @if($shop->shop_id == '')
                                    <h1 class="text-center mt-3 mb-3">Add New Shop</h1>
                                @else
                                    <h1 class="text-center mt-3 mb-3">Update Shop</h1>
                                @endif
                            
                        </div>
                        <form method="POST" action="store">
                            @csrf
                            <input type="hidden" value="{{$shop->shop_id??''}}" name="shop_id" class="input_id"/>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <label class="form-label">Shop Code</label>
                                    <input type="text" class="form-control input_code" name="shop_code" value="{{$shop->shop_code??''}}" placeholder="Your Shop name">
                                </div>

                                <div class="col-lg-4">
                                    <label class="form-label">Shop Name</label>
                                    <input type="text" class="form-control input_name" name="shop_name" value="{{$shop->shop_name??''}}" placeholder="Your Shop name">
                                </div>

                                <div class="col-lg-4">
                                    <label class="form-label">Shop Channel</label>
                                    <select name="channel_id" id="channel_name_id" class="form-select">
                                        @foreach($channel_items as $channel_item)
                                        <option  value="{{$channel_item->channel_id}}" {{$channel_item->channel_id== $shop->channel_id ? 'selected':''}}  >{{$channel_item->channel_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <label class="form-label">Shop Class</label>
                                    <select name="class_id" id="class_name_id" class="form-select">
                                        @foreach($class_items as $class_item)
                                        <option value="{{$class_item->class_id}}">{{$class_item->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-4">
                                    <label class="form-label">Shop Category</label>
                                    <select name="shop_category_id" onchange="get_shop_cate(this)" id="shopcategory_name_id" class="form-select">
                                        <option value="">Select Value</option>
                                        @foreach($cate_items as $cate_item)
                                        <option value="{{$cate_item->shop_category_id}}"{{$channel_item->channel_id == $shop->channel_id ? 'selected' : ''}}>{{$cate_item->shop_category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-4">
                                    <label class="form-label">Shop Sub Category</label>
                                    <select name="shop_subcategory_id" id="shopsubcategory_name_id" class="form-select">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                   
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <label class="form-label">Shop Address</label>
                                    <input type="text" class="form-control input_code" name="shop_address" value="{{$shop->shop_address??''}}" placeholder="Your Shop Addres">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-8">
                                    <label class="form-label">Shop Description</label>
                                    <textarea name="shop_description" class="form-control input_des" rows="2" placeholder="Shop Description">{{$shop->shop_description??''}}</textarea>
                                </div>

                                <div class="col-lg-1"></div>
                                <div class="col-lg-2">
                                    <label class="form-label">Shop Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input status_1" value="Active" type="radio" name="shop_status" id="">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input status_2" value="Non Active" type="radio" name="shop_status" id="">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Non Active
                                        </label>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <label class="form-label">Shop Owner Name</label>
                                    <input type="text" class="form-control input_code" name="shop_owner_name" value="{{$shop->shop_owner_name??''}}" placeholder="Shop Owner Name">
                                </div>

                                <div class="col-lg-4">
                                    <label class="form-label">Shop Owner Phone</label>
                                    <input type="number" class="form-control input_name" name="shop_owner_phone" value="{{$shop->shop_owner_phone??''}}" placeholder="Shop Owner Phone">
                                </div>

                                <div class="col-lg-4">
                                    <label class="form-label">Shop Owner Status</label>
                                    <select name="shop_owner_status" id="" class="form-select">
                                        <option value="Filler">Filler</option>
                                        <option value="Non Filler">Non Filler</option>
                                    </select>
                                    
                                </div>
                            </div>


                           

                            <div class="modal-footer">
                                <a class="btn link-secondary" href="/shops">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary ms-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    @if($shop->shop_id == '')
                                        <span class="sub_html">Create new Shop</span>
                                    @else
                                        <span class="sub_html">Update Shop</span>
                                    @endif
                                    
                                </button>
                            </div>
                           
                            
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function get_shop_cate(get_id){
            alert('djkskjcuijdioj');
            $.ajax({
                url: 'shop_category/change/'+id
            }).done(function(res){
                var row='';
                var i=0;
                for( i=0;i<res.length;i++)
                {
                    row += '<option value="'+ res[i].shop_subcategory_id+'">'+ res[i].shop_subcategory_name+ '</option>';
                }

                $('#shopsubcategory_name_id').html(row);
                            
            })
        }
        </script>
@endsection
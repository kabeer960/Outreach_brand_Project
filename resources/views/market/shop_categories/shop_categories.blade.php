@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">
                <h2>
                    {{ __('Shop Categories Page') }}
                </h2> 
            </div>
        

            <div class="col-lg-6"></div>
            <div class="col-lg-3">
                <a class="btn btn-primary d-sm shop_cate_add_btn" style="float:right;">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                Add New Shop Category
                </a>
            </div>
            

        </div>
    </div>


    <div class="page-body">
        <div class="container-xl">

        <div id="modal" class="modal" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Shops Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="shop_cate_form_store">
                            <div class="modal-body">
                                @csrf
                                
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <input type="hidden" name="shop_category_id" class="input_id"/>
                                        <label class="form-label">Shop Category Code</label>
                                        <input type="text" class="form-control input_code" name="shop_category_code" placeholder="Your Shop Category name" required>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">Shop Category Name</label>
                                        <input type="text" class="form-control input_name" name="shop_category_name" placeholder="Your Shop Category name" required>
                                    </div>
                                </div>

                                

                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                    <label class="form-label">Shop Category Description</label>
                                        <textarea name="shop_category_description" class="form-control input_des" rows="3" placeholder="Shop Category Description" required></textarea>
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-label">Shop Category Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input shop_cate_status_1" value="Active" type="radio" name="shop_category_status" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input shop_cate_status_2" value="Non Active" type="radio" name="shop_category_status">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Non Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="submit" class="btn link-secondary">Cancel</button>
                                <button class="btn btn-primary ms-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    <span class="sub_html">Create new Shop Category</span>
                                </button>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
            </div>

            <div class="row">  
                <table class="table bg-white" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Shop Category Code</th>
                            <th scope="col">Shop Category Name</th>
                            <th scope="col">Shop Category Description</th>
                            <th scope="col">Shop Category Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                  
                    <tbody class="list_table">
                        @foreach($items as $item)
                            <tr class="row_table_{{$item->shop_category_id}}">
                                <td>{{$item->shop_category_id}}</th>
                                <td>{{$item->shop_category_code}}</th>
                                <td>{{$item->shop_category_name}}</td>
                                <td>{{$item->shop_category_description}}</td>
                                <td>{{$item->shop_category_status}}</td>
                                
                                <td>
                                    <a role="button" class="shop_cate_edit_btn edit_icon_style" data-id="{{$item->shop_category_id}}"><i class="ti ti-edit"></i></a>
                                    <a role="button" class="shop_cate_del_btn del_icon_style" data-id="{{$item->shop_category_id}}"><i class="ti ti-basket"></i></a>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script type="text/javascript">

        
    </script>

@endsection
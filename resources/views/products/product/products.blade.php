@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-2">
                <h2>
                    {{ __('Products Page') }}
                </h2> 
            </div>
        

            <div class="col-lg-7"></div>
            <div class="col-lg-3">
                <a class="btn btn-primary d-sm product_add_btn" style="float:right;">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                Add New Product
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
                            <h5 class="modal-title">Add New Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="product_form_store">
                            <div class="modal-body">
                                @csrf
                                <input type="hidden" name="product_id" class="input_id"/>
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label class="form-label">Product Code</label>
                                        <input type="text" class="form-control input_code" name="product_code" placeholder="Your Product name" required>
                                        
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" class="form-control input_name" name="product_name" placeholder="Your Product name" required>
                                        
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="form-label">Product Brand</label>
                                        <input type="text" class="form-control input_brand" name="product_brand" placeholder="Your Product Brand Name" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    

                                    <div class="col-lg-6">
                                        <label class="form-label">Product Type</label>
                                        <input type="text" class="form-control input_type" name="product_type" placeholder="Your Product Type Name" required>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">Product Group</label>
                                        <input type="text" class="form-control input_group" name="product_group" placeholder="Your Product Group Name" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <label class="form-label">Category</label>
                                        <select name="category_id" id="product_name_id1" onchange="get_cate(this)" class="form-select" required>
                                            <option value="">Select Option</option>
                                            @foreach($members as $member)
                                            <option value="{{$member->category_id}}">{{$member->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Subcategory</label>
                                        <select name="subcategory_id" id="product_name_id2" class="form-select" required>
                                        <option value=""></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">

                                    <div class="col-lg-8">
                                        <label class="form-label">Product Description</label>
                                        <textarea name="product_description" class="form-control input_des" rows="2" placeholder="Product Description" required></textarea>
                                    </div>
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-2">
                                        <label class="form-label">Product Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="product_status_1" value="Active" type="radio" name="product_status" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="product_status_2" value="Non Active" type="radio" name="product_status">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Non Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <a class="btn link-secondary" data-bs-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn btn-primary ms-auto submit_btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    <span class="sub_html">Create new Product</span>
                                </button>
                            </div>
                                
                        </form>
                        
                    </div>
                </div>
            </div>
   
            <div class="row"> 
                <div class="col-lg-12">
                    <table class="table bg-white" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Code</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Description</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Sub Category Name</th>
                                <th scope="col">Product Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody class="list_table">
                            @foreach($items as $item)
                                <tr class="row_table_{{$item->product_id}}">
                                    <td>{{$item->product_id}}</th>
                                    <td>{{$item->product_code}}</th>
                                    <td>{{$item->product_name}}</td>
                                    <td>{{$item->product_description}}</td>
                                    <td>{{$item->category->category_name}}</td>
                                    <td>{{$item->subcategory->subcategory_name}}</td>
                                    <td>{{$item->product_status}}</td>
                                    <td>
                                    <a role="button" class="product_edit_btn edit_icon_style" data-id="{{$item->product_id}}"><i class="ti ti-edit"></i></a>
                                    <a role="button" class="product_del_btn del_icon_style" data-id="{{$item->product_id}}"><i class="ti ti-basket"></i></a>
                                    </td>
                                </tr>
                                    
                            @endforeach
                        </tbody>
                    </table>
                </div> 
                    

            </div>
           
        </div>
    </div>
@endsection
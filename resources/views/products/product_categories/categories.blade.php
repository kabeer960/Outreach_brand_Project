@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-2">
                <h2>
                    {{ __('Categories Page') }}
                </h2> 
            </div>

            <div class="col-lg-7"></div>
            <div class="col-lg-3">
                <a class="btn btn-primary d-sm category_add_btn" style="float:right;">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                Add New Category
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
                            <h5 class="modal-title">Add New Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="category_form_store">
                            <div class="modal-body">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <input type="hidden" name="category_id" class="input_id"/>
                                        <label class="form-label">Category Code</label>
                                        <input type="text" class="form-control input_code" name="category_code" placeholder="Your Category name" required>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">Category Name</label>
                                        <input type="text" class="form-control input_name" name="category_name" placeholder="Your Category name" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <label class="form-label">Category Description</label>
                                        <textarea name="category_description" class="form-control input_des" rows="3" placeholder="Category Description" required></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-label">Category Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input category_status_1" value="Active" type="radio" name="category_status" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input category_status_2" value="Non Active" type="radio" name="category_status">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Non Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <a class="btn link-secondary" data-bs-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn btn-primary ms-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    <span class="category_sub_html">Create new Category</span>
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
                            <th scope="col">Category Code</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Category Description</th>
                            <th scope="col">Category Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                  
                    <tbody class="list_table">
                        @foreach($items as $item)
                            <tr class="row_table_{{$item->category_id}}">
                                <td>{{$item->category_id}}</th>
                                <td>{{$item->category_code}}</th>
                                <td>{{$item->category_name}}</td>
                                <td>{{$item->category_description}}</td>
                                <td>{{$item->category_status}}</td>
                                <td>
                                    <a role="button" class="category_edit_btn edit_icon_style" data-id="{{$item->category_id}}"><i class="ti ti-edit"></i></a>
                                    <a role="button" class="category_del_btn del_icon_style" data-id="{{$item->category_id}}"><i class="ti ti-basket"></i></a>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>

            </div>



        </div>
    </div>

@endsection
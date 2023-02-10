@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="row mt-4">
            <div class="col-lg-2">
                <h2>
                    {{ __('Companies Page') }}
                </h2>
            </div>
            
           <div class="col-lg-7"></div>
            <div class="col-lg-3">
                <a class="btn btn-primary d-sm com_add_btn" style="float:right;">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                Add New Company
                </a>
            </div>
        </div>
    
        <div class="page-body">
            <div class="container-xl">

                
                <div id="modal" class="modal" tabindex="-1">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Shop</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="companies_form_store">
                                <div class="modal-body">
                                    @csrf
                                    <input type="hidden" name="company_id" class="input_id"/>
                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                            <label class="form-label">Comapny Code</label>
                                            <input type="text" class="form-control input_code" name="company_code" placeholder="Your Company Code" required>
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="form-label">Comapny Name</label>
                                            <input type="text" class="form-control input_name" name="company_name" placeholder="Your Company Name" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-12">
                                            <label class="form-label">Company Description</label>
                                            <textarea name="company_description" class="form-control input_des" rows="3" placeholder="Company Description" required></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label class="form-label">Company Status</label>
                                            <div class="form-check">
                                                <input class="form-check-input com_status_1" value="Active" type="radio" name="company_status" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Active
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input com_status_2" value="Non Active" type="radio" name="company_status">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Non Active
                                                </label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <a class="btn link-secondary" data-bs-dismiss="modal">
                                    Cancel
                                    </a>
                                    <button class="btn btn-primary ms-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    <span class="sub_html">Create new report</span>
                                </button>
                            </div>
                            </form>
                            
                        </div>
                    </div>
                </div>

                
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-vcenter bg-white" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Company Code</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Company Description</th>
                                    <th scope="col">Company Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="list_table">
                            @foreach($items as $item)
                                <tr class="row_table_{{$item->company_id}}">
                                    <td>{{$item->company_id}}</td>
                                    <td>{{$item->company_code}}</td>
                                    <td>{{$item->company_name}}</td>
                                    <td>{{$item->company_description}}</td>
                                    <td>{{$item->company_status}}</td>
                                    <td>
                                        <a role="button" id="edit_btn" class="com_edit_btn edit_icon_style" data-id="{{$item->company_id}}"><i class="ti ti-edit"></i></a>
                                        <a role="button" id="del_btn" class="com_del_btn del_icon_style" data-id="{{$item->company_id}}"><i class="ti ti-basket"></i></a>
                                    </td>
                                </tr>
                                
                            @endforeach
                                
                            </tbody>
                        </table>

                        
                    </div>
                </div>

            </div>
           
        </div>
    </div>

@endsection

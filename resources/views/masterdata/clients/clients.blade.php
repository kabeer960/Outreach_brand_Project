@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="row mt-4">
            <div class="col-lg-2">
                <h2>
                    {{ __('Clients Page') }}
                </h2>
            </div>
            <div class="col-lg-7"></div>
            <div class="col-lg-3">
                <a class="btn btn-primary d-sm client_add_btn" style="float:right;">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                Add New Client
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
                            <h5 class="modal-title">Add New Shop</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" required></button>
                        </div>
                        <form class="client_form_store">
                            <div class="modal-body">
                                @csrf
                                <input type="hidden" name="client_id" class="input_id"/>
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <label class="form-label">Client Code</label>
                                        <input type="text" class="form-control input_code" name="client_code" placeholder="Your Client Code" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Client Name</label>
                                        <input type="text" class="form-control input_name" name="client_name" placeholder="Your Client Name" required>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-label">Client Description</label>
                                        <textarea name="client_description" class="form-control input_des" rows="3" placeholder="Your Client Description" required></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <label class="form-label">Client Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input cli_status_1" value="Active" type="radio" name="client_status" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input cli_status_2" value="Non Active" type="radio" name="client_status">
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
                                <span class="sub_html">Create new Client</span>
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
                            <th scope="col">Client Code</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Client Description</th>
                            <th scope="col">Client Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                  
                    <tbody class="list_table">
                        @foreach($items as $item)
                            <tr class="row_table_{{$item->client_id}}">
                                <td>{{$item->client_id}}</td>
                                <td>{{$item->client_code}}</td>
                                <td>{{$item->client_name}}</td>
                                <td>{{$item->client_description}}</td>
                                <td>{{$item->client_status}}</td>
                                <td>
                                    <a role="button" class="client_edit_btn edit_icon_style" data-id="{{$item->client_id}}"><i class="ti ti-edit"></i></a>
                                    <a role="button" class="client_del_btn del_icon_style" data-id="{{$item->client_id}}"><i class="ti ti-basket"></i></a>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

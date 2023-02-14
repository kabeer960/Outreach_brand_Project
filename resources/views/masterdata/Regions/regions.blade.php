@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="row mt-4">
            <div class="col-lg-2">
                <h2>
                    {{ __('Regions Page') }}
                </h2>
            </div>
            <div class="col-lg-7"></div>
            <div class="col-lg-3">
                <a class="btn btn-primary d-sm region_add_btn" style="float:right;">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                Add New Region
                </a>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            
            <div id="modal" class="modal" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Region</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <form class="region_form_store">
                            <div class="modal-body"> 
                                @csrf
                                <input type="hidden" name="region_id" class="input_id"/>
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <label class="form-label">Region Code</label>
                                        <input type="text" class="form-control input_code" name="region_code" placeholder="Your Region Code" required>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">Region Name</label>
                                        <input type="text" class="form-control input_name" name="region_name" placeholder="Your Region Name" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <label class="form-label">Region Description</label>
                                        <input type="text" class="form-control input_des" name="region_description" placeholder="Your Region Description" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                           
                                        <label class="form-label">Zone</label>
                                        <select name="zone_id" id="region_name_id" class="form-select" required>
                                            @foreach($members as $member)
                                            <option value="{{$member->zone_id}}">{{$member->zone_name}}</option>
                                            @endforeach
                                        </select>
            
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-label">Region Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input region_status_1" value="Active" type="radio" name="region_status" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                    Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input region_status_2" value="Non Active" type="radio" name="region_status">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Non Active
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <a class="btn link-secondary" data-bs-dismiss="modal">Cancel</a>
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                        <span class="sub_html">Create new Region</span>
                                    </button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>

        <div class="container-xl">

            <div class="row">
                
                <table class="table bg-white" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Region Code</th>
                            <th scope="col">Region Name</th>
                            <th scope="col">Region Description</th>
                            <th scope="col">Zone Name</th>
                            <th scope="col">Region Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                  
                    <tbody class="list_table">
                        @foreach($items as $item)
                            <tr class="row_table_{{$item->region_id}}">
                                <td>{{$item->region_id}}</th>
                                <td>{{$item->region_code}}</th>
                                <td>{{$item->region_name}}</td>
                                <td>{{$item->region_description}}</td>
                                <td>{{$item->zone->zone_name}}</td>
                                <td>{{$item->region_status}}</td>
                                <td>
                                    <a role="button" class="region_edit_btn edit_icon_style" data-id="{{$item->region_id}}"><i class="ti ti-edit"></i></a>
                                    <a role="button" class="region_del_btn del_icon_style" data-id="{{$item->region_id}}"><i class="ti ti-basket" ></i></a>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
    
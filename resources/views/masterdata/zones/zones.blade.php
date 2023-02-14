@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="row mt-4">
            <div class="col-lg-2">
                <h2>
                    {{ __('Zones Page') }}
                </h2>
            </div>
            <div class="col-lg-7"></div>
            <div class="col-lg-3">
                <a class="btn btn-primary d-sm zone_add_btn" style="float:right;">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                Add New Zone
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
                            <h5 class="modal-title">Add New Zone</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <form class="zone_form_store">
                            <div class="modal-body">
                                @csrf
                                <input type="hidden" name="zone_id" class="input_id"/>
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <label class="form-label">Zone Code</label>
                                        <input type="text" class="form-control input_code" name="zone_code" placeholder="Your Zone Code" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Zone Name</label>
                                        <input type="text" class="form-control input_name" name="zone_name" placeholder="Your Zone Name" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <label class="form-label">Zone Description</label>
                                        <input type="text" class="form-control input_des" name="zone_description" placeholder="Your Zone Description" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                           
                                        <label class="form-label">City</label>
                                        <select name="city_id" id="zone_name_id" class="form-select" required>
                                            @foreach($members as $member)
                                            <option value="{{$member->city_id}}">{{$member->city_name}}</option>
                                            @endforeach
                                        </select>
            
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-label">Zone Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input zone_status_1" value="Active" type="radio" name="zone_status" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                    Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input zone_status_2" value="Non Active" type="radio" name="zone_status">
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
                                    <span class="sub_html">Create new Zone</span>
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
                            <th scope="col">Zone Code</th>
                            <th scope="col">Zone Name</th>
                            <th scope="col">Zone Description</th>
                            <th scope="col">City Name</th>
                            <th scope="col">Zone Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                  
                    <tbody class="list_table">
                        @foreach($items as $item)
                            <tr class="row_table_{{$item->zone_id}}">
                                <td>{{$item->zone_id}}</th>
                                <td>{{$item->zone_code}}</th>
                                <td>{{$item->zone_name}}</td>
                                <td>{{$item->zone_description}}</td>
                                <td>{{$item->city->city_name}}</td>
                                <td>{{$item->zone_status}}</td>
                                <td>
                                    <a role="button" class="zone_edit_btn edit_icon_style" data-id="{{$item->zone_id}}"><i class="ti ti-edit"></i></a>
                                    <a role="button" class="zone_del_btn del_icon_style" data-id="{{$item->zone_id}}"><i class="ti ti-basket" ></i></a>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>

            </div>
              
        
        </div>
    </div>

@endsection

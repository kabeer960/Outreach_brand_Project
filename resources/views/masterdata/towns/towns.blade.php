@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="row mt-4">
            <div class="col-lg-2">
                <h2>
                    {{ __('Towns Page') }}
                </h2>
            </div>
            <div class="col-lg-7"></div>
            <div class="col-lg-3">
                <a class="btn btn-primary d-sm town_add_btn" style="float:right;">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                Add New Town
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
                            <h5 class="modal-title">Add New Town</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <form class="town_form_store">
                            <div class="modal-body">
                                @csrf
                                <input type="hidden" name="town_id" class="input_id"/>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <label class="form-label">Town Code</label>
                                        <input type="text" class="form-control input_code" name="town_code" placeholder="Your Town Code" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <label class="form-label">Town Name</label>
                                        <input type="text" class="form-control input_name" name="town_name" placeholder="Your Town Name" required>
                                    </div>

                                    <div class="col-lg-12">
                                        <label class="form-label">Town Description</label>
                                        <input type="text" class="form-control input_des" name="town_description" placeholder="Your Town Description" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                           
                                        <label class="form-label">Area</label>
                                        <select name="area_id" id="town_name_id" class="form-select" required>
                                            @foreach($members as $member)
                                            <option value="{{$member->area_id}}">{{$member->area_name}}</option>
                                            @endforeach
                                        </select>
            
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-label">Town Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input town_status_1" value="Active" type="radio" name="town_status" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                    Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input town_status_2" value="Non Active" type="radio" name="town_status">
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
                                        <span class="sub_html">Create new Town</span>
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
                            <th scope="col">Town Code</th>
                            <th scope="col">Town Name</th>
                            <th scope="col">Town Description</th>
                            <th scope="col">Area Name</th>
                            <th scope="col">Town Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                  
                    <tbody class="list_table">
                        @foreach($items as $item)
                            <tr class="row_table_{{$item->town_id}}">
                                <td>{{$item->town_id}}</th>
                                <td>{{$item->town_code}}</th>
                                <td>{{$item->town_name}}</td>
                                <td>{{$item->town_description}}</td>
                                <td>{{$item->area->area_name}}</td>
                                <td>{{$item->town_status}}</td>
                                <td>
                                    <a role="button" class="town_edit_btn edit_icon_style" data-id="{{$item->town_id}}"><i class="ti ti-edit"></i></a>
                                    <a role="button"class="town_del_btn del_icon_style" data-id="{{$item->town_id}}"><i class="ti ti-basket" ></i></a>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
    
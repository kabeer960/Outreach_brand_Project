@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-3">
                <h2>{{ __('Surveys Page') }}</h2>   
            </div>
            <div class="col-lg-6"></div>
            <div class="col-lg-3">
                <a class="btn btn-primary d-sm surveys_add_btn" style="float:right;">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                    Add New Survey
                </a>
            </div>
        </div>


        <div id="modal" class="modal" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Survey</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="surveys_form_store">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="survey_id" class="input_id"/>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label class="form-label">Survey Code</label>
                                    <input type="text" class="form-control input_code" name="survey_code" placeholder="Your Survey Code" required>
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-label">Survey Name</label>
                                    <input type="text" class="form-control input_name" name="survey_name" placeholder="Your Survey Name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <label class="form-label">Compaign Name</label>
                                    <select name="compaign_id" id="survey_name_id" class="survey_name_id form-select" required>
                                        @foreach($members as $member)
                                        <option value="{{$member->compaign_id}}">{{$member->compaign_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-8">
                                    <label class="form-label">Survey Description</label>
                                    <textarea name="survey_description" class="form-control input_des" rows="2" placeholder="Survey Description" required></textarea>
                                </div>

                                <div class="col-lg-1"></div>
                                <div class="col-lg-3 mt-1">
                                    <label class="form-label">Survey Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input survey_status_1" value="Active" type="radio" name="survey_status" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input survey_status_2" value="Non Active" type="radio" name="survey_status">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Non Active
                                        </label>
                                    </div>
                                </div> 
                            </div>


                        </div>

                        <div class="modal-footer">
                            <a class="btn link-secondary" data-bs-dismiss="modal">Cancel</a>
                            <button class="btn btn-primary ms-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                <span class="sub_html">Create new Survey</span>
                            </button>
                        </div>
                            
                    </form>
                            
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-3">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-vcenter bg-white" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Survey Code</th>
                            <th scope="col">Survey Name</th>
                            <th scope="col">Survey Description</th>
                            <th scope="col">Compaign Name</th>
                            <th scope="col">Survey Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                            
                    <tbody class="list_table">
                        @foreach($items as $item)
                        <tr class="row_table_{{$item->survey_id}}">
                            <td>{{$item->survey_id}}</td>
                            <td>{{$item->survey_code}}</td>
                            <td>{{$item->survey_name}}</td>
                            <td>{{$item->survey_description}}</td>
                            <td>{{$item->compaign->compaign_name}}</td>
                            <td>{{$item->survey_status}}</td>
                            <td>
                                <a role="button" id="edit_btn" class="surveys_edit_btn edit_icon_style" data-id="{{$item->survey_id}}"><i class="ti ti-edit"></i></a>
                                <a role="button" id="del_btn" class="surveys_del_btn del_icon_style" data-id="{{$item->survey_id}}"><i class="ti ti-basket"></i></a>
                                <a href="questionaires/{{$item->survey_id}}" data-id="{{$item->survey_id}}">Add Question</a>
                            </td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
                        
            </div>
        </div>
    </div>
@endsection
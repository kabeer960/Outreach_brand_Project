@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-3">
                <h2>{{ __('Questionaires Page') }}</h2>   
            </div>
            <div class="col-lg-6"></div>
            <div class="col-lg-3">
                <a class="btn btn-primary d-sm questionaires_add_btn" style="float:right;">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                    Add New Question
                </a>
            </div>
        </div>


        <div id="modal" class="modal" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Question</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="questionaires_form_store">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="question_id" class="input_id"/>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label class="form-label">Question Code</label>
                                    <input type="text" class="form-control input_code" name="question_code" placeholder="Your Question Code" required>
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-label">Question Name</label>
                                    <input type="text" class="form-control input_name" name="question_name" placeholder="Your Question Name" required>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-lg-8">
                                    <label class="form-label">Question Description</label>
                                    <textarea name="question_description" class="form-control input_des" rows="2" placeholder="Question Description" required></textarea>
                                </div>

                                <div class="col-lg-1"></div>
                                <div class="col-lg-3 mt-1">
                                    <label class="form-label">Question Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input questionaires_status_1" value="Active" type="radio" name="question_status" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input questionaires_status_2" value="Non Active" type="radio" name="question_status">
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
                                <span class="sub_html">Create new Question</span>
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
                            <th scope="col">Question Code</th>
                            <th scope="col">Question Name</th>
                            <th scope="col">Question Description</th>
                            <th scope="col">Question Status</th>
                            <th scope="col">Survey Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                            
                    <tbody class="list_table">
                        @foreach($items as $item)
                        <tr class="row_table_{{$item->question_id}}">
                            <td>{{$item->question_id}}</td>
                            <td>{{$item->question_code}}</td>
                            <td>{{$item->question_name}}</td>
                            <td>{{$item->question_description}}</td>
                            <td>{{$item->question_status}}</td>
                            <td>{{$item->survey->survey_name}}</td>
                            <td>
                                <a role="button" id="edit_btn" class="questionaires_edit_btn edit_icon_style" data-id="{{$item->question_id}}"><i class="ti ti-edit"></i></a>
                                <a role="button" id="del_btn" class="questionaires_del_btn del_icon_style" data-id="{{$item->question_id}}"><i class="ti ti-basket"></i></a>
                            </td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
                        
            </div>
        </div>
    </div>
@endsection
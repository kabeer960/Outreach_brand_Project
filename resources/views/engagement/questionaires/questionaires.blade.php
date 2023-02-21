@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-3">
                <h2>{{ __('Questionaires Page') }}</h2>   
            </div>
            <div class="col-lg-6"></div>
            <div class="col-lg-3">
                <a class="btn btn-primary d-sm " href="/surveys" style="float:right;">
                    Save
                </a>
            </div>
        </div>

        <div class="row mt-3">
            
            <div class="col-lg-12 bg-white">
                <form class="questionaires_form_store" action="store" method="POST">
                    <div class="mt-3">
                        @csrf
                        <input type="hidden" name="question_id" class="input_id"/>
                        
                        <input type="hidden" name="survey_id" value="{{$sid}}">
                    
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

                        <div class="row">
                            <div class="col-lg-12">
                                <select name="question_type" class="form-select questionaire_type" id="">
                                    <option value="Multiple">Multipule</option>
                                    <option value="Text">Text</option>
                                    <option value="Image">Image</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="text-center mt-4 mb-3">
                        <button class="btn btn-primary ms-auto">
                            <span class="sub_html">Add</span>
                        </button>
                    </div>
                                
                </form>
            </div>
        </div>
    </div>



    <div class="container mt-3">
        <div class="row mt-3">
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
                            <th scope="col">Question Type</th>
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
                            <td>{{$item->question_type}}</td>
                            <td>
                                <a role="button" id="edit_btn" class="questionaires_edit_btn edit_icon_style" data-id="{{$item->question_id}}"><i class="ti ti-edit"></i></a>
                                <a role="button" id="del_btn" class="questionaires_del_btn del_icon_style" data-id="{{$item->question_id}}"><i class="ti ti-basket"></i></a>
                                <a class="btn btn-sm mb-1 btn-success" href="answers/{{$item->question_id}}">Add Answers</a>
                            </td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
                        
            </div>
        </div>
    </div>
@endsection
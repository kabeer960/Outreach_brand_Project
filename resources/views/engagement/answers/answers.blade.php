@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3 bg-white">
            <div class="col-lg-3 mt-3">
                <h2>{{ __('Answers Page') }}</h2>   
            </div>
            <div class="col-lg-6 mt-3"></div>
            <div class="col-lg-3 mt-3 ">
                <a class="btn btn-primary d-sm " href="/questionaires/{{$qitem->survey_id}}" style="float:right;">
                    Save
                </a>
            </div>

            <div class="col-lg-12">
                <form class="answers_form_store" action="store" method="POST" enctype="multipart/form-data">
                    <div class="mt-3">
                        @csrf
                        <input type="hidden" name="answer_id" class="input_id"/>
                       
                        <input type="hidden" name="question_id" value="{{$qitem->question_id}}">
                    
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label class="form-label">Answer Code</label>
                                <input type="text" class="form-control input_code" name="answer_code" placeholder="Your Answer Code" required>
                            </div>
                          
                            @if($qitem->question_type == 'Multiple' || $qitem->question_type == 'Text')
                            <div class="col-lg-4">
                                <label class="form-label">Write Answer</label>
                                <input type="text" class="form-control input_body" name="answer_body" placeholder="Write Answer">
                            </div>
                            @elseif($qitem->question_type == 'Image')
                            <div class="col-lg-1"></div>
                            <div class="col-lg-4 mt-4">
                                <input type="file" name="answer_image">
                            </div>
                            @endif

                            @if($qitem->question_type == 'Multiple')
                            <div class="col-lg-1"></div>
                            <div class="col-lg-2">
                                <label class="mt-4 fw-bold">Correct Answer</label>
                                <input type="checkbox" class="input_condition" name="answer_condition">
                            </div>
                            @endif
                        </div>
                        


                        <div class="row mb-3">
                            <div class="col-lg-8">
                                <label class="form-label">Answer Description</label>
                                <textarea name="answer_description" class="form-control input_des" rows="2" placeholder="Answer Description" required></textarea>
                            </div>

                            <div class="col-lg-1"></div>
                            <div class="col-lg-3 mt-1">
                                <label class="form-label">Answer Status</label>
                                <div class="form-check">
                                    <input class="form-check-input answers_status_1" value="Active" type="radio" name="answer_status" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input answers_status_2" value="Non Active" type="radio" name="answer_status">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Non Active
                                    </label>
                                </div>
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
                            <th scope="col">Answer Code</th>
                            <th scope="col">Answer</th>
                            <th scope="col">Answer Description</th>
                            <th scope="col">Answer Status</th>
                            <th scope="col">Question Name</th>
                            <th scope="col">Answer</th>
                            @if($qitem->question_type == 'Multiple')
                            <th scope="col">Actions type</th>
                            @endif
                        </tr>
                    </thead>
                            
                    <tbody class="list_table">
                        @foreach($items as $item)
                        <tr class="row_table_{{$item->answer_id}}">
                            <td>{{$item->answer_id}}</td>
                            <td>{{$item->answer_code}}</td>
                            @if($qitem->question_type == 'Text' || $qitem->question_type == 'Multiple')
                            <td>{{$item->answer_body}}</td>
                            @elseif($qitem->question_type == 'Image')
                            <td>{{$item->answer_image}}</td>
                            @endif
                            <td>{{$item->answer_description}}</td>
                            <td>{{$item->answer_status}}</td>
                            <td>{{$item->questionaire->question_name}}</td>
                            @if($qitem->question_type == 'Multiple')
                                @if($item->answer_condition == 1)
                                    <td class="text-success">Correct</td>
                                @else
                                    <td class="text-danger">Wrong</td>
                                @endif
                            @endif

                            <td>
                                <a role="button" id="edit_btn" class="answers_edit_btn edit_icon_style" data-id="{{$item->answer_id}}"><i class="ti ti-edit"></i></a>
                                <a role="button" id="del_btn" class="answers_del_btn del_icon_style" data-id="{{$item->answer_id}}"><i class="ti ti-basket"></i></a>
                            </td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
                        
            </div>
        </div>
    </div>
@endsection
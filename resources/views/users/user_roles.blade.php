@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-2">
                <h2>
                    {{ __('User Roles Page') }}
                </h2> 
            </div>
        

            <div class="col-lg-7"></div>
            <div class="col-lg-3">
                <a class="btn btn-primary d-sm add_btn" style="float:right;">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                Add New Role
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
                            <h5 class="modal-title">Add New Role</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="modal-body form_store" id="form_vali">
                            @csrf
                            <input type="hidden" name="user_role_id" class="input_id"/>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label class="form-label">User Code</label>
                                    <input type="text" class="form-control input_code" name="user_role_code" placeholder="Your Role Code">
                                    <span class="product_code_err" style="color:red"></span>
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-label">User Name</label>
                                    <input type="text" class="form-control input_name" name="user_role_name" placeholder="Your Role name">
                                    <span class="product_name_err" style="color:red"></span>
                                </div>

                            </div>

                            <div class="row mb-4">

                                <div class="col-lg-8">
                                    <label class="form-label">User Description</label>
                                    <textarea name="user_role_description" class="form-control input_des" rows="2" placeholder="Product Description"></textarea>
                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-2">
                                    <label class="form-label">Role Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input status_1" value="Active" type="radio" name="user_role_status" id="">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input status_2" value="Non Active" type="radio" name="user_role_status" id="">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Non Active
                                        </label>
                                    </div>
                                </div>
                            </div>

                            
                                
                        </form>
                        <div class="modal-footer">
                                <a class="btn link-secondary" data-bs-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn btn-primary ms-auto submit_btn" data-bs-dismiss="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    <span class="sub_html">Create new Role</span>
                                </button>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="row"> 
                <div class="col-lg-12">
                    <table class="table bg-white" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User_role Code</th>
                                <th scope="col">User_role Name</th>
                                <th scope="col">User_role Description</th>
                                <th scope="col">User_role Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody class="list_table">
                            @foreach($items as $item)
                                <tr class="row_table_{{$item->user_role_id}}">
                                    <td>{{$item->user_role_id}}</th>
                                    <td>{{$item->user_role_code}}</th>
                                    <td>{{$item->user_role_name}}</td>
                                    <td>{{$item->user_role_description}}</td>
                                    <td>{{$item->user_role_status}}</td>
                                    <td>
                                    <a role="button" class="edit_btn" data-id="{{$item->user_role_id}}"><i class="ti ti-edit"></i></a>
                                    <a role="button" class="del_btn" data-id="{{$item->user_role_id}}"><i class="ti ti-basket"></i></a>
                                    </td>
                                </tr>
                                    
                            @endforeach
                        </tbody>
                    </table>
                </div> 
                    

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
           $('#myTable').DataTable()
            
        });

        $('body').on('click', '.add_btn', function(){
            $('.form_store').trigger('reset');
            $('.status_1').attr('checked', null); 
            $('.status_2').attr('checked', null);
            $(".input_id[type=hidden]").val('');
            
            $('.modal-title').html('Add New Role');
            $('.sub_html').html('Add New Role');
            $('#modal').modal('show');
        });

        $('body').on('click', '.edit_btn', function(){
            $('.form_store').trigger('reset');
            $('.modal-title').html('Edit Role');
            $('.sub_html').html('Update Role');
            $('#modal').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: 'user_roles/edit/'+id
            }).done(function(res){
                $('.input_id').val(res.user_role_id);
                $('.input_code').val(res.user_role_code);
                $('.input_name').val(res.user_role_name);
                $('.input_des').val(res.user_role_description);
                if(res.user_role_status == 'Active'){
                    $('.status_1').attr('checked', 'checked');  
                        
                    $('.status_2').attr('checked', null); 
                }else{
                    $('.status_2').attr('checked', 'checked'); 
                        
                    $('.status_1').attr('checked', null); 
                }
            })
        });

        $('body').on('click', '.submit_btn', function(e){
            e.preventDefault();
            $.ajax({
                url: 'user_roles/store',
                data: $('.form_store').serialize(),
                type: 'POST'
            }).done(function(res){

                var row = '<tr class="row_table_'+res.user_role_id+'">';
                row += '<td>'+res.user_role_id+ '</td>';
                row += '<td>'+res.user_role_code+ '</td>';
                row += '<td>'+res.user_role_name+'</td>';
                row += '<td>'+res.user_role_description+'</td>';
                row += '<td>'+res.user_role_status+'</td>';
                row += '<td><a role="button" class="edit_btn" data-id="'+res.user_role_id+'"><i class="ti ti-edit"></i></a><a role="button" class="del_btn" style="margin-left:4px;" id="del_btn" data-id="'+res.user_role_id+'"><i class="ti ti-basket"></i></a></td>';
                if($('.input_id').val()!=''){
                    $('.row_table_'+res.user_role_id).replaceWith(row);
                }else{
                    $('.list_table').prepend(row);
                }

                $('.form_store').trigger('reset');
                $('#modal').modal('hide');
                

                
            });
        });

    </script>
@endsection
@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-2">
                <h2>
                    {{ __('Shop Subcategories Page') }}
                </h2> 
            </div>
        

            <div class="col-lg-7"></div>
            <div class="col-lg-3">
                <a class="btn btn-primary d-sm add_btn" style="float:right;">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                Add New Shop Subcategory
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
                            <h5 class="modal-title">Add New Shops Subcategory</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="modal-body form_store">
                            @csrf
                            
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <input type="hidden" name="shop_subcategory_id" class="input_id"/>
                                    <label class="form-label">Shop Subcategory Code</label>
                                    <input type="text" class="form-control input_code" name="shop_subcategory_code" placeholder="Your Shop Subcategory name">
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-label">Shop Subcategory Name</label>
                                    <input type="text" class="form-control input_name" name="shop_subcategory_name" placeholder="Your Shop Sub category name">
                                </div>
                            </div>

                            

                            <div class="row mb-3">
                                <div class="col-lg-12">
                                <label class="form-label">Shop Subcategory Description</label>
                                    <textarea name="shop_subcategory_description" class="form-control input_des" rows="3" placeholder="Shop Sub category Description"></textarea>
                                </div>
                                
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <label class="form-label">Shop Category</label>
                                    <select name="shop_category_id" id="shop_subcategory_name_id" class="form-select">
                                        @foreach($members as $member)
                                        <option value="{{$member->shop_category_id}}">{{$member->shop_category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="form-label">Shop Sub category Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input status_1" value="Active" type="radio" name="shop_subcategory_status" id="">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input status_2" value="Non Active" type="radio" name="shop_subcategory_status" id="">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Non Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </form>
                        <div class="modal-footer">
                            <a class="btn link-secondary" data-bs-dismiss="modal">Cancel</a>
                            <a class="btn btn-primary ms-auto submit_btn" data-bs-dismiss="modal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                <span class="sub_html">Create new Shop Subcategory</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">  
                <table class="table bg-white" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Shop Sub category Code</th>
                            <th scope="col">Shop Sub category Name</th>
                            <th scope="col">Shop Sub category Description</th>
                            <th scope="col">Shop Sub category Status</th>
                            <th scope="col">Shop Sub category Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                  
                    <tbody class="list_table">
                        @foreach($items as $item)
                            <tr class="row_table_{{$item->shop_subcategory_id}}">
                                <td>{{$item->shop_subcategory_id}}</th>
                                <td>{{$item->shop_subcategory_code}}</th>
                                <td>{{$item->shop_subcategory_name}}</td>
                                <td>{{$item->shop_subcategory_description}}</td>
                                <td>{{$item->shop_subcategory_status}}</td>
                                <td>{{$item->shopcategory->shop_category_name}}</td>
                                
                                
                                <td>
                                    <a role="button" class="edit_btn" data-id="{{$item->shop_subcategory_id}}"><i class="ti ti-edit"></i></a>
                                    <a role="button" class="del_btn" data-id="{{$item->shop_subcategory_id}}"><i class="ti ti-basket"></i></a>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#myTable').DataTable();
        });

        $('body').on('click', '.add_btn', function(){
            $('.form_store').trigger('reset');
            $('.status_1').attr('checked', null); 
            $('.status_2').attr('checked', null); 
            $(".input_id[type=hidden]").val('');
            $('.modal-title').html('Add New Shop Subcategory');
            $('.sub_html').html('Add New Shop Subcategory');
            $('#modal').modal('show');
        });

        $('body').on('click', '.edit_btn', function(){
            $('.form_store').trigger('reset');
            $('.modal-title').html('Edit Shop Sub category');
            $('.sub_html').html('Update Shop Sub category');
            $('#modal').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: 'shop_subcategory/edit/'+id
            }).done(function(res){
                $('.input_id').val(res.shop_subcategory_id);
                $('.input_code').val(res.shop_subcategory_code);
                $('.input_name').val(res.shop_subcategory_name);
                $('.input_des').val(res.shop_subcategory_description);
                $('#shop_subcategory_name_id').val(res.shopcategory.shop_category_id);
                if(res.shop_subcategory_status == 'Active'){
                    $('.status_1').attr('checked', 'checked');  
                        
                    $('.status_2').attr('checked', null); 
                }else{
                    $('.status_2').attr('checked', 'checked'); 
                        
                    $('.status_1').attr('checked', null); 
                }
            })
        })

        $('body').on('click', '.submit_btn', function(e){
            e.preventDefault();
            $.ajax({
                url: 'shop_subcategory/store',
                data: $('.form_store').serialize(),
                type: 'POST'
            }).done(function(res){
                var row = '<tr class="row_table_'+res.shop_subcategory_id+'">';
                row += '<td>'+res.shop_subcategory_id+ '</td>';
                row += '<td>'+res.shop_subcategory_code+ '</td>';
                row += '<td>'+res.shop_subcategory_name+'</td>';
                row += '<td>'+res.shop_subcategory_description+'</td>';
                row += '<td>'+res.shop_subcategory_status+'</td>';
                row += '<td>'+res.shopcategory.shop_category_name+'</td>';
                row += '<td><a role="button" class="edit_btn" data-id="'+res.shop_subcategory_id+'"><i class="ti ti-edit"></i></a><a role="button" class="del_btn" style="margin-left:4px;" id="del_btn" data-id="'+res.shop_subcategory_id+'"><i class="ti ti-basket"></i></a></td>';
                if($('.input_id').val()!=''){
                    $('.row_table_'+res.shop_subcategory_id).replaceWith(row);
                }else{
                    $('.list_table').prepend(row);
                }
                $('.form_store').trigger('reset');
                $('#modal').modal('hide');
            });
        })

        $('body').on('click', '.del_btn', function(){
            var id = $(this).data('id');
            $.ajax({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                url: 'shop_subcategory/delete/'+id,
                type: 'DELETE'
            }).done(function(res){
                $('.row_table_'+res.shop_subcategory_id).remove();
            })
            
        })
    </script>

@endsection
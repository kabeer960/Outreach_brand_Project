@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-2">
                <h2>
                    {{ __('Shops Page') }}
                </h2> 
            </div>
        

            <div class="col-lg-7"></div>
            <div class="col-lg-3">
                <a href="add_shop" class="btn btn-primary d-sm add_btn" style="float:right;">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                Add New Shop
                </a>
            </div>
            

        </div>
    </div>


    <div class="page-body">
        <div class="container-xl">

            <div class="row">  
                <table class="table bg-white" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Shop Code</th>
                            <th scope="col">Shop Name</th>
                            <th scope="col">Shop Description</th>
                            <th scope="col">Shop Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                  
                    <tbody class="list_table">
                        @foreach($items as $item)
                            <tr class="row_table_{{$item->shop_id}}">
                                <td>{{$item->shop_id}}</th>
                                <td>{{$item->shop_code}}</th>
                                <td>{{$item->shop_name}}</td>
                                <td>{{$item->shop_description}}</td>
                                <td>{{$item->shop_status}}</td>
                                <td>
                                    <a role="button" class="edit_btn edit_icon_style" href="add_shop/{{$item->shop_id}}"><i class="ti ti-edit"></i></a>
                                    
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
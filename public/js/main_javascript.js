
/* 
DataTabel Jquery code  -----Start----- 
 */
$(document).ready(function(){
    $('#myTable').DataTable()                          
});

/* 
Company page complete code  -----Start----- 
 */
//Company add model code  -----Start----- 
$('body').on('click','.com_add_btn', function(){
    $('.companies_form_store').trigger('reset');
    $('.com_status_1').attr('checked', 'checked'); 
    $('.com_status_2').attr('checked', null);
    $(".input_id[type=hidden]").val('');
    $('.modal-title').html('Add New Company');
    $('.sub_html').html('Add New Company');
    $('#modal').modal('show');
});
//Company add model code  -----End----- 

//Compnay edit model code --------Start------
$('body').on('click', '.com_edit_btn', function(){
    $('.companies_form_store').trigger('reset');
    $('.sub_html').html('Update');
    $('.modal-title').html('Edit Company');
    $('#modal').modal('show');
    var id = $(this).data('id');
    $.ajax({
        url: 'companies/'+id
    }).done(function(res){
        $('.input_id').val(res.company_id);
        $('.input_code').val(res.company_code);
        $('.input_name').val(res.company_name);
        $('.input_des').val(res.company_description);
        // alert(res.company_status);
        if(res.company_status == 'Active'){
            $('.com_status_1').attr('checked', 'checked');  
            
            $('.com_status_2').attr('checked', null); 
        }else{
            $('.com_status_2').attr('checked', 'checked'); 
            
            $('.com_status_1').attr('checked', null); 
        }
    })
});

//Compnay store data code --------Start------
$('body').on('submit', '.companies_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'companies/store',
        data: $('.companies_form_store').serialize(),
        type: 'POST',
    }).done(function(res){
        var row = '<tr  class="row_table_'+res.company_id+'">';
        row += '<td>'+res.company_id+ '</td>';
        row += '<td>'+res.company_code+ '</td>';
        row += '<td>'+res.company_name+'</td>';
        row += '<td>'+res.company_description+'</td>';
        row += '<td>'+res.company_status+'</td>';
        row += '<td><a role="button" id="edit_btn" class="com_edit_btn edit_icon_style" data-id="'+res.company_id+'"><i class="ti ti-edit"></i></a><a role="button" class="com_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.company_id+'"><i class="ti ti-basket"></i></a></td>';
       
        if($('.input_id').val()!=''){
            $('.row_table_'+res.company_id).replaceWith(row);
        }
        else{
           
            $('.list_table').prepend(row);
        }
        $('.companies_form_store').trigger('reset');
        $('#modal').modal('hide');
    })
})
//Compnay store data code --------End------

//Compnay delete code --------Start------
$('body').on('click', '.com_del_btn', function(){
var id = $(this).data('id');
$.ajax({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'DELETE',
    url: 'companies/delete/'+id
}).done(function(res){
    $('.row_table_'+id).remove();
});
})
//Compnay delete code --------End------
/* 
Company page complete code  -----End----- 
 */


/* 
Client page complete code  -----Start----- 
 */
//Client Add modal code --------Start------
$('body').on('click', '.client_add_btn', function(){
    $('.client_form_store').trigger('reset');
    $('.zon_status_1').attr('checked', 'checked'); 
    $('.zon_status_2').attr('checked', null);
    $(".input_id[type=hidden]").val('');
    $('.modal-title').html('Add New Client')
    $('.sub_html').html('Add New Client');
    $('#modal').modal('show');
});
//Client Add modal code --------End------

//Client edit modal code --------Start------
$('body').on('click', '.client_edit_btn', function(){
    $('.client_form_store').trigger('reset');
    $('.modal-title').html('Edit Client')
    $('.sub_html').html('Update');
    $('#modal').modal('show');
    var id = $(this).data('id');
   
    $.ajax({
        url: 'clients/edit/'+id
        
    }).done(function(res){
        
        $('.input_id').val(res.client_id);
        $('.input_code').val(res.client_code);
        $('.input_name').val(res.client_name);
        $('.input_des').val(res.client_description);
        if(res.client_status == 'Active'){
            $('.cli_status_1').attr('checked', 'checked');  
                
            $('.cli_status_2').attr('checked', null); 
        }else{
            $('.cli_status_2').attr('checked', 'checked'); 
                
            $('.cli_status_1').attr('checked', null); 
        }
    })
});
//Client Add modal code --------End------

//Client Store modal code --------Start------
$('body').on('submit', '.client_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'clients/store',
        data: $('.client_form_store').serialize(),
        type: 'POST'
    }).done(function(res){
        var row = '<tr class="row_table_'+res.client_id+'">';
        row += '<td>'+res.client_id+ '</td>';
        row += '<td>'+res.client_code+ '</td>';
        row += '<td>'+res.client_name+'</td>';
        row += '<td>'+res.client_description+'</td>';
        row += '<td>'+res.client_status+'</td>';
        row += '<td><a role="button" id="" class="client_edit_btn edit_icon_style" data-id="'+res.client_id+'"><i class="ti ti-edit"></i></a><a role="button" class="client_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.client_id+'"><i class="ti ti-basket"></i></a></td>';
        if($('.input_id').val()!=''){
            $('.row_table_'+res.client_id).replaceWith(row);
        }else{
            $('.list_table').prepend(row);
        }

        $('.client_form_store').trigger('reset');
        $('#modal').modal('hide');

    });
})
//Client Store modal code --------End------

//Client delete modal code --------Start------


    $('body').on('click', '.client_del_btn', function(){
        var id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'clients/delete/'+id,
            type: 'DELETE'
        }).done(function(res){
            $('.row_table_'+res.client_id).remove();
        })
    })
//Client Delete modal code --------End------
/* 
Client page complete code  -----End----- 
 */

/* 
Country page complete code  -----Start----- 
 */
//Country add modal code --------Start------
$('body').on('click', '.coun_add_btn', function(){
    $('.country_form_store').trigger('reset');
    $('.coun_status_1').attr('checked', 'checked'); 
    $('.coun_status_2').attr('checked', null);
    $(".input_id[type=hidden]").val('');
    $('.modal-title').html('Add New Country')
    $('.sub_html').html('Add New Country');
    $('#modal').modal('show');
});
//Country add modal code --------End------
//Country edit modal code --------Start------
$('body').on('click', '.coun_edit_btn', function(){
    $('.country_form_store').trigger('reset');
    $('.modal-title').html('Edit Country')
    $('.sub_html').html('Update');
    $('#modal').modal('show');
    var id = $(this).data('id');
    $.ajax({
        url: 'countries/edit/'+id
        
    }).done(function(res){
        $('.input_id').val(res.country_id);
        $('.input_code').val(res.country_code);
        $('.input_name').val(res.country_name);
        $('.input_des').val(res.country_description);
        if(res.country_status == 'Active'){
            $('.coun_status_1').attr('checked', 'checked');  
                
            $('.coun_status_2').attr('checked', null); 
        }else{
            $('.coun_status_2').attr('checked', 'checked'); 
                
            $('.coun_status_1').attr('checked', null); 
        }
    });
});
//Country edit modal code --------End------
//Country store modal code --------Start------
$('body').on('submit', '.country_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'countries/store',
        data: $('.country_form_store').serialize(),
        type: 'POST'
    }).done(function(res){
        var row = '<tr class="row_table_'+res.country_id+'">';
        row += '<td>'+res.country_id+ '</td>';
        row += '<td>'+res.country_code+ '</td>';
        row += '<td>'+res.country_name+'</td>';
        row += '<td>'+res.country_description+'</td>';
        row += '<td>'+res.country_status+'</td>';
        row += '<td><a role="button" class="coun_edit_btn edit_icon_style" data-id="'+res.country_id+'"><i class="ti ti-edit"></i></a><a role="button" class="del_icon_style del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.country_id+'"><i class="ti ti-basket"></i></a></td>';
        if($('.input_id').val()!=''){
            $('.row_table_'+res.country_id).replaceWith(row);
        }else{
            $('.list_table').prepend(row);
        }

        $('.country_form_store').trigger('reset');
        $('#modal').modal('hide');
    });
});
//Country store modal code --------End------
//Country delete modal code --------Start------
$('body').on('click', '.coun_del_btn', function(){
    var id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'countries/delete/'+id,
            type: 'DELETE'
    }).done(function(res){
        $('.row_table_'+res.country_id).remove();
    });
});
//Country Delete modal code --------End------
/* 
Country page complete code  -----End----- 
 */


/* 
City page complete code  -----Strat----- 
 */
//City add modal code -------Start------
$('body').on('click', '.city_add_btn', function(){
    $('.city_form_store').trigger('reset');
    $('.city_status_1').attr('checked', 'checked'); 
    $('.city_status_2').attr('checked', null); 
    $(".input_id[type=hidden]").val('');
    $('.modal-title').html('Add New City')
    $('.sub_html').html('Add New City');
    $('#modal').modal('show');
});
//City add modal code -------End------
//City edit modal code -------Start------
$('body').on('click', '.city_edit_btn', function(){
    $('.city_form_store').trigger('reset');
    $('.modal-title').html('Edit City')
    $('.sub_html').html('Update');
    $('#modal').modal('show');
    var id = $(this).data('id');
   
    $.ajax({
        url: 'cities/edit/'+id
        
    }).done(function(res){
        $('.input_id').val(res.city_id);
        $('.input_code').val(res.city_code);
        $('.input_name').val(res.city_name);
        $('.input_des').val(res.city_description);
        $('#country_name_id').val(res.country.country_id);
        if(res.city_status == 'Active'){
            $('.city_status_1').attr('checked', 'checked');  
                
            $('.city_status_2').attr('checked', null); 
        }else{
            $('.city_status_2').attr('checked', 'checked'); 
                
            $('.city_status_1').attr('checked', null); 
        }
    });
});
//City edit modal code -------End------
//City store modal code -------Start------
$('body').on('submit', '.city_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'cities/store',
        data: $('.city_form_store').serialize(),
        type: 'POST'
    }).done(function(res){
        var row = '<tr class="row_table_'+res.city_id+'">';
        row += '<td>'+res.city_id+ '</td>';
        row += '<td>'+res.city_code+ '</td>';
        row += '<td>'+res.city_name+'</td>';
        row += '<td>'+res.city_description+'</td>';
        row += '<td>'+res.country.country_name+'</td>';
        row += '<td>'+res.city_status+'</td>';
        row += '<td><a role="button" class="city_edit_btn edit_icon_style" data-id="'+res.city_id+'"><i class="ti ti-edit"></i></a><a role="button" class="city_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.city_id+'"><i class="ti ti-basket"></i></a></td>';
        if($('.input_id').val()!=''){
            $('.row_table_'+res.city_id).replaceWith(row);
        }else{
            $('.list_table').prepend(row);
        }

        $('.city_form_store').trigger('reset');
        $('#modal').modal('hide');
    });
});
//City store modal code -------End------
//City delete modal code -------Start------
$('body').on('click', '.city_del_btn', function(){
    var id = $(this).data('id');
    $.ajax({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'cities/delete/'+id,
            type: 'DELETE'
    }).done(function(res){
        $('.row_table_'+res.city_id).remove();
    });
});
//City delete modal code -------End------
/* 
City Page javascript code  -----End----- 
 */

/* 
Zone Page javascript code  -----Start----- 
 */
//Zone add modal code -------Start------
$('body').on('click', '.zone_add_btn', function(){
    $('.zone_status_1').attr('checked', 'checked'); 
    $('.zone_status_2').attr('checked', null); 
    $('.zone_form_store').trigger('reset');
    $(".input_id[type=hidden]").val('');
    $('.modal-title').html('Add New Zone')
    $('.sub_html').html('Add New Zone');
    $('#modal').modal('show');
});
//Zone add modal code -------End------
//Zone edit modal code -------Start------
$('body').on('click', '.zone_edit_btn', function(){
    $('.zone_form_store').trigger('reset');
    $('.modal-title').html('Edit Zone')
    $('.sub_html').html('Update');
    $('#modal').modal('show');
    var id = $(this).data('id');
    $.ajax({
        url: 'zones/edit/'+id
    }).done(function(res){
        $('.input_id').val(res.zone_id);
        $('.input_code').val(res.zone_code);
        $('.input_name').val(res.zone_name);
        $('.input_des').val(res.zone_description);
        $('#zone_name_id').val(res.city.city_id);
        if(res.zone_status == 'Active'){
            $('.zone_status_1').attr('checked', 'checked');  
                
            $('.zone_status_2').attr('checked', null); 
        }else{
            $('.zone_status_2').attr('checked', 'checked'); 
                
            $('.zone_status_1').attr('checked', null); 
        }
    });
});
//Zone edit modal code -------End------
//Zone store modal code -------Start------
$('body').on('submit', '.zone_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'zones/store',
        data: $('.zone_form_store').serialize(),
        type: 'POST'
    }).done(function(res){
        var row = '<tr class="row_table_'+res.zone_id+'">';
        row += '<td>'+res.zone_id+ '</td>';
        row += '<td>'+res.zone_code+ '</td>';
        row += '<td>'+res.zone_name+'</td>';
        row += '<td>'+res.zone_description+'</td>';
        row += '<td>'+res.city.city_name+'</td>';
        row += '<td>'+res.zone_status+'</td>';
        row += '<td><a role="button" class="zone_edit_btn edit_icon_style" data-id="'+res.zone_id+'"><i class="ti ti-edit"></i></a><a role="button" class="zone_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.zone_id+'"><i class="ti ti-basket"></i></a></td>';
        if($('.input_id').val()!=''){
            $('.row_table_'+res.zone_id).replaceWith(row);
        }else{
            $('.list_table').prepend(row);
        }
        $('.zone_form_store').trigger('reset');
        $('#modal').modal('hide');
    });
});
//Zone store modal code -------End------
//Zone delete modal code -------Start------
$('body').on('click', '.zone_del_btn', function(){
    var id = $(this).data('id');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'zones/delete/'+id,
            type: 'DELETE'
    }).done(function(res){
        $('.row_table_'+res.zone_id).remove();
    });
});
//Zone delete modal code -------End------
/* 
Zone Page javascript code  -----End----- 
 */

/* 
Region Page javascript code  -----Strat----- 
 */
//Region add modal code -------Start------
$('body').on('click', '.region_add_btn', function(){
    $('.region_form_store').trigger('reset');
    $('.region_status_1').attr('checked', 'checked'); 
    $('.region_status_2').attr('checked', null); 
    $(".input_id[type=hidden]").val('');
    $('.modal-title').html('Add New Region')
    $('.sub_html').html('Add New Region');
    $('#modal').modal('show');
});
//Region add modal code -------End------
//Region edit modal code -------Start------
$('body').on('click', '.region_edit_btn', function(){
    $('.region_form_store').trigger('reset');
    $('.modal-title').html('Edit Region')
    $('.sub_html').html('Update');
    $('#modal').modal('show');
    var id = $(this).data('id');
    $.ajax({
        url: 'regions/edit/'+id
    }).done(function(res){
        $('.input_id').val(res.region_id);
        $('.input_code').val(res.region_code);
        $('.input_name').val(res.region_name);
        $('.input_des').val(res.region_description);
        $('#region_name_id').val(res.zone.zone_id);
        if(res.region_status == 'Active'){
            $('.region_status_1').attr('checked', 'checked');  
            $('.region_status_2').attr('checked', null); 
        }else{
            $('.region_status_2').attr('checked', 'checked'); 
            $('.region_status_1').attr('checked', null); 
        }
    });
});
//Region edit modal code -------End------
//Region store modal code -------Start------
$('body').on('submit', '.region_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'regions/store',
        data: $('.region_form_store').serialize(),
        type: 'POST'
        }).done(function(res){
        
        var row = '<tr class="row_table_'+res.region_id+'">';
        row += '<td>'+res.region_id+ '</td>';
        row += '<td>'+res.region_code+ '</td>';
        row += '<td>'+res.region_name+'</td>';
        row += '<td>'+res.region_description+'</td>';
        row += '<td>'+res.zone.zone_name+'</td>';
        row += '<td>'+res.region_status+'</td>';
        row += '<td><a role="button" class="region_edit_btn edit_icon_style" data-id="'+res.region_id+'"><i class="ti ti-edit"></i></a><a role="button" class="region_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.region_id+'"><i class="ti ti-basket"></i></a></td>';
        if($('.input_id').val()!=''){
            $('.row_table_'+res.region_id).replaceWith(row);
        }else{
            $('.list_table').prepend(row);
        }
        $('.region_form_store').trigger('reset');
        $('#modal').modal('hide');
    });
});
//Region store modal code -------End------
//Region delete modal code -------Start------
$('body').on('click', '.region_del_btn', function(){
    var id = $(this).data('id');
    $.ajax({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'regions/delete/'+id,
            type: 'DELETE'
    }).done(function(res){
        $('.row_table_'+res.region_id).remove();
    });
});
//Region delete modal code -------End------
/* 
Region Page javascript code  -----End----- 
 */

/* 
Area Page javascript code  -----Start----- 
 */
//Area add modal code -------Start------
$('body').on('click', '.area_add_btn', function(){
    $('.area_form_store').trigger('reset');
    $('.area_status_1').attr('checked', null); 
    $('.area_status_2').attr('checked', null); 
    $(".input_id[type=hidden]").val('');
    $('.modal-title').html('Add New Area')
    $('.sub_html').html('Add New Area');
    $('#modal').modal('show');
});
//Area add modal code -------End------
//Area edit modal code -------Start------
$('body').on('click', '.area_edit_btn', function(){
    $('.area_form_store').trigger('reset');
    $('.modal-title').html('Edit Area')
    $('.sub_html').html('Update');
    $('#modal').modal('show');
    var id = $(this).data('id');
    $.ajax({
        url: 'areas/edit/'+id
    }).done(function(res){
        $('.input_id').val(res.area_id);
        $('.input_code').val(res.area_code);
        $('.input_name').val(res.area_name);
        $('.input_des').val(res.area_description);
        $('#area_name_id').val(res.region.region_id);
        if(res.area_status == 'Active'){
            $('.area_status_1').attr('checked', 'checked');  
            $('.area_status_2').attr('checked', null); 
        }else{
            $('.area_status_2').attr('checked', 'checked'); 
            $('.area_status_1').attr('checked', null); 
        }
    });
});
//Area edit modal code -------End------
//Area store modal code -------Start------
$('body').on('submit', '.area_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'areas/store',
        data: $('.area_form_store').serialize(),
        type: 'POST'
        }).done(function(res){
        var row = '<tr class="row_table_'+res.area_id+'">';
        row += '<td>'+res.area_id+ '</td>';
        row += '<td>'+res.area_code+ '</td>';
        row += '<td>'+res.area_name+'</td>';
        row += '<td>'+res.area_description+'</td>';
        row += '<td>'+res.region.region_name+'</td>';
        row += '<td>'+res.area_status+'</td>';
        row += '<td><a role="button" class="area_edit_btn edit_icon_style" data-id="'+res.area_id+'"><i class="ti ti-edit"></i></a><a role="button" class="area_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.area_id+'"><i class="ti ti-basket"></i></a></td>';
        if($('.input_id').val()!=''){
            $('.row_table_'+res.area_id).replaceWith(row);
        }else{
            $('.list_table').prepend(row);
        }
        $('.area_form_store').trigger('reset');
        $('#modal').modal('hide');
    });
});
//Area store modal code -------End------
//Area delete modal code -------Start------
$('body').on('click', '.area_del_btn', function(){
    var id = $(this).data('id');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
             url: 'areas/delete/'+id,
            type: 'DELETE'
    }).done(function(res){
        $('.row_table_'+res.area_id).remove();
    });
});
//Area delete modal code -------End------
/* 
Area Page javascript code  -----End----- 
 */

/* 
Town Page javascript code  -----Start----- 
 */
//Town add modal code -------Start------
$('body').on('click', '.town_add_btn', function(){
    $('.town_form_store').trigger('reset');
    $('.town_status_1').attr('checked', 'checked'); 
    $('.town_status_2').attr('checked', null); 
    $(".input_id[type=hidden]").val('');
    $('.modal-title').html('Add New Town')
    $('.sub_html').html('Add New Town');
    $('#modal').modal('show');
});
//Town add modal code -------End------
//Town edit modal code -------Start------
$('body').on('click', '.town_edit_btn', function(){
    $('.town_form_store').trigger('reset');
    $('.modal-title').html('Edit Town')
    $('.sub_html').html('Update');
    $('#modal').modal('show');
    var id = $(this).data('id');
    $.ajax({
        url: 'towns/edit/'+id
    }).done(function(res){
        $('.input_id').val(res.town_id);
        $('.input_code').val(res.town_code);
        $('.input_name').val(res.town_name);
        $('.input_des').val(res.town_description);
        $('#town_name_id').val(res.area.area_id);
        if(res.town_status == 'Active'){
            $('.town_status_1').attr('checked', 'checked');  
            $('.town_status_2').attr('checked', null); 
        }else{
            $('.town_status_2').attr('checked', 'checked'); 
            $('.town_status_1').attr('checked', null); 
        }
    });
});
//Town edit modal code -------End------
//Town store modal code -------Start------
$('body').on('submit', '.town_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'towns/store',
        data: $('.town_form_store').serialize(),
        type: 'POST'
        }).done(function(res){
        var row = '<tr class="row_table_'+res.town_id+'">';
        row += '<td>'+res.town_id+'</td>';
        row += '<td>'+res.town_code+'</td>';
        row += '<td>'+res.town_name+'</td>';
        row += '<td>'+res.town_description+'</td>';
        row += '<td>'+res.area.area_name+'</td>';
        row += '<td>'+res.town_status+'</td>';
        row += '<td><a role="button" class="town_edit_btn edit_icon_style" data-id="'+res.town_id+'"><i class="ti ti-edit"></i></a><a role="button" class="town_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.town_id+'"><i class="ti ti-basket"></i></a></td>';
        if($('.input_id').val()!=''){
            $('.row_table_'+res.town_id).replaceWith(row);
        }else{
            $('.list_table').prepend(row);
        }
        $('.town_form_store').trigger('reset');
        $('#modal').modal('hide');
    });
});
//Town store modal code -------End------
//Town delete modal code -------Start------
$('body').on('click', '.town_del_btn', function(){
    var id = $(this).data('id');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'towns/delete/'+id,
        type: 'DELETE'
    }).done(function(res){
        $('.row_table_'+res.town_id).remove();
    });
});
//Town delete modal code -------End------
/* 
Town Page javascript code  -----End----- 
 */

/* 
Route Page javascript code  -----Start----- 
 */
//Route add modal code -------Start------
$('body').on('click', '.route_add_btn', function(){
    $('.route_form_store').trigger('reset');
    $('.route_status_1').attr('checked', 'checked'); 
    $('.route_status_2').attr('checked', null); 
    $(".input_id[type=hidden]").val('');
    $('.modal-title').html('Add New Route')
    $('.sub_html').html('Add New Route');
    $('#modal').modal('show');
});
//Route add modal code -------End------
//Route edit modal code -------Start------
$('body').on('click', '.route_edit_btn', function(){
    $('.route_form_store').trigger('reset');
    $('.modal-title').html('Edit Route')
    $('.sub_html').html('Update');
    $('#modal').modal('show');
    var id = $(this).data('id');
    $.ajax({
        url: 'routes/edit/'+id
    }).done(function(res){
        $('.input_id').val(res.route_id);
        $('.input_code').val(res.route_code);
        $('.input_name').val(res.route_name);
        $('.input_des').val(res.route_description);
        $('#route_name_id').val(res.town.town_id);
        if(res.route_status == 'Active'){
            $('.route_status_1').attr('checked', 'checked');  
            $('.route_status_2').attr('checked', null); 
        }else{
            $('.route_status_2').attr('checked', 'checked'); 
            $('.route_status_1').attr('checked', null); 
        }
    });
});
//Route edit modal code -------End------
//Route store modal code -------Start------
$('body').on('submit', '.route_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'routes/store',
        data: $('.route_form_store').serialize(),
        type: 'POST'
        }).done(function(res){
        var row = '<tr class="row_table_'+res.route_id+'">';
        row += '<td>'+res.route_id+ '</td>';
        row += '<td>'+res.route_code+ '</td>';
        row += '<td>'+res.route_name+'</td>';
        row += '<td>'+res.route_description+'</td>';
        row += '<td>'+res.town.town_name+'</td>';
        row += '<td>'+res.route_status+'</td>';
        row += '<td><a role="button" class="route_edit_btn edit_icon_style" data-id="'+res.route_id+'"><i class="ti ti-edit"></i></a><a role="button" class="route_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.route_id+'"><i class="ti ti-basket"></i></a></td>';
        if($('.input_id').val()!=''){
            $('.row_table_'+res.route_id).replaceWith(row);
        }else{
            $('.list_table').prepend(row);
        }
        $('.route_form_store').trigger('reset');
        $('#modal').modal('hide');
    });
});
//Route store modal code -------End------
//Route delete modal code -------Start------
$('body').on('click', '.route_del_btn', function(){
    var id = $(this).data('id');
    $.ajax({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'routes/delete/'+id,
            type: 'DELETE'
    }).done(function(res){
        $('.row_table_'+res.route_id).remove();
    });
});
//Route delete modal code -------End------
/* 
Route javascript code  -----End----- 
 */



/* 
Channel javascript code  -----Start----- 
 */
//Channel add modal code -------Start------
$('body').on('click', '.channel_add_btn', function(){
    $('.channel_form_store').trigger('reset');
    $('.channel_status_1').attr('checked', 'checked'); 
    $('.channel_status_2').attr('checked', null); 
    $(".input_id[type=hidden]").val('');
    $('.modal-title').html('Add New Channel');
    $('.sub_html').html('Add New Channel');
    $('#modal').modal('show');
});
//Channel add modal code -------End------
//Channel edit modal code -------Start------
$('body').on('click', '.channel_edit_btn', function(){
    $('.channel_form_store').trigger('reset');
    $('.modal-title').html('Edit Channel');
    $('.sub_html').html('Update Channel');
    $('#modal').modal('show');
    var id = $(this).data('id');
    $.ajax({
        url: 'channels/edit/'+id
    }).done(function(res){
        $('.input_id').val(res.channel_id);
        $('.input_code').val(res.channel_code);
        $('.input_name').val(res.channel_name);
        $('.input_des').val(res.channel_description);
        if(res.channel_status == 'Active'){
            $('.channel_status_1').attr('checked', 'checked');    
            $('.channel_status_2').attr('checked', null); 
        }else{
            $('.channel_status_2').attr('checked', 'checked'); 
            $('.channel_status_1').attr('checked', null); 
        }
    });
});
//Channel edit modal code -------End------
//Channel store modal code -------Start------
$('body').on('submit', '.channel_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'channels/store',
        data: $('.channel_form_store').serialize(),
        type: 'POST'
    }).done(function(res){
        var row = '<tr class="row_table_'+res.channel_id+'">';
        row += '<td>'+res.channel_id+ '</td>';
        row += '<td>'+res.channel_code+ '</td>';
        row += '<td>'+res.channel_name+'</td>';
        row += '<td>'+res.channel_description+'</td>';
        row += '<td>'+res.channel_status+'</td>';
        row += '<td><a role="button" class="channel_edit_btn edit_icon_style" data-id="'+res.channel_id+'"><i class="ti ti-edit"></i></a><a role="button" class="channel_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.channel_id+'"><i class="ti ti-basket"></i></a></td>';
        if($('.input_id').val()!=''){
            $('.row_table_'+res.channel_id).replaceWith(row);
        }else{
            $('.list_table').prepend(row);
        }
        $('.channel_form_store').trigger('reset');
        $('#modal').modal('hide');
    });
});
//Channel store modal code -------End------
//Channel add delete code -------Start------
$('body').on('click', '.channel_del_btn', function(){
    var id = $(this).data('id');
    $.ajax({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        url: 'channels/delete/'+id,
        type: 'DELETE'
    }).done(function(res){
        $('.row_table_'+res.channel_id).remove();
    });
});
//Channel delete modal code -------End------
/* 
Channel Page javascript code  -----End----- 
 */

/* 
Class Page javascript code  -----Start----- 
 */
//Class add modal code -------Start------
$('body').on('click', '.class_add_btn', function(){
    $('.class_form_store').trigger('reset');
    $('.class_status_1').attr('checked', 'checked'); 
    $('.class_status_2').attr('checked', null); 
    $(".input_id[type=hidden]").val('');
    $('.modal-title').html('Add New Class');
    $('.sub_html').html('Add New Class');
    $('#modal').modal('show');
});
//Class add modal code -------End------
//Class edit modal code -------Start------
$('body').on('click', '.class_edit_btn', function(){
    $('.class_form_store').trigger('reset');
    $('.modal-title').html('Edit Class');
    $('.sub_html').html('Update Class');
    $('#modal').modal('show');
    var id = $(this).data('id');
    $.ajax({
        url: 'class/edit/'+id
    }).done(function(res){
        $('.input_id').val(res.class_id);
        $('.input_code').val(res.class_code);
        $('.input_name').val(res.class_name);
        $('.input_des').val(res.class_description);
        if(res.class_status == 'Active'){
            $('.class_status_1').attr('checked', 'checked');      
            $('.class_status_2').attr('checked', null); 
        }else{
            $('.class_status_2').attr('checked', 'checked'); 
            $('.class_status_1').attr('checked', null); 
        }
    });
});
//Class edit modal code -------End------
//Class store modal code -------Start------
$('body').on('submit', '.class_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'class/store',
        data: $('.class_form_store').serialize(),
        type: 'POST'
    }).done(function(res){
        var row = '<tr class="row_table_'+res.class_id+'">';
        row += '<td>'+res.class_id+ '</td>';
        row += '<td>'+res.class_code+ '</td>';
        row += '<td>'+res.class_name+'</td>';
        row += '<td>'+res.class_description+'</td>';
        row += '<td>'+res.class_status+'</td>';
        row += '<td><a role="button" class="class_edit_btn edit_icon_style" data-id="'+res.class_id+'"><i class="ti ti-edit"></i></a><a role="button" class="class_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.class_id+'"><i class="ti ti-basket"></i></a></td>';
        if($('.input_id').val()!=''){
            $('.row_table_'+res.class_id).replaceWith(row);
        }else{
            $('.list_table').prepend(row);
        }
        $('.classform_store').trigger('reset');
        $('#modal').modal('hide');
    });
});
//Class store modal code -------End------
//Class delete modal code -------Start------
$('body').on('click', '.class_del_btn', function(){
    var id = $(this).data('id');
    $.ajax({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        url: 'class/delete/'+id,
        type: 'DELETE'
    }).done(function(res){
        $('.row_table_'+res.class_id).remove();
    });
});
//Class delete modal code -------End------
/* 
Class Page javascript code  -----End----- 
 */

/* 
ShopSubcategory Page javascript code  -----Start----- 
 */
//ShopCategory add modal code -------Start------
$('body').on('click', '.shop_cate_add_btn', function(){
    $('.shop_cate_form_store').trigger('reset');
    $('.shop_cate_status_1').attr('checked', 'checked'); 
    $('.shop_cate_status_2').attr('checked', null); 
    $(".input_id[type=hidden]").val('');
    $('.modal-title').html('Add New Shop Category');
    $('.sub_html').html('Add New Shop Category');
    $('#modal').modal('show');
});
//ShopCategory add modal code -------End------
//ShopCategory edit modal code -------Start------
$('body').on('click', '.shop_cate_edit_btn', function(){
    $('.shop_cate_form_store').trigger('reset');
    $('.modal-title').html('Edit Shop Category');
    $('.sub_html').html('Update Shop Category');
    $('#modal').modal('show');
    var id = $(this).data('id');
    $.ajax({
        url: 'shop_category/edit/'+id
    }).done(function(res){
        $('.input_id').val(res.shop_category_id);
        $('.input_code').val(res.shop_category_code);
        $('.input_name').val(res.shop_category_name);
        $('.input_des').val(res.shop_category_description);
        if(res.shop_category_status == 'Active'){
            $('.shop_cate_status_1').attr('checked', 'checked');  
            $('.shop_cate_status_2').attr('checked', null); 
        }else{
            $('.shop_cate_status_2').attr('checked', 'checked'); 
            $('.shop_cate_status_1').attr('checked', null); 
        }
    });
});
//ShopCategory edit modal code -------End------
//ShopCategory store modal code -------Start------
$('body').on('submit', '.shop_cate_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'shop_category/store',
        data: $('.shop_cate_form_store').serialize(),
        type: 'POST'
    }).done(function(res){
        var row = '<tr class="row_table_'+res.shop_category_id+'">';
        row += '<td>'+res.shop_category_id+ '</td>';
        row += '<td>'+res.shop_category_code+ '</td>';
        row += '<td>'+res.shop_category_name+'</td>';
        row += '<td>'+res.shop_category_description+'</td>';
        row += '<td>'+res.shop_category_status+'</td>';
        row += '<td><a role="button" class="shop_cate_edit_btn edit_icon_style" data-id="'+res.shop_category_id+'"><i class="ti ti-edit"></i></a><a role="button" class="shop_cate_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.shop_category_id+'"><i class="ti ti-basket"></i></a></td>';
        if($('.input_id').val()!=''){
            $('.row_table_'+res.shop_category_id).replaceWith(row);
        }else{
            $('.list_table').prepend(row);
        }
        $('.shop_cate_form_store').trigger('reset');
        $('#modal').modal('hide');
    });
});
//ShopCategory store modal code -------End------
//ShopCategory delete modal code -------Start------
$('body').on('click', '.shop_cate_del_btn', function(){
    var id = $(this).data('id');
    $.ajax({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        url: 'shop_category/delete/'+id,
        type: 'DELETE'
    }).done(function(res){
        $('.row_table_'+res.shop_category_id).remove();
    })
});
//ShopCategory delete modal code -------End------
/* 
ShopCategory Page javascript code  -----End----- 
 */

/* 
ShopSubcategory Page javascript code  -----Start----- 
 */
//ShopSubcategory add modal code -------Start------
$('body').on('click', '.shop_subcategory_add_btn', function(){
    $('.shop_subcategory_form_store').trigger('reset');
    $('.shop_subcategory_status_1').attr('checked', 'checked'); 
    $('.shop_subcategory_status_2').attr('checked', null); 
    $(".input_id[type=hidden]").val('');
    $('.modal-title').html('Add New Shop Subcategory');
    $('.sub_html').html('Add New Shop Subcategory');
    $('#modal').modal('show');
});
//ShopSubcategory add modal code -------End------
//ShopSubcategory edit modal code -------Start------
$('body').on('click', '.shop_subcategory_edit_btn', function(){
    $('.shop_subcategory_form_store').trigger('reset');
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
            $('.shop_subcategory_status_1').attr('checked', 'checked');  
            $('.shop_subcategory_status_2').attr('checked', null); 
        }else{
            $('.shop_subcategory_status_2').attr('checked', 'checked'); 
            $('.shop_subcategory_status_1').attr('checked', null); 
        }
    });
});
//ShopSubcategory edit modal code -------End------
//ShopSubcategory store modal code -------Start------
$('body').on('submit', '.shop_subcategory_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'shop_subcategory/store',
        data: $('.shop_subcategory_form_store').serialize(),
        type: 'POST'
    }).done(function(res){
        var row = '<tr class="row_table_'+res.shop_subcategory_id+'">';
        row += '<td>'+res.shop_subcategory_id+ '</td>';
        row += '<td>'+res.shop_subcategory_code+ '</td>';
        row += '<td>'+res.shop_subcategory_name+'</td>';
        row += '<td>'+res.shop_subcategory_description+'</td>';
        row += '<td>'+res.shop_subcategory_status+'</td>';
        row += '<td>'+res.shopcategory.shop_category_name+'</td>';
        row += '<td><a role="button" class="shop_subcategory_edit_btn edit_icon_style" data-id="'+res.shop_subcategory_id+'"><i class="ti ti-edit"></i></a><a role="button" class="shop_subcategory_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.shop_subcategory_id+'"><i class="ti ti-basket"></i></a></td>';
        if($('.input_id').val()!=''){
            $('.row_table_'+res.shop_subcategory_id).replaceWith(row);
        }else{
            $('.list_table').prepend(row);
        }
        $('.shop_subcategory_form_store').trigger('reset');
        $('#modal').modal('hide');
    });
});
//ShopSubcategory store modal code -------End------
//ShopSubcategory delete modal code -------Start------
$('body').on('click', '.shop_subcategory_del_btn', function(){
    var id = $(this).data('id');
    $.ajax({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        url: 'shop_subcategory/delete/'+id,
        type: 'DELETE'
    }).done(function(res){
        $('.row_table_'+res.shop_subcategory_id).remove();
    });
});
//ShopSubcategory delete modal code -------End------
/* 
ShopSubcategory Page javascript code  -----End----- 
 */

/* 
Products Page javascript code  -----Start----- 
 */
//Products Page add-modal code -----Start-----
$('body').on('click', '.product_add_btn', function(){
    $('.product_form_store').trigger('reset');
    $('#product_status_1').attr('checked', 'checked'); 
    $('#product_status_2').attr('checked', null);
    $(".input_id[type=hidden]").val('');
    $('#product_name_id2').val('');
    $('#product_subcategory_name').html('');
    $('.modal-title').html('Add New Product');
    $('.sub_html').html('Add New Product');
    $('#modal').modal('show');
});
//Products Page add-modal code -----End-----

//Products Page edit-modal code -----Start-----
$('body').on('click', '.product_edit_btn', function(){
    $('.product_form_store').trigger('reset');
    $('.modal-title').html('Edit Product');
    $('.sub_html').html('Update Product');
    $('#modal').modal('show');
    var id = $(this).data('id');
    $.ajax({
        url: 'products/edit/'+id
    }).done(function(res){
        $('.input_id').val(res.product_id);
        $('.input_code').val(res.product_code);
        $('.input_name').val(res.product_name);
        $('.input_brand').val(res.product_brand);
        $('.input_type').val(res.product_type);
        $('.input_group').val(res.product_group);
        $('.input_des').val(res.product_description);
        $('#product_name_id1').val(res.category.category_id);
        $('#product_name_id2').val(res.subcategory.subcategory_id);
        if(res.product_status == 'Active'){
            $('#product_status_1').attr('checked', 'checked');  
            $('#product_status_2').attr('checked', null); 
        }else{
            $('#product_status_2').attr('checked', 'checked'); 
            $('#product_status_1').attr('checked', null); 
        }   
    })
});
function get_cate(get_id){
    var id = get_id.value;
    $.ajax({
        url: 'products/change/'+id
    }).done(function(res){
        var row='';
        var i=0;
        for( i=0;i<res.length;i++)
        {
            row += '<option value="'+ res[i].subcategory_id+'">'+ res[i].subcategory_name+ '</option>';
        }

        $('#product_name_id2').html(row);
                
    })
}
//Products Page edit-modal code -----End-----

//Products Page store-modal code -----Start-----
$('body').on('submit', '.product_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'products/store',
        data: $('.product_form_store').serialize(),
        type: 'POST'
    }).done(function(res){
        var row = '<tr class="row_table_'+res.product_id+'">';
        row += '<td>'+res.product_id+ '</td>';
        row += '<td>'+res.product_code+ '</td>';
        row += '<td>'+res.product_name+'</td>';
        row += '<td>'+res.product_description+'</td>';
        row += '<td>'+res.category.category_name+'</td>';
        row += '<td>'+res.subcategory.subcategory_name+'</td>';
        row += '<td>'+res.product_status+'</td>';
        row += '<td><a role="button" class="product_edit_btn edit_icon_style" data-id="'+res.product_id+'"><i class="ti ti-edit"></i></a><a role="button" class="product_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.product_id+'"><i class="ti ti-basket"></i></a></td>';
        if($('.input_id').val()!=''){
            $('.row_table_'+res.product_id).replaceWith(row);
        }else{
            $('.list_table').prepend(row);
        }

        $('.product_form_store').trigger('reset');
        $('#modal').modal('hide');   
    });
});
//Products Page store-modal code -----End-----

//Products Page delete-modal code -----Start-----
$('body').on('click', '.product_del_btn', function(){
    var id = $(this).data('id');
    $.ajax({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        url: 'products/delete/'+id,
        type: 'DELETE'
        }).done(function(res){
        $('.row_table_'+res.product_id).remove();
    })
})
//Products Page delete-modal code -----End-----
/* 
Products Page javascript code  -----End-----  
*/


/* 
Category Page javascript code  -----Start-----  
*/
// Category add page code ---------Start------
$('body').on('click', '.category_add_btn', function(){
    $('.category_form_store').trigger('reset');
    $('.status_1').attr('checked', 'checked'); 
    $('.status_2').attr('checked', null); 
    $(".input_id[type=hidden]").val('');
    $('.modal-title').html('Add New Category');
    $('.category_sub_html').html('Add New Category');
    $('#modal').modal('show');
});
// Category add page code ---------End------
// Category edit page code --------Start------
$('body').on('click', '.category_edit_btn', function(){
    $('.category_form_store').trigger('reset');
    $('.modal-title').html('Edit Category');
    $('.sub_html').html('Update Category');
    $('#modal').modal('show');
    var id = $(this).data('id');
    $.ajax({
        url: 'categories/edit/'+id
    }).done(function(res){
        $('.input_id').val(res.category_id);
        $('.input_code').val(res.category_code);
        $('.input_name').val(res.category_name);
        $('.input_des').val(res.category_description);
        if(res.category_status == 'Active'){
            $('.category_status_1').attr('checked', 'checked');  
                
            $('.category_status_2').attr('checked', null); 
        }else{
            $('.category_status_2').attr('checked', 'checked'); 
                
            $('.category_status_1').attr('checked', null); 
        }
    })
})
// Category edit page code --------End------
// Category Store page code --------Start------
$('body').on('submit', '.category_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'categories/store',
        data: $('.category_form_store').serialize(),
        type: 'POST'
    }).done(function(res){
        var row = '<tr class="row_table_'+res.category_id+'">';
        row += '<td>'+res.category_id+ '</td>';
        row += '<td>'+res.category_code+ '</td>';
        row += '<td>'+res.category_name+'</td>';
        row += '<td>'+res.category_description+'</td>';
        row += '<td>'+res.category_status+'</td>';
        row += '<td><a role="button" id="edit_btn" class="category_edit_btn edit_icon_style" data-id="'+res.category_id+'"><i class="ti ti-edit"></i></a><a role="button" class="category_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.category_id+'"><i class="ti ti-basket"></i></a></td>';
        if($('.input_id').val()!=''){
            $('.row_table_'+res.category_id).replaceWith(row);
        }else{
            $('.list_table').prepend(row);
        }
        $('.category_form_store').trigger('reset');
        $('#modal').modal('hide');
    });
});
// Category Store page code --------End------
// Category delete page code --------Start------
$('body').on('click', '.category_del_btn', function(){
    var id = $(this).data('id');
    $.ajax({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        url: 'category/delete/'+id,
        type: 'DELETE'
    }).done(function(res){
        $('.row_table_'+res.category_id).remove();
    });
});
// Category delete page code --------End------
/* 
Category Page javascript code  -----End-----  
*/



 
/* 
SubCategory Page javascript code  -----Start-----  
*/
// Subcategory add page code --------Start------
$('body').on('click', '.add_btn', function(){
    $('.subcategory_form_store').trigger('reset');
    $('.status_1').attr('checked', 'checked'); 
    $('.status_2').attr('checked', null); 
    $(".input_id[type=hidden]").val('');
    $('.modal-title').html('Add New Subcategory');
    $('.sub_html').html('Add New Subcategory');
    $('#modal').modal('show');
});
// Subcategory add page code --------End------
// Subcategory Edit page code --------Start------
$('body').on('click', '.subcategory_edit_btn', function(){
    $('.subcategory_form_store').trigger('reset');
    $('.modal-title').html('Edit Subcategory');
    $('.sub_html').html('Update Subcategory');
    $('#modal').modal('show');
    var id = $(this).data('id');
    $.ajax({
        url: 'subcategories/edit/'+id
    }).done(function(res){
        $('.input_id').val(res.subcategory_id);
        $('.input_code').val(res.subcategory_code);
        $('.input_name').val(res.subcategory_name);
        $('.input_des').val(res.subcategory_description);
        $('#subcategory_name_id').val(res.category.category_id);
        if(res.subcategory_status == 'Active'){
            $('.status_1').attr('checked', 'checked');  
                
            $('.status_2').attr('checked', null); 
        }else{
            $('.status_2').attr('checked', 'checked'); 
                
            $('.status_1').attr('checked', null); 
        }
    });
});
// Subcategory edit page code --------End------
// Subcategory store page code --------Start------
$('body').on('submit', '.subcategory_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'subcategories/store',
        data: $('.subcategory_form_store').serialize(),
        type: 'POST'
    }).done(function(res){
        var row = '<tr class="row_table_'+res.subcategory_id+'">';
        row += '<td>'+res.subcategory_id+ '</td>';
        row += '<td>'+res.subcategory_code+ '</td>';
        row += '<td>'+res.subcategory_name+'</td>';
        row += '<td>'+res.subcategory_description+'</td>';
        row += '<td>'+res.category.category_name+'</td>';
        row += '<td>'+res.subcategory_status+'</td>';
        row += '<td><a role="button" id="edit_btn" class="subcategory_edit_btn edit_icon_style" data-id="'+res.subcategory_id+'"><i class="ti ti-edit"></i></a><a role="button" class="subcategory_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.subcategory_id+'"><i class="ti ti-basket"></i></a></td>';
            if($('.input_id').val()!=''){
                $('.row_table_'+res.subcategory_id).replaceWith(row);
            }else{
                $('.list_table').prepend(row);
            }

            $('.subcategory_form_store').trigger('reset');
            $('#modal').modal('hide');
    });
})
// Subcategory store page code --------End------
// Subcategory delete page code --------Start------
$('body').on('click', '.subcategory_del_btn', function(){
    var id = $(this).data('id');
    $.ajax({
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        url: 'subcategories/delete/'+id,
        type: 'DELETE'
    }).done(function(res){
        $('.row_table_'+res.subcategory_id).remove();
    });
})
// Subcategory delete page code --------End------
/* 
SubCategory Page javascript code  -----End-----  
*/


/* 
User_Role Page javascript code  -----Start-----  
*/
// User_Role add page code --------Start------
$('body').on('click', '.user_role_add_btn', function(){
    $('.user_role_form_store').trigger('reset');
    $('.user_role_status_1').attr('checked', 'checked'); 
    $('.user_role_status_2').attr('checked', null);
    $(".user_role_input_id[type=hidden]").val('');
    $('.modal-title').html('Add New Role');
    $('.sub_html').html('Add New Role');
    $('#modal').modal('show');
});
// User_Role add page code --------End------
// User_Role edit page code --------Start------
$('body').on('click', '.user_role_edit_btn', function(){
    $('.user_role_form_store').trigger('reset');
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
            $('.user_role_status_1').attr('checked', 'checked');  
            $('.user_role_status_2').attr('checked', null); 
        }else{
            $('.user_role_status_2').attr('checked', 'checked'); 
            $('.user_role_status_1').attr('checked', null); 
        }
    });
});
// User_Role edit page code --------End------
// User_Role store page code --------Start------
$('body').on('submit', '.user_role_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'user_roles/store',
        data: $('.user_role_form_store').serialize(),
        type: 'POST'
    }).done(function(res){
        var row = '<tr class="row_table_'+res.user_role_id+'">';
        row += '<td>'+res.user_role_id+ '</td>';
        row += '<td>'+res.user_role_code+ '</td>';
        row += '<td>'+res.user_role_name+'</td>';
        row += '<td>'+res.user_role_description+'</td>';
        row += '<td>'+res.user_role_status+'</td>';
        row += '<td><a role="button" class="user_role_edit_btn edit_icon_style" data-id="'+res.user_role_id+'"><i class="ti ti-edit"></i></a><a role="button" class="user_role_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.user_role_id+'"><i class="ti ti-basket"></i></a></td>';
        if($('.input_id').val()!=''){
            $('.row_table_'+res.user_role_id).replaceWith(row);
        }else{
            $('.list_table').prepend(row);
        }

        $('.user_role_form_store').trigger('reset');
        $('#modal').modal('hide');
    });
});
// User_Role store page code --------End------
// User_Role delete page code --------Start------
$('body').on('click', '.user_role_del_btn', function(){
    var id = $(this).data('id');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    url: 'user_role/delete/'+id,    
    type: 'DELETE'
    }).done(function(res){
    $('.row_table_'+res.user_role_id).remove();
    });
});
// User_Role delete page code --------End------
/*
User_Role page code -----------------End---------
*/



/*
Compaign page code -----------------Start---------
*/
// Compaign add modal code --------Start------
$('body').on('click', '.compaign_add_btn', function(){
    $('.compaign_form_store').trigger('reset');
    $('.compaign_status_1').attr('checked', 'checked'); 
    $('.compaign_status_2').attr('checked', null); 
    $(".input_id[type=hidden]").val('');
    $('.modal-title').html('Add New Compaign')
    $('.sub_html').html('Add New Compaign');
    $('#modal').modal('show');
});
// Compaign add modal code --------End------
// Compaign edit modal code --------Start------
$('body').on('click', '.compaign_edit_btn', function(){
    $('.compaign_form_store').trigger('reset');
    $('.modal-title').html('Edit Compaign');
    $('.sub_html').html('Update Compaign');
    $('#modal').modal('show');
    var id = $(this).data('id');
    $.ajax({
        url: 'compaign_edit/'+id
    }).done(function(res){
        $('.input_id').val(res.compaign_id);
        $('.input_code').val(res.compaign_code);
        $('.input_name').val(res.compaign_name);
        $('.input_com_start_date').val(res.compaign_start_date);
        $('.input_com_end_date').val(res.compaign_end_date);
        $('.input_des').val(res.compaign_description);
        if(res.compaign_status == 'Active'){
            $('.compaign_status_1').attr('checked', 'checked');
            $('.compaign_status_2').attr('checked', null);
        }else{
            $('.compaign_status_2').attr('checked', 'checked');
            $('.compaign_status_1').attr('checked', null);
        }
    });
});
// Compaign edit modal code --------End------
// Compaign store modal code --------Start------
$('body').on('submit', '.compaign_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'compaigns/store',
        data: $('.compaign_form_store').serialize(),
        type: 'POST'
    }).done(function(res){
        var row = '<tr class="row_table_'+res.compaign_id+'">';
        row += '<td>'+res.compaign_id+ '</td>';
        row += '<td>'+res.compaign_code+ '</td>';
        row += '<td>'+res.compaign_name+'</td>';
        row += '<td>'+res.compaign_description+'</td>';
        row += '<td>'+res.compaign_start_date+'</td>';
        row += '<td>'+res.compaign_end_date+'</td>';
        row += '<td>'+res.compaign_status+'</td>';
        row += '<td><a role="button" class="compaign_edit_btn edit_icon_style" data-id="'+res.compaign_id+'"><i class="ti ti-edit"></i></a><a role="button" class="compaign_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.compaign_id+'"><i class="ti ti-basket"></i></a></td>';
        if($('.input_id').val()!=''){
            $('.row_table_'+res.compaign_id).replaceWith(row);
        }else{
            $('.list_table').prepend(row);
        }
        $('.compaign_form_store').trigger('reset');
        $('#modal').modal('hide');
    });
});
// Compaign store modal code --------End------
// Compaign delete modal code --------Start------
$('body').on('click', '.compaign_del_btn', function(){
    var id = $(this).data('id');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'delete_compaign/'+id,
        type: 'DELETE'
    }).done(function(res){
        $('.row_table_'+res.compaign_id).remove();
    });
});
// Compaign delete modal code --------End------
/*
Compaign page code -----------------End---------
*/


/*
Surveys page code -----------------Start---------
*/
//Surveys Add modal code --------Start------
$('body').on('click', '.surveys_add_btn', function(){
    $('.surveys_form_store').trigger('reset');
    $('.survey_status_1').attr('checked', 'checked'); 
    $('.survey_status_2').attr('checked', null); 
    $(".input_id[type=hidden]").val('');
    $('.modal-title').html('Add New Survey')
    $('.sub_html').html('Add New Survey');
    $('#modal').modal('show');
    
});
//Surveys Add modal code --------End------
//Surveys edit modal code --------Start------
$('body').on('click', '.surveys_edit_btn', function(){
    $('.surveys_form_store').trigger('reset');
    $('.modal-title').html('Edit Survey');
    $('.sub_html').html('Update Survey');
    $('#modal').modal('show');
    var id = $(this).data('id');
    $.ajax({
        url: 'survey_edit/'+id
    }).done(function(res){
        $('.input_id').val(res.survey_id);
        $('.input_code').val(res.survey_code);
        $('.input_name').val(res.survey_name);
        $('.input_des').val(res.survey_description);
        $('.survey_name_id').val(res.compaign.compaign_id);
        if(res.survey_status == 'Active'){
            $('.survey_status_1').attr('checked', 'checked');
            $('.survey_status_2').attr('checked', null);
        }else{
            $('.survey_status_2').attr('checked', 'checked');
            $('.survey_status_1').attr('checked', null);
        }
    });
});
//Surveys edit modal code --------End------
//Surveys store modal code --------Start------
$('body').on('submit', '.surveys_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'survey/store',
        data: $('.surveys_form_store').serialize(),
        type: 'POST'
    }).done(function(res){
        var row = '<tr class="row_table_'+res.survey_id+'">';
        row += '<td>'+res.survey_id+ '</td>';
        row += '<td>'+res.survey_code+ '</td>';
        row += '<td>'+res.survey_name+'</td>';
        row += '<td>'+res.survey_description+'</td>';
        row += '<td>'+res.compaign.compaign_name+'</td>';
        row += '<td>'+res.survey_status+'</td>';
        row += '<td><a role="button" class="surveys_edit_btn edit_icon_style" data-id="'+res.survey_id+'"><i class="ti ti-edit"></i></a><a role="button" class="surveys_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.survey_id+'"><i class="ti ti-basket"></i></a></td>';
        if($('.input_id').val()!=''){
            $('.row_table_'+res.survey_id).replaceWith(row);
        }else{
            $('.list_table').prepend(row);
        }

    });
    $('.surveys_form_store').trigger('reset');
    $('#modal').modal('hide');
});
//Surveys store modal code --------End------
//Surveys delete modal code --------Start------
$('body').on('click', '.surveys_del_btn', function(){
    var id = $(this).data('id');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'delete_survey/'+id,
        type: 'DELETE'
    }).done(function(res){
        $('.row_table_'+res.survey_id).remove();
    });
});
//Surveys delete modal code --------End------
/*
Survey Page code ----------------End----------
*/


/*
Questionaires page code -----------------Start---------
*/
//Questionairs add modal code --------Start------
$('body').on('click', '.questionaires_add_btn', function(){
    $('.questionaires_form_store').trigger('reset');
    $('.questionaires_status_1').attr('checked', 'checked'); 
    $('.questionaires_status_2').attr('checked', null); 
    $(".input_id[type=hidden]").val('');
    $('.modal-title').html('Add New Question')
    $('.sub_html').html('Add New Question');
    $('#modal').modal('show');
    
});
//Questionairs add modal code --------End------
//Questionairs edit modal code --------Start------
$('body').on('click', '.questionaires_edit_btn', function(){
    $('.questionaires_form_store').trigger('reset');
    $('.modal-title').html('Edit Question');
    $('.sub_html').html('Update Question');
    $('#modal').modal('show');
    var id = $(this).data('id');
    $.ajax({
        url: 'questionaire_edit/'+id
    }).done(function(res){
        $('.input_id').val(res.question_id);
        $('.input_code').val(res.question_code);
        $('.input_name').val(res.question_name);
        $('.input_des').val(res.question_description);
        $('.question_name_id').val(res.survey.survey_id);
        if(res.question_status == 'Active'){
            $('.questionaires_status_1').attr('checked', 'checked');
            $('.questionaires_status_2').attr('checked', null);
        }else{
            $('.questionaires_status_2').attr('checked', 'checked');
            $('.questionaires_status_1').attr('checked', null);
        }
    });
});
//Questionairs edit modal code --------End------
//Questionairs store modal code --------Start------
$('body').on('submit', '.questionaires_form_store', function(e){
    e.preventDefault();
    $.ajax({
        url: 'questionaires/store',
        data: $('.questionaires_form_store').serialize(),
        type: 'POST'
    }).done(function(res){
        var row = '<tr class="row_table_'+res.question_id+'">';
        row += '<td>'+res.question_id+ '</td>';
        row += '<td>'+res.question_code+ '</td>';
        row += '<td>'+res.question_name+'</td>';
        row += '<td>'+res.question_description+'</td>';
        row += '<td>'+res.question_status+'</td>';
        row += '<td>'+res.survey.survey_name+'</td>';
        row += '<td><a role="button" class="questionaires_edit_btn edit_icon_style" data-id="'+res.question_id+'"><i class="ti ti-edit"></i></a><a role="button" class="questionaires_del_btn del_icon_style" style="margin-left:4px;" id="del_btn" data-id="'+res.question_id+'"><i class="ti ti-basket"></i></a></td>';
        if($('.input_id').val()!=''){
            $('.row_table_'+res.question_id).replaceWith(row);
        }else{
            $('.list_table').prepend(row);
        }

    });
    $('.questionaores_form_store').trigger('reset');
    $('#modal').modal('hide');
});
//Questionairs store modal code --------End------
//Questionairs delete modal code --------Start------
$('body').on('click', '.questionaires_del_btn', function(){
    var id = $(this).data('id');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'delete_questionaire/'+id,
        type: 'DELETE'
    }).done(function(res){
        $('.row_table_'+res.question_id).remove();
    });
});
//Questionairs delete modal code --------End------
/*
Questionaires page code -----------------End---------
*/

$('#import_btn').on('click',  function(){
    $('#modal_import').modal('show');
});






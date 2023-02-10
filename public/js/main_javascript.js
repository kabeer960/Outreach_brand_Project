
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
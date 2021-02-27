$(document).ready(function() {
    $('.add-menu').click(function(){
        var id = $('.remove-menu').length + 1;
        var menu = $("#sub_menu").val();
        var url = $("#sub_menu_url").val();
        if (menu != '' && url != '') {
            $("#add-menu").append('<div class="col-md-6 remove-menu-'+id+'"> <label for="sub_menu_'+id+'">Sub Menu</label><div class="input-group form-group mb-3"> <input type="text" class="form-control" placeholder="Enter Sub Menu" name="sub_menu[]" id="sub_menu_'+id+'" value="'+menu+'"></div></div><div class="col-md-6 remove-menu-'+id+'"> <label for="sub_menu_url_'+id+'">Sub Menu URL</label><div class="input-group form-group mb-3"> <input type="text" class="form-control" placeholder="Enter Sub Menu URL" name="sub_menu_url[]" id="sub_menu_url_'+id+'" value="'+url+'"><div class="input-group-append remove-menu" data-id="'+id+'"> <span class="input-group-text"><i class="fa fa-minus"></i></span></div></div></div>');
            $("#sub_menu").val('');     
            $("#sub_menu_url").val('');     
        }else{
            return false;
        }
    });

    $(document).on('click', '.remove-menu', function(){
        var id = $(this).data('id');
        $(".remove-menu-"+id).remove();
    });

    $( document ).on( 'focus', ':input', function(){
        $( this ).attr( 'autocomplete', 'off' );
    });

    $('.circle').on('change', function(){
        var id = $(this).val();
        var url = $('#circle_url').val();
        var val = $(this).data("value");
        var dependent = $(this).data('dependent');
        var division = $(this).data('division');
        
        if (id == undefined || id == "") {
            $("#"+dependent).html('<option selected="selected" disabled="">Select Division</option>');
        }else{
            $.ajax({
                url: url,
                method: "POST",
                async: false,
                data: {id: id, division: division},
                success:function(result){
                  $("#"+dependent).html(result);
                  $('#'+dependent).val(val);
                },
            })
        }    
    });

    $('.circle').trigger('change');

    $('.division').on('change', function(){
        var id = $(this).val();
        var url = $('#division_url').val();
        var val = $(this).data("value");
        var dependent = $(this).data('dependent');
        var area = $(this).data('area');
        
        if (id == undefined || id == "") {
            $("#"+dependent).html('<option selected="selected" disabled="">Select Area</option>');
        }else{
            $.ajax({
                url: url,
                method: "POST",
                async: false,
                data: {id: id, area: area},
                success:function(result){
                  $("#"+dependent).html(result);
                  $('#'+dependent).val(val);
                },
            })
        }    
    });

    $('.division').trigger('change');

    $('.text').keypress(function(e){
        let keyCode = e.which;

        /*
        8 - (backspace)
        32 - (space)
        97-122 - (a-z)text
        */
        if ( (keyCode != 8 ) && (keyCode < 97 || keyCode > 122) && (keyCode != 32) ) {
            return false;
        }
    });

    $('.float').keypress(function(e){
        let keyCode = e.which;
        
        /*
        46 - (dot)
        8 - (backspace)
        32 - (space)
        48-57 - (0-9)Numbers
        */
        if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57) && (keyCode != 46) ) {
            return false;
        }
    });

    $('.number').keypress(function(e){
        let keyCode = e.which;
        
        /*
        8 - (backspace)
        32 - (space)
        48-57 - (0-9)Numbers
        */
        if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57) ) {
            return false;
        }
    });

    $('.category').on('change', function(){
        var id = $(this).val();
        var url = $('#category_url').val();
        var val = $(this).data("value");
        var dependent = $(this).data('dependent');
        
        if (id == undefined || id == "") {
            $("#"+dependent).html('<option selected="selected" disabled="">Select Sub Category</option>');
            $("#"+dependent).trigger('change');
        }else{
            $.ajax({
                url: url,
                method: "POST",
                async: false,
                data: {id: id},
                success:function(result){
                  $("#"+dependent).html(result);
                  $("#"+dependent).trigger('change');
                  $('#'+dependent).val(val);
                },
            })
        }    
    });

    $('.category').trigger('change');

    $('.sub_category').on('change', function(){
        var selected = $(this).find('option:selected');
        var category = $(".category").find('option:selected').html();
        // var payment_type = selected.val(); 
        var price = selected.data('price'); 
        
        $("#price").attr('readonly', true);

        if (category != 'Out Premises') {
            $("#qty").attr('readonly', true);
            $("#qty").val("0");    
        }else{
            $("#qty").attr('readonly', false);
            $("#qty").val("");
        }

        if (price != undefined) {
            $("#price").val(price);
        }else{
            $("#price").val("0");
        }

        /*if (payment_type == undefined || payment_type == "") {
            $("#payment_type").val("");
            $("#qty").attr('readonly', false);
        }else{
            if (payment_type == 'Lump Sum Amount' || payment_type == 'Per Hour') {
                $("#qty").attr('readonly', true);
                $("#qty").val(0);
            }else{
                $("#qty").attr('readonly', false);
            }
            $("#payment_type").val(payment_type);
            $("#price").val(price);
            if (payment_type != 'Lump Sum Amount') {
                $("#price").attr('readonly', true);
            }else{
                $("#price").attr('readonly', false);
            }
        }    */
    });

    $('.sub_category').trigger('change');

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
});
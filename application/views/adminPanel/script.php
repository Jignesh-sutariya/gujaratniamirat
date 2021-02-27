<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		setTimeout(function(){ $(".alert-messages").remove(); }, 3000);
		<?php if (isset($dataTables)): ?>
      	var table = $('.datatable').DataTable({
            // dom: 'Bfrtip',
            /*lengthMenu: [
                [ 10, 25, 50, 100, -1 ],
                [ '10', '25', '50', '100', 'All' ]
            ],*/
            /*buttons: [
                'pageLength',
                {
                    extend: 'print',
                    footer: true,
                    exportOptions: {
                        columns: ':visible'
                    },
                },
                {
                    extend: 'pdf',
                    footer: true,
                    exportOptions: {
                        columns: ':visible'
                    },
                },
                {
                    extend: 'csv',
                    footer: true,
                    exportOptions: {
                        columns: ':visible'
                    },
                },
                {
                    extend: 'copy',
                    footer: true,
                    exportOptions: {
                        columns: ':visible'
                    },
                },
                'colvis'
            ],
            columnDefs: [ {
                targets: -1,
                visible: false
            } ],*/
            "processing": true,
            "serverSide": true,
            'language': {
                'loadingRecords': '&nbsp;',
                'processing': 'Processing',
                'paginate': {
                    'first': '|',
                    'next': '<i class="fa fa-arrow-circle-right"></i>',
                    'previous': '<i class="fa fa-arrow-circle-left"></i>',
                    'last': '|'
                }
            },
            "order": [],
            "ajax": {
                url: "<?= base_url($url) ?>",
                type: "POST",
                data: function(data) {
                    data.star_line_token = $('#'+"<?= strtolower(str_replace(" ", '_', APP_NAME)).'_token' ?>").val();
                    /*data.prod_id = $('#prod_id').val();*/
                },
                complete: function(response) {
                    var data = JSON.parse(response.responseText).star_line_token;
                    $('#'+"<?= strtolower(str_replace(" ", '_', APP_NAME)).'_token' ?>").val(data);
                },
            },
            "columnDefs": [{
                "targets": 'target',
                "orderable": false,
            },],
        });

        /*$('#buyer_id, #seller_id, #prod_id').change(function(){
            table.ajax.reload();
        });*/

        <?php endif ?>
	});
    
    function remove(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "This will be deleted from your data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.value) $('#'+id).submit();
      })
    }
</script>
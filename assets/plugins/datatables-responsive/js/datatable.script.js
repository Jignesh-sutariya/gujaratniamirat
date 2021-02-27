$(function() {
    /*var url = document.URL;*/
    var table = $('.datatable').DataTable({
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
            url: url + '/get',
            type: "POST",
            data: function(data) {
                data.department = $('.department').val();
            },
            /*complete: function(response) {
                var data = JSON.parse(response.responseText).token;
                $('#csrf_token_hash').val(data);
            },*/
        },
        "columnDefs": [{
            "targets": 'target',
            "orderable": false,
        }, ],
    });

    $(document).on('change', '.department', function(e) {
        table.ajax.reload();
    });

    $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this!",
                icon: "error",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $(this).parents().submit();
                } else {
                    return false;
                }
            });
    });

    $(document).on('click', '.remove', function(e) {
        e.preventDefault();
        swal({
                title: "Are you sure?",
                text: "Once removed, you will not be able to recover this!",
                icon: "error",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $(this).parents().submit();
                } else {
                    return false;
                }
            });
    });

    $(document).on('click', '.block', function(e) {
        e.preventDefault();
        swal({
                title: "Are you sure?",
                text: "Once blocked, you will not be able to recover this!",
                icon: "error",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $(this).parents().submit();
                } else {
                    return false;
                }
            });
    });
});
$(document).ready(function () {
    $("#completedSifarishTotalList").DataTable({
        language: {
            search: '<i class="fa fa-search"></i> खोज्नुहोस',
            "lengthMenu": "Show _MENU_ entries",
            "paginate": {
                "previous": "पछाडी",
                "next": "अगाडी"
            },
            "info": "_TOTAL_ दर्ता रेकर्डहरु मध्ये _START_ देखि _END_ देखाउँदै",
            "emptyTable": "कुनै रेकर्ड्स उपलब्ध छैन |",
        },

        // lengthMenu: [
        //     [10, 25, 50, -1],
        //     [10, 25, 50, 'All']
        // ],
        // paging: true,      
        // pageLength: 2,
        // columns: [
        //     { data: "#" },
        // ],
        dom: "Bfrtip",
        buttons: [

            {
                extend: "copy",
                text: "कपि",
                exportOptions: {
                    columns: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
                },
            },

            {
                extend: "excel",
                text: "निर्यात",
                exportOptions: {
                    columns: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
                },
            },
            {
                extend: 'colvis',
                text: "कोलम लुकाउने/देखाउने",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
                },
            },
            {
                extend: "print",
                text: "प्रिन्ट",
                exportOptions: {
                    columns: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
                },
            },
        ],
    });


    $('#service_type_id').on('change', function() {
        var service_type_id =   $(this).val();
        if(service_type_id){
            $.post( site_url+'/app/get_serviceList',{service_type_id:service_type_id}, function( result ) {
                $('#sifarishList').show();
                 $('#serviceId').html( result );
               });
        } else {
            $('#sifarishList').hide();
        }
       
     });
});
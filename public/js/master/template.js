$(document).ready(function () {
    $("#sifarishTemplateIndex").DataTable({
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

        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All']
        ],
        //     // paging: true,      
        //     // pageLength: 10,
        // columns: [
        //     { data: "#" },
        // ],
        dom: "Bfrtip",
        buttons: [

            {
                extend: "copy",
                text: "कपि",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                },
            },

            {
                extend: "excel",
                text: "निर्यात",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                },
            },
            {
                extend: 'colvis',
                text: "कोलम लुकाउने/देखाउने",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                },
            },
            {
                extend: "print",
                text: "प्रिन्ट",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                },
            },
        ],
    });
});
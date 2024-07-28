//select2 initializtion

$('.select2').select2();
$(".type_np").on("keyup", function () {
    var code = $(this).val();
    $(this).val(convert_to_unicode(code));
});
//datatable
new DataTable("#master", {
    responsive: true,
    // pageLength: 1,
    language: {
        search: lang == "np" ? "खोज्नुहोस" : "Search",
        lengthMenu:
            lang == "np"
                ? "प्रति पृष्ठ _MENU_ प्रविष्टिहरू देखाउनुहोस्"
                : "Show _MENU_ entries per page",
        paginate: {
            previous: lang == "np" ? "पछाडी" : "Previous",
            next: lang == "np" ? "अगाडी" : "Next",
        },
        // next: '&raquo;',
        // previous: '&laquo;'

        info:
            lang == "np"
                ? "_TOTAL_ दर्ता रेकर्डहरु मध्ये _START_ देखि _END_  देखाउँदै"
                : "Showing _START_ to _END_ of _TOTAL_ entries",
        emptyTable:
            lang == "np"
                ? "कुनै डाटा उपलब्ध छैन"
                : "No data available in table",
        // Other language options as needed
    },
    lengthMenu: [10, 25, 50, 100],
    pagingType: "full_numbers",
    dom: "Bfrtip",
    buttons: [
        {
            extend: "copy",
            text: lang == "np" ? "कपि" : "Copy",
            exportOptions: {
                columns: [0, 1, 2],
            },
        },

        {
            extend: "excel",
            text: lang == "np" ? "निर्यात" : "Excel",
            exportOptions: {
                columns: [0, 1, 2],
            },
        },
        {
            extend: "colvis",
            text: lang == "np" ? "कोलम लुकाउने/देखाउने" : "Column Visibility",
            exportOptions: {
                columns: [0, 1, 2],
            },
        },
        {
            extend: "print",
            text: lang == "np" ? "प्रिन्ट" : "Print",
            
            // autoPrint: true,

            customize: function (win) {
                var css = "@page { size: landscape; }",
                    head =
                        win.document.head ||
                        win.document.getElementsByTagName("head")[0],
                    style = win.document.createElement("style");

                style.type = "text/css";
                style.media = "print";

                if (style.styleSheet) {
                    style.styleSheet.cssText = css;
                } else {
                    style.appendChild(win.document.createTextNode(css));
                }

                head.appendChild(style);

                // Add border to the printed table
                $(win.document.body).find('table')
                .addClass('compact')
                .css('border-collapse', 'collapse')
                .css('width', '100%');
            
            // Apply border to th, td, and tr elements
            $(win.document.body).find('table th, table td')
                .css('border', '1px solid black')
                .css('border-collapse', 'collapse');
                
            $(win.document.body).find('table tbody tr')
                .css('border', '1px solid black')
                .css('border-collapse', 'collapse');
            },
           
            exportOptions: {
                columns: [0, 1, 2],
            },
        },
    ],
    //  buttons: [
    //     {
    //         extend: 'copy',
    //         text: 'Copy to clipboard'
    //     },
    //     'excel',
    //     'pdf'
    // ]
});

    

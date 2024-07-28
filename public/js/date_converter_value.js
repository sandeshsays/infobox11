$(document).ready(function () {
    $(".nepaliDatePicker").on("blur", function(e) {
        var thiss = $(this);
        var bs_date = thiss.attr('id');
        var ad_date = bs_date.replace('_bs', "_ad");
        $(this).nepaliDatePicker({
            dateFormat: "YYYY-MM-DD",
            ndpYear: true,
            ndpMonth: true,
            npdYearCount: 30, // Options | Number of years to show
            onChange: function () {
                var bs_dt = $('#'+bs_date).val();
                var arr = bs_dt.split("-");
                var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
                    year: arr[0],
                    month: arr[1],
                    day: arr[2]
                }));
                $('#'+ad_date).val(bsToAd);

            }
        });
    });

    $(".input_date").datepicker({
        autoClose: true,
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
    });
    getCurrentDateBs("#dob_bs");
    $("#dob_ad").on("blur", function () {
        convertAdToBs("#dob_ad", "#dob_bs");
    });
    $("#dob_bs").on("blur", function () {
        convertBsToAd("#dob_bs", "#dob_ad");
    });

    $("#dispatch_date_ad").on("blur", function () {
        dispatchDateBs("#dispatch_date_ad", "#dispatch_date_bs");
    });
    getCurrentDate("#dispatch_date_bs");
    $("#dispatch_date_bs").on("blur", function () {
        dispatchDateAd("#dispatch_date_bs", "#dispatch_date_ad");
    });

    getCurrentDateBs("#date_from_bs");
    $("#date_from_ad").on("blur", function () {
        convertAdToBs("#date_from_ad", "#date_from_bs");
    });
    $("#date_from_bs").on("blur", function () {
        convertBsToAd("#date_from_bs", "#date_from_ad");
    });

    getCurrentDateBs("#date_to_bs");
    $("#date_to_ad").on("blur", function () {
        convertAdToBs("#date_to_ad", "#date_to_bs");
    });
    $("#date_to_bs").on("blur", function () {
        convertBsToAd("#date_to_bs", "#date_to_ad");
    });


    getCurrentDateBs("#received_sent_date_bs");
    $("#received_sent_date_ad").on("blur", function () {
        convertAdToBs("#received_sent_date_ad", "#received_sent_date_bs");
    });
    $("#received_sent_date_bs").on("blur", function () {
        convertBsToAd("#received_sent_date_bs", "#received_sent_date_ad");
    });

    getCurrentDateBs("#regd_date_bs");
    $("#regd_date_ad").on("blur", function () {
        convertAdToBs("#regd_date_ad", "#regd_date_bs");
    });
    $("#regd_date_bs").on("blur", function () {
        convertBsToAd("#regd_date_bs", "#regd_date_ad");
    });

    getCurrentDateBs("#letter_date_bs");
    $("#letter_date_ad").on("blur", function () {
        convertAdToBs("#letter_date_ad", "#letter_date_bs");
    });
    $("#letter_date_bs").on("blur", function () {
        convertBsToAd("#letter_date_bs", "#letter_date_ad");
    });

    getCurrentDateBs("#entry_date_bs");
    $("#entry_date_ad").on("blur", function () {
        convertAdToBs("#entry_date_ad", "#entry_date_bs");
    });
    $("#entry_date_bs").on("blur", function () {
        convertBsToAd("#entry_date_bs", "#entry_date_ad");
    });

    getCurrentDateBs("#commented_on_bs");
    $("#commented_on_ad").on("blur", function () {
        convertAdToBs("#commented_on_ad", "#commented_on_bs");
    });
    $("#commented_on_bs").on("blur", function () {
        convertBsToAd("#commented_on_bs", "#commented_on_ad");
    });
});
// $('.nepaliDatePicker').inputmask('9999-99-99', { 'placeholder': 'YYYY-MM-DD' })
// $('.input_date').inputmask('yyyy-mm-dd', { 'placeholder': 'YYYY-MM-DD' })
// $('#mobile').inputmask('9999999999', { 'placeholder': '98xxxxxxxx' })
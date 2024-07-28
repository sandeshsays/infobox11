//DOB
$(document).ready(function () {
    $("#dob_bs").on("blur", function (e) {
        var date = document.getElementById("dob_bs").value;
        if (!(date) && date.length !== 10) return;
        var arr = date.split("/");
        var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $('#dob_ad').val(bsToAd);
    });
    $("#dob_ad").on("blur", function (e) {
        var mainInput = document.getElementById("dob_ad").value;
        if (!(mainInput) && mainInput.length !== 10) return;
        var arr = mainInput.split("-");
        var adToBs = NepaliFunctions.ConvertDateFormat(NepaliFunctions.AD2BS({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $('#dob_bs').val(adToBs);

    });

    var mainInput = document.getElementById("dob_bs");
    mainInput.nepaliDatePicker({
        dateFormat: "YYYY/MM/DD",
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 100,

        onChange: function () {
            var date = document.getElementById("dob_bs").value;
            var arr = date.split("/");
            var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
                year: arr[0],
                month: arr[1],
                day: arr[2]
            }));
            getCurrentDateBs("#dob_bs");
            $('#dob_ad').val(bsToAd);

        }
    });
});


//Dispatch Date


//Date From Date
$(document).ready(function () {
    $("#date_from_bs").on("blur", function (e) {
        var date = document.getElementById("#date_from_bs").value;
        if (!(date) && date.length !== 10) return;
        var arr = date.split("/");
        var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $('#date_from_ad').val(bsToAd);
    });
    $("#date_from_ad").on("blur", function (e) {
        var mainInput = document.getElementById("date_from_ad").value;
        if (!(mainInput) && mainInput.length !== 10) return;
        var arr = mainInput.split("-");
        var adToBs = NepaliFunctions.ConvertDateFormat(NepaliFunctions.AD2BS({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $('#date_from_bs').val(adToBs);

    });

    var mainInput = document.getElementById("#date_from_bs");
    mainInput.nepaliDatePicker({
        dateFormat: "YYYY/MM/DD",
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 100,

        onChange: function () {
            var date = document.getElementById("#date_from_bs").value;
            var arr = date.split("/");
            var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
                year: arr[0],
                month: arr[1],
                day: arr[2]
            }));
            getCurrentDateBs("#date_from_bs");
            $('#date_from_ad').val(bsToAd);

        }
    });
});


//Date To Date
$(document).ready(function () {
    $("#date_to_bs").on("blur", function (e) {
        var date = document.getElementById("#date_to_bs").value;
        if (!(date) && date.length !== 10) return;
        var arr = date.split("/");
        var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $('#date_to_ad').val(bsToAd);
    });
    $("#date_to_ad").on("blur", function (e) {
        var mainInput = document.getElementById("date_to_ad").value;
        if (!(mainInput) && mainInput.length !== 10) return;
        var arr = mainInput.split("-");
        var adToBs = NepaliFunctions.ConvertDateFormat(NepaliFunctions.AD2BS({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $('#date_to_bs').val(adToBs);

    });

    var mainInput = document.getElementById("#date_to_bs");
    mainInput.nepaliDatePicker({
        dateFormat: "YYYY/MM/DD",
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 100,

        onChange: function () {
            var date = document.getElementById("#date_to_bs").value;
            var arr = date.split("/");
            var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
                year: arr[0],
                month: arr[1],
                day: arr[2]
            }));
            getCurrentDateBs("#date_to_bs");
            $('#date_to_ad').val(bsToAd);

        }
    });
});


//Received Sent Date
$(document).ready(function () {
    $("#received_sent_date_bs").on("blur", function (e) {
        var date = document.getElementById("#received_sent_date_bs").value;
        if (!(date) && date.length !== 10) return;
        var arr = date.split("/");
        var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $('#received_sent_date_ad').val(bsToAd);
    });
    $("#received_sent_date_ad").on("blur", function (e) {
        var mainInput = document.getElementById("received_sent_date_ad").value;
        if (!(mainInput) && mainInput.length !== 10) return;
        var arr = mainInput.split("-");
        var adToBs = NepaliFunctions.ConvertDateFormat(NepaliFunctions.AD2BS({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $('#received_sent_date_bs').val(adToBs);

    });

    var mainInput = document.getElementById("#received_sent_date_bs");
    mainInput.nepaliDatePicker({
        dateFormat: "YYYY/MM/DD",
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 100,

        onChange: function () {
            var date = document.getElementById("#received_sent_date_bs").value;
            var arr = date.split("/");
            var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
                year: arr[0],
                month: arr[1],
                day: arr[2]
            }));
            getCurrentDateBs("#received_sent_date_bs");
            $('#received_sent_date_ad').val(bsToAd);

        }
    });
});


//Regd Date
$(document).ready(function () {
    $("#regd_date_bs").on("blur", function (e) {
        var date = document.getElementById("#regd_date_bs").value;
        if (!(date) && date.length !== 10) return;
        var arr = date.split("/");
        var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $('#regd_date_ad').val(bsToAd);
    });
    $("#regd_date_ad").on("blur", function (e) {
        var mainInput = document.getElementById("regd_date_ad").value;
        if (!(mainInput) && mainInput.length !== 10) return;
        var arr = mainInput.split("-");
        var adToBs = NepaliFunctions.ConvertDateFormat(NepaliFunctions.AD2BS({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $('#regd_date_bs').val(adToBs);

    });

    var mainInput = document.getElementById("#regd_date_bs");
    mainInput.nepaliDatePicker({
        dateFormat: "YYYY/MM/DD",
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 100,

        onChange: function () {
            var date = document.getElementById("#regd_date_bs").value;
            var arr = date.split("/");
            var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
                year: arr[0],
                month: arr[1],
                day: arr[2]
            }));
            getCurrentDateBs("#regd_date_bs");
            $('#regd_date_ad').val(bsToAd);

        }
    });
});


//Regd Date
$(document).ready(function () {
    $("#regd_date_bs").on("blur", function (e) {
        var date = document.getElementById("#regd_date_bs").value;
        if (!(date) && date.length !== 10) return;
        var arr = date.split("/");
        var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $('#regd_date_ad').val(bsToAd);
    });
    $("#regd_date_ad").on("blur", function (e) {
        var mainInput = document.getElementById("regd_date_ad").value;
        if (!(mainInput) && mainInput.length !== 10) return;
        var arr = mainInput.split("-");
        var adToBs = NepaliFunctions.ConvertDateFormat(NepaliFunctions.AD2BS({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $('#regd_date_bs').val(adToBs);

    });

    var mainInput = document.getElementById("#regd_date_bs");
    mainInput.nepaliDatePicker({
        dateFormat: "YYYY/MM/DD",
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 100,

        onChange: function () {
            var date = document.getElementById("#regd_date_bs").value;
            var arr = date.split("/");
            var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
                year: arr[0],
                month: arr[1],
                day: arr[2]
            }));
            getCurrentDateBs("#regd_date_bs");
            $('#regd_date_ad').val(bsToAd);

        }
    });
});


//Letter Date
$(document).ready(function () {
    $("#letter_date_bs").on("blur", function (e) {
        var date = document.getElementById("#letter_date_bs").value;
        if (!(date) && date.length !== 10) return;
        var arr = date.split("/");
        var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $('#letter_date_ad').val(bsToAd);
    });
    $("#letter_date_ad").on("blur", function (e) {
        var mainInput = document.getElementById("letter_date_ad").value;
        if (!(mainInput) && mainInput.length !== 10) return;
        var arr = mainInput.split("-");
        var adToBs = NepaliFunctions.ConvertDateFormat(NepaliFunctions.AD2BS({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $('#letter_date_bs').val(adToBs);

    });

    var mainInput = document.getElementById("#letter_date_bs");
    mainInput.nepaliDatePicker({
        dateFormat: "YYYY/MM/DD",
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 100,

        onChange: function () {
            var date = document.getElementById("#letter_date_bs").value;
            var arr = date.split("/");
            var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
                year: arr[0],
                month: arr[1],
                day: arr[2]
            }));
            getCurrentDateBs("#letter_date_bs");
            $('#letter_date_ad').val(bsToAd);

        }
    });
});


//Entry Date
$(document).ready(function () {
    $("#entry_date_bs").on("blur", function (e) {
        var date = document.getElementById("#entry_date_bs").value;
        if (!(date) && date.length !== 10) return;
        var arr = date.split("/");
        var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $('#entry_date_ad').val(bsToAd);
    });
    $("#entry_date_ad").on("blur", function (e) {
        var mainInput = document.getElementById("entry_date_ad").value;
        if (!(mainInput) && mainInput.length !== 10) return;
        var arr = mainInput.split("-");
        var adToBs = NepaliFunctions.ConvertDateFormat(NepaliFunctions.AD2BS({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $('#entry_date_bs').val(adToBs);

    });

    var mainInput = document.getElementById("#entry_date_bs");
    mainInput.nepaliDatePicker({
        dateFormat: "YYYY/MM/DD",
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 100,

        onChange: function () {
            var date = document.getElementById("#entry_date_bs").value;
            var arr = date.split("/");
            var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
                year: arr[0],
                month: arr[1],
                day: arr[2]
            }));
            getCurrentDateBs("#entry_date_bs");
            $('#entry_date_ad').val(bsToAd);

        }
    });
});


//Commented Date
$(document).ready(function () {
    $("#commented_on_bs").on("blur", function (e) {
        var date = document.getElementById("#commented_on_bs").value;
        if (!(date) && date.length !== 10) return;
        var arr = date.split("/");
        var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $('#commented_on_ad').val(bsToAd);
    });
    $("#commented_on_ad").on("blur", function (e) {
        var mainInput = document.getElementById("commented_on_ad").value;
        if (!(mainInput) && mainInput.length !== 10) return;
        var arr = mainInput.split("-");
        var adToBs = NepaliFunctions.ConvertDateFormat(NepaliFunctions.AD2BS({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $('#commented_on_bs').val(adToBs);

    });

    var mainInput = document.getElementById("#commented_on_bs");
    mainInput.nepaliDatePicker({
        dateFormat: "YYYY/MM/DD",
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 100,

        onChange: function () {
            var date = document.getElementById("#commented_on_bs").value;
            var arr = date.split("/");
            var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
                year: arr[0],
                month: arr[1],
                day: arr[2]
            }));
            getCurrentDateBs("#commented_on_bs");
            $('#commented_on_ad').val(bsToAd);

        }
    });
});
$(".input_date").datepicker({
    autoClose: true,
    changeMonth: true,
    changeYear: true,
    dateFormat: 'yy-mm-dd',
});
// $('.nepaliDatePicker').inputmask('9999-99-99', { 'placeholder': 'YYYY-MM-DD' })
// $('.input_date').inputmask('yyyy-mm-dd', { 'placeholder': 'YYYY-MM-DD' })
// $('#mobile').inputmask('9999999999', { 'placeholder': '98xxxxxxxx' })
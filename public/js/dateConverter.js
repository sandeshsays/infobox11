// Convert AD to BS
function convertAdToBs(dateAdId, dateBsId) {
    // debugger;
    var regEx = /^\d{4}-\d{2}-\d{2}$/;
    var isvalid = $(dateAdId).val();
    if (!isvalid.match(regEx)) {
    } else {
        var arr = isvalid.split("-");
        var adToBs = NepaliFunctions.ConvertDateFormat(NepaliFunctions.AD2BS({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $(dateBsId).val(adToBs);
    }
}

// Convert BS to AD
function convertBsToAd(dateBsId, dateAdId) {
    var regEx = /^\d{4}-\d{2}-\d{2}$/;
    var isvalid = $(dateBsId).val();
    if (!isvalid.match(regEx)) {
    } else {
        var arr = isvalid.split("-");
        var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        $(dateAdId).val(bsToAd);
    }
}// Convert AD to BS
function dispatchDateBs(dateAdId, dateBsId) {
    // debugger;
    var regEx = /^\d{4}-\d{2}-\d{2}$/;
    var isvalid = $(dateAdId).val();
    if (!isvalid.match(regEx)) {
    } else {
        var arr = isvalid.split("-");
        var adToBs = NepaliFunctions.ConvertDateFormat(NepaliFunctions.AD2BS({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        var dt = new Date();
        var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
        $(dateBsId).val(adToBs + ' ' + time);
    }
}

// Convert BS to AD
function dispatchDateAd(dateBsId, dateAdId) {
    var regEx = /^\d{4}-\d{2}-\d{2}$/;
    var isvalid = $(dateBsId).val();
    if (!isvalid.match(regEx)) {
    } else {
        var arr = isvalid.split("-");
        var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.BS2AD({
            year: arr[0],
            month: arr[1],
            day: arr[2]
        }));
        var dt = new Date();
        var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
        $(dateAdId).val(bsToAd + ' ' + time);
    }
}

// Convert BS to AD
function getCurrentDate(dateBsId) {
    var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate());
    var dt = new Date();
    var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    $(dateBsId).val(bsToAd  + ' ' + time);
}

// Convert BS to AD
function getCurrentDateBs(dateBsId) {
    var bsToAd = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate());
    $(dateBsId).val(bsToAd);
}


var SuccessAlert = function (message) {
    $("div.alert strong").text(message).css("text-align","center");
        $("#success_alert").show();
        setTimeout(function () { $("#success_alert").hide(); }, 4000);
}
var ErrorAlert = function (message) {
 
    $("#error_alert").show();
    $("div.alert strong").text(message);
    setTimeout(function () { $("#error_alert").hide(); }, 4000);
}

var WarningAlert = function (message) {
    $("div.alert strong").text(message);
    $("#warning_alert").show();
    setTimeout(function () { $("#warning_alert").hide(); }, 4000);
}
var InfoAlert = function (message) {
    $("div.alert strong").text(message);
    $("#info_alert").show();
    setTimeout(function () { $("#info_alert").hide(); }, 4000);
}

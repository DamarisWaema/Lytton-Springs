$(document).ready(function () {
    var siteurl = $("#siteurl").html();


    $("#contactform").submit(function (evt) {
        evt.preventDefault();
        var gif = $("#load");
        gif.toggleClass("hidden");
        $("#contactformResponse").html("");

        var form = $("#contactform");
        var formData = form.serialize();
        var ajax = $.ajax({
            type: 'POST',
            url: siteurl + "/lyttonmain/sendmail",
            data: formData
        });
        ajax.done(function (response) {
            $("#contactformResponse").removeClass("hidden").html(response).fadeOut(10000);
            //alert(response);
            $("#contactform input").val("");
            $("#mailmessage").val("");
            $("#submitbutton").val("Submit");
            gif.toggleClass("hidden");
        });
        ajax.fail(function () {
            $("#contactformResponse").html("There was a problem sending your data, please try again later");
            gif.toggleClass("hidden");
        });
    });  // jQuery's submit function applied on form.


});
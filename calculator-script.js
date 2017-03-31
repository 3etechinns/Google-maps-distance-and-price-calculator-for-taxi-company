$("#calculate").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Are you sure?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});
function submitForm() {
    // Initiate Variables With Form Content
    var departure_address = $("#departure_address").val();
    var arrival_address = $("#arrival_address").val();
    var vehicleType = $('#calculate').find('.vehicleType:checked').val();
    $.ajax({
        type: "POST",
        url: "calculator.php",
        data: "departure_address=" + departure_address + "&arrival_address=" + arrival_address + "&vehicleType=" + vehicleType,
        success: function (text) {
            var obj = $.parseJSON(text);
            if (obj[0] == "OK") {
                getFrom(true, obj[1]);
                getTo(true, obj[2]);
                getDistance(true, obj[3]);
                getDuration(true, obj[4]);
                getPrice(true, obj[5]);
            } else {
                calculatorError(obj[0]);
            }
        }

    });
}
$(window).keydown(function (event) {
    if (event.keyCode == 13) {
        event.preventDefault();
        return false;
    }
});
function getFrom(valid, msg)
{
    if (valid) {
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#countrysideCalculatorResponse1").removeClass().addClass(msgClasses).text('From: ' + msg);
}
function getTo(valid, msg) {
    if (valid) {
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#countrysideCalculatorResponse2").removeClass().addClass(msgClasses).text('To: ' + msg);
}
function getDistance(valid, msg) {
    if (valid) {
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#countrysideCalculatorResponse3").removeClass().addClass(msgClasses).text('Distance: ' + msg);
}
function getDuration(valid, msg) {
    if (valid) {
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#countrysideCalculatorResponse4").removeClass().addClass(msgClasses).text('Time of travel: ' + msg);
}
function getPrice(valid, msg) {
    if (valid) {
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#countrysideCalculatorResponse5").removeClass().addClass(msgClasses).text('The full price: ' + msg);
}
function formSuccess() {
    submitMSG(true, "Thank you!");
}

function formError() {
    $("#calculator").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass();
    });
}
function calculatorError(msg) {
    var msgClasses = "h3 text-center text-danger";
    $("#countrysideCalculatorResponse2").removeClass();
    $("#countrysideCalculatorResponse3").removeClass();
    $("#countrysideCalculatorResponse4").removeClass();
    $("#countrysideCalculatorResponse5").removeClass();
    $("#countrysideCalculatorResponse1").removeClass().addClass(msgClasses).text(msg);
}
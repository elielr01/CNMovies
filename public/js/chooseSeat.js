jQuery.noConflict();

var seats_selected = [];

function toggleSeat(btn_id) {

    var seat_img = document.getElementById(btn_id).firstElementChild;
    if (seat_img.src == "http://localhost:8000/storage/img/red-seat.png"){
        seat_img.src = "http://localhost:8000/storage/img/green-seat.png";
        seats_selected.push(btn_id);
    }
    else {
        seat_img.src = "http://localhost:8000/storage/img/red-seat.png";
        var index = seats_selected.indexOf(btn_id);
        if (index > -1)
            seats_selected.splice(index, 1);
    }

    document.getElementById("choosen_seats").innerHTML = seats_selected;
}

function post(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    for (var i = 0; i < seats_selected.length; i++){
        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", "seats[]");
        hiddenField.setAttribute("value", seats_selected[i]);

        form.appendChild(hiddenField);
    }

    /*
    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "_token");
    hiddenField.setAttribute("value", "<?php echo csrf_token(); ?>");

    form.appendChild(hiddenField);*/




    document.body.appendChild(form);
    form.submit();
}

function checkoutPost(){

    var form = document.getElementById("checkoutForm");

    for (var i = 0; i < seats_selected.length; i++){
        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", "seats[]");
        hiddenField.setAttribute("value", seats_selected[i]);

        form.appendChild(hiddenField);
    }

    form.submit();
}
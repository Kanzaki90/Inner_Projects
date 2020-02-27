var func_module = (function () {

    function phone_number_checker(io_phone_number_val) {

        let regEx = /^\+?[0-9 -]+$/;

        if (!regEx.test(io_phone_number_val)) {

            return false;

        }
        else if (io_phone_number_val.includes("-")) {

            io_phone_number_val = io_phone_number_val.replace(/-/g, "");
        }

        return io_phone_number_val;
    }

    function message_checker(i_message) {
        if (i_message === "") {
            return false;
        }

        return i_message;
    }

    function _send_sms() {

        let phone_number_val = document.querySelector("#send_to_number").value;
        let message_val = document.querySelector("#input_message").value;

        let phone = phone_number_checker(phone_number_val);
        let message = message_checker(message_val);

        // if (phone === false || message === false) {
        //     alert("False....");
        //     return "";
        //     // make a modal function
        // }
        if (phone === false) {
            modal_invoker("Phone Number Error", "There seems to be an error in the phone number");
            return "";
        }

        if (message === false) {
            modal_invoker("Message Error", "Seems like You haven't enetered a message...");
            return "";
        }

        let obj = {
            op: "send_sms",
            phone_number: phone,
            message: message
        };

        let url = "http://127.0.0.1/Network_Leads/PHP/server/controllers/controller.php";

        $.ajax({
            url: url,
            type: 'post',
            data: obj,
            async: true,
            success: function (response) {
                if (response == 200) {
                    modal_invoker(" :) ", "Your SMS was sent");
                    _get_logs();
                    // alert("SMS was Sent");
                }
                else {
                    alert("Something went wrong...");
                    return "";
                }
            }
        });


    }

    function _get_logs() {

        let obj = {
            op: "get_logs"
        };

        let url = "http://127.0.0.1/Network_Leads/PHP/server/controllers/controller.php";

        $.ajax({
            url: url,
            type: 'post',
            data: obj,
            async: true,
            success: function (response) {
                table_builder_module.table_builder(JSON.parse(response));
            }
        });
    }

    return {
        send_sms: _send_sms,
        get_logs: _get_logs
    };

}());
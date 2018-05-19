$(function () {

    // init the validator
    // validator files are included in the download package
    // otherwise download from http://1000hz.github.io/bootstrap-validator

    $('#contact-form').validator();


    // when the form is submitted
    $('#contact-form').on('submit', function (e) {

        // if the validator does not prevent form submit
        if (!e.isDefaultPrevented()) {
            var url = "/sendEnquiry.php";

            // POST values in the background the the script URL
            $.ajax({
                type: "POST",
                url: url,
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                data: $(this).serialize(),
                success: function (data)
                {
                    // data = JSON object that contact.php returns

                    // we recieve the type of the message: success x danger and apply it to the 
                    alert(data);

                    // empty the form
                    $('#contact-form')[0].reset();
                },
                error: function (jqXHR, status, err) {
                    alert(data);

                    // empty the form
                    $('#contact-form')[0].reset();
                }
            });
            return false;
        }
    })
});
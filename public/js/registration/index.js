"use strict";

$(function () {
    const form = $("#js_user_create_form");
    const firstname = $("#firstname");
    const lastname = $("#lastname");
    const email = $("#email");
    const password = $("#password");
    const address = $("#address");
    const submitButton = $("#js_user_save");
    const validator = form.validate({
        rules: {
            firstname: {
                required: true,
            },
            lastname: {
                required: true,
            },
            email: {
                email: true,
            },
            password: {
                required: true,
                minlength: 5,
            },
            address: {
                required: true,  
            },
        },
        messages: {},
        submitHandler: function (formElement, event) {
            event.preventDefault();

            let formData = new FormData();
            formData.append("firstname", firstname.val() || "");
            formData.append("lastname", lastname.val() || "");
            formData.append("email", email.val() || "");
            formData.append("password", password.val() || "");
            formData.append("address", address.val() || "");
            let url = form.data("action");

            let currentOptions = {
                url: url,
                data: formData,
                method: "POST",
                validator: validator,
                beforeSend: function (xhr, settings) {
                    // startButtonLoader(submitBtn);
                    defaultAjaxBeforeSend(xhr, settings);
                },

                // contentType:false and processData:false are needed when sending formData
                contentType: false,
                processData: false,
                disableLoader: false,
            };

            const options = $.extend(
                {},
                // getDefaultAjaxOptions(),
                currentOptions
            );
            $.ajax(options)
                .done(function (data, textStatus, jqXHR) {
                    Swal.fire({
                        title: "User created successfully",
                        icon: "success",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        },
                        buttonsStyling: true,
                    }).then((result) => {
                        location.href = window.redirectUrl;
                    });
                })
        },
    });
});

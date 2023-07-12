"use strict";

$(function () {
    const form = $("#js_user_create_note");
    const note = $("#note");
    alert('hi');
    const submitButton = $("#js_note_save");
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
            formData.append("note", note.val() || "");
            let url = form.data("action");
            console.log(url);
            let currentOptions = {
                url: url,
                data: formData,
                method: "POST",
                validator: validator,
                beforeSend: function (xhr, settings) {
                    startButtonLoader(submitBtn);
                    defaultAjaxBeforeSend(xhr, settings);
                },

                // contentType:false and processData:false are needed when sending formData
                contentType: false,
                processData: false,
                disableLoader: false,
            };

            const options = $.extend(
                {},
                getDefaultAjaxOptions(),
                currentOptions
            );
            $.ajax(options)
                .done(function (data, textStatus, jqXHR) {
                    Swal.fire({
                        title: "Note created successfully",
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

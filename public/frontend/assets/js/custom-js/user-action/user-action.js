
$(document).ready(function () {
    $('.send-message-modal').click(function (e) {
        e.preventDefault();
        let receiver_id = $(this).data('id');
        console.log("Receiver ID:", receiver_id);
        let modal = $('#messageModal' + receiver_id);
        if (modal.length) {
            modal.modal('show');
        } else {
            console.error("Modal not found for ID:", receiver_id);
        }
    });
    $(document).on('submit', '.send-message-form', function (e) {
        e.preventDefault();

        let form = $(this);
        let receiver_id = form.attr('data-id');
        let message = form.find('textarea[name="message"]').val().trim();
        if (!message) {
            alert("Please enter a message.");
            return;
        }

        $.ajax({
            url: '/send-message',
            method: 'POST',
            data: {
                receiver_id: receiver_id,
                message: message,
                _token: $('meta[name="csrf-token"]').attr('content')
            },

            success: function (response) {
                if (response.action === 'sendMessage') {
                    $("#successMessage" + receiver_id).html(response.message);
                }
                $("#message" + receiver_id).val('');
                setTimeout(function () {
                    $("#successMessage" + receiver_id).html("");
                }, 2000);
                if (response.action === 'expirePlan') {
                    $("#expireMessage" + receiver_id).html(response.message);
                    setTimeout(function () {
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        }
                    }, 2000);

                }
                if (response.action === 'takePlan') {
                    $("#expireMessage" + receiver_id).html(response.message);
                    setTimeout(function () {
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        }
                    }, 2000);

                }


            },
            error: function (xhr) {
                console.error("AJAX Error:", xhr.responseText);
                alert("Error: " + (xhr.responseJSON?.message ||
                    "Something went wrong!"));
            }
        });
    });
    $(document).on('click', '.modal-close-btn', function () {
        $(this).closest('.modal').modal('hide');
    });
});

$(document).on('click',
    '.send-interest-btn, .cancel-interest-btn, .accept-interest-by-me-btn, .decline-interest-by-me-btn, .cancel-decline-by-me-btn, .cancel-friend-btn, .block-btn, .unBlock-btn, .view-contact-btn,  .decline-btn, .add-to-shortlist-btn, .remove-to-shortlist-btn',
    function () {
        const button = $(this);
        // button.prop('disabled', true);
        const receiver_id = $(this).data('id');
        const sendInterest = $(this).hasClass('send-interest-btn');
        const cancelInterest = $(this).hasClass('cancel-interest-btn');
        const acceptByMe = $(this).hasClass('accept-interest-by-me-btn');
        const declineByMe = $(this).hasClass('decline-interest-by-me-btn');
        const cancelDeclineByMe = $(this).hasClass('cancel-decline-by-me-btn');
        const cancelFriend = $(this).hasClass('cancel-friend-btn');
        const blockUser = $(this).hasClass('block-btn');
        const unBlock = $(this).hasClass('unBlock-btn');
        const viewContact = $(this).hasClass('view-contact-btn');
        const declined = $(this).hasClass('decline-btn');
        const addToShortlist = $(this).hasClass('add-to-shortlist-btn');
        const removeToShortlist = $(this).hasClass('remove-to-shortlist-btn');
        let action = sendInterest ?
            '/send-interest' :
            cancelInterest ?
                '/cancel-interest' :
                blockUser ?
                    '/block-user' :
                    unBlock ?
                        '/unblock-user' :
                        viewContact ?
                            '/view-contact' :
                            acceptByMe ?
                                '/interest-accept-by-me' :
                                declineByMe ?
                                    '/interest-decline-by-me' :
                                    declined ?
                                        '/declined' :
                                        addToShortlist ?
                                            '/add-to-shortlist' :
                                            removeToShortlist ?
                                                '/remove-to-shortlist' :
                                                cancelDeclineByMe ?
                                                    '/cancel-decline-by-me' :
                                                    cancelFriend ?
                                                        '/cancel-friend' :
                                                        '';

        sendRequest(receiver_id, action);
    });

function sendRequest(receiver_id, action) {
    $.ajax({
        url: action,
        method: 'POST',
        data: {
            receiver_id: receiver_id,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.action === 'sendInterest') {
                $("#success-alert" + receiver_id).html(response.message);
                $("#send-interest" + receiver_id).html(response.button)
            }
            if (response.action === 'cancelInterest') {

                $("#success-alert" + receiver_id).html(response.message);
                $("#send-interest" + receiver_id).html(response.button)
            }
            if (response.action === 'friend') {
                $("#success-alert" + receiver_id).html(response.message);
                $("#accept-by-me" + receiver_id).html(response.button)
            }
            if (response.action === 'declineByMe') {
                $("#success-alert" + receiver_id).html(response.message);
                $("#friend" + receiver_id).html(response.button)
            }
            if (response.action === 'cancelDeclineByMe') {
                $("#success-alert" + receiver_id).html(response.message);
                $("#cancel-decline-by-me" + receiver_id).html(response.button)
            }
            if (response.action === 'profileSendInterest') {
                $("#send-request" + receiver_id).html(response.message);
                setTimeout(function () {
                    $("#send-request" + receiver_id).html(response.button);
                }, 1500);
            }
            if (response.action === 'profileCancelInterest') {
                $("#send-request" + receiver_id).html(response.message);
                setTimeout(function () {
                    $("#send-request" + receiver_id).html(response.button);
                }, 1500);
            }
            if (response.action === 'profileDeclineInterest') {
                $("#accept-decline" + receiver_id).html(response.message);
                setTimeout(function () {
                    $("#accept-decline" + receiver_id).html(response.button);
                }, 1500);
            }
            if (response.action === 'profileCancelDecline') {
                $("#cancel-decline" + receiver_id).html(response.message);
                setTimeout(function () {
                    $("#cancel-decline" + receiver_id).html(response.button);
                }, 1500);
            }
            if (response.action === 'friendProfile') {
                $("#accept-decline" + receiver_id).html(response.message);

            }
            if (response.action === 'profileCancelFriend') {
                $("#profile-cancel-friend" + receiver_id).html(response.message);
                setTimeout(function () {
                    $("#profile-cancel-friend" + receiver_id).html(response.button);
                }, 1500);
            }

            if (response.action === 'declineInterestByMe') {
                $("#accept-request" + receiver_id).html(response.message);
                setTimeout(function () {
                    $("#accept-request" + receiver_id).html(response.button);
                }, 1500);
            }
            if (response.action === 'blockUser') {
                $("#success-alert" + receiver_id).html(response.message);
                $("#block-user" + receiver_id).html(response.button);
            }
            if (response.action === 'profileUnblock') {
                $("#block-user" + receiver_id).html(response.button);
            }
            if (response.action === 'addToShortlist') {
                $("#add-to-shortlist" + receiver_id).html(response.button);
            }
            if (response.action === 'removeToShortlist') {
                $("#remove-to-shorlist" + receiver_id).html(response.button);
            }
            if (response.action === 'profileBlock') {
                $("#block-user" + receiver_id).html(response.button);
            }
            if (response.action === 'block') {
                $("#success-alert" + receiver_id).html(response.message);

            }
            if (response.action === 'viewContact') {

                $("body").append(response.html);
                $("#contactModal" + receiver_id).modal("show");

            }
            if (response.action === 'exceededContact') {
                $("#success-alert" + receiver_id).html(response.message);
                setTimeout(function () {
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }
                }, 2000);

            }
            if (response.action === 'hide') {
                $("#success-alert" + receiver_id).html(response.message);
                //  $("body").append(response.html); 
                //  $("#contactModal" + receiver_id).modal("show");
            }
            // if (response.action === 'friend') {
            //     $("#success-alert" + receiver_id).html(response.message);
            //     //  $("body").append(response.html); 
            //     //  $("#contactModal" + receiver_id).modal("show");
            // }
            if (response.action === 'messageForMobileSetting2') {
                $("#viewContact" + receiver_id).html(response.message);

            }
            if (response.action === 'messageForMobileSetting0') {
                $("#viewContact" + receiver_id).html(response.message);

            }
            if (response.action === 'acceptByMe') {
                $("#success-alert" + receiver_id).html(response.message);
                $("#accept-by-me" + receiver_id).html(response.button);

            }
            if (response.action === 'declineByMe') {
                $("#success-alert" + receiver_id).html(response.message);
                $("#accept-by-me" + receiver_id).html(response.button);

            }
            if (response.action === 'declined') {
                $("#success-alert" + receiver_id).html(response.message);
                $("#accept-by-me" + receiver_id).html(response.button);

            }
            if (response.action === 'takePlan') {
                // $("body").append(response.html);
                // $("#expireModal").modal("show");
                $("#success-alert" + receiver_id).html(response.message);

                setTimeout(function () {
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }
                }, 2000);
            }

            if (response.action === 'expirePlan') {
                $("body").append(response.html);
                $("#expireModal").modal("show");
                if (response.action === 'expirePlan') {
                    setTimeout(function () {
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        }
                    }, 2000);

                }
            }
        },
        error: function (xhr) {
            alert(xhr.responseJSON.message);
        },
    });

}





$(document).on('click', '.btn-send-message', function (e) {
    e.preventDefault();
    let self = $(this);
    let messageInput = $(".form-send-message").find('textarea[name="message"]');
    let nameInput = $(".form-send-message").find('input[name="name"]');
    let emailInput = $(".form-send-message").find('input[name="email"]');

    $.ajax({
        url: $(self).data("url"),
        method: "PUT",
        data: {
            text: messageInput.val(),
            name: nameInput.val(),
            email: emailInput.val(),
        },
        success: function (response) {
            messageInput.val('');
            $('.error-operation').hide();
            $('.success-operation').html(response.message).show();
        },
        error: function (response) {
            $('.success-operation').hide();
            $('.error-operation').html(response.message).show();
        }
    });
});

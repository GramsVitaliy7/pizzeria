$(document).ready(function() {
    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();
        let self = $(this);
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(self).data("url"),
            method: 'DELETE',
            success: function (response) {
                $('.record-list').fadeOut().html(response.html).fadeIn();
                $('.success-operation').html(response.message).show();
                $('.error-operation').hide();
            },
            error: function (response) {
                $('.error-operation').html(response.message).show();
                $('.success-operation').hide();
            }
        });
        return false;
    });
});

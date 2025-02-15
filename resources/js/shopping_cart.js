$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.update-cart', function (e) {
        e.preventDefault();
        let self = $(this);
        $.ajax({
            url: $(self).data("url"),
            method: "PATCH",
            data: {
                amount: self.closest("tr").find('.amount').val()
            },
            success: function (response) {
                $('.record-list').fadeOut().html(response.html).fadeIn();
                $('.error-operation').hide();
                $('.success-operation').html(response.message).show();
            },
            error: function (response) {
                $('.success-operation').hide();
                $('.error-operation').html(response.message).show();
            }
        });
    });

    $(document).on('click', '.delete-cart', function (e) {
        e.preventDefault();
        let self = $(this);
        if (confirm("Are you sure")) {
            $.ajax({
                url: $(self).data("url"),
                method: "DELETE",
                success: function (response) {
                    $('.record-list').fadeOut().html(response.html).fadeIn();
                    $('.error-operation').hide();
                    $('.success-operation').html(response.message).show();
                },
                error: function (response) {
                    $('.success-operation').hide();
                    $('.error-operation').html(response.message).show();
                }
            });
        }
    });

    $(document).on('click', '.store-cart', function (e) {
        e.preventDefault();
        let self = $(this);
        $.ajax({
            url: $(self).data("url"),
            method: "PUT",
            data: {
                variant: $(".modal-body").find('select[name="size"]').val(),
                dopings: $(".modal-body").find('input[name="doping"]:checked').map(
                    function () {
                        return this.value;
                    }).get()
            },
            success: function (response) {
                console.log(response.success);
            },
            error: function (response) {
                console.log(response.error);
            }
        });
    });


});

$(document).ready(function () {
    $(document).on("click", ".btn-product-details", function (e) {
        e.preventDefault();
        let self = $(this);
        let html = "";
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(self).data("url"),
            method: "GET",
            success: function (response) {
                $('.modal-product-title').html(response.title);
                $('.modal-product-description').html(response.description);
                $('.modal-product-price').html(response.price);
                $.each(response.variants, function (key, value) {
                    html += '<option value="' + value.id + '">' +
                        value.size +
                        '</option>';
                });
                $('.modal-product-variant').html(html);
                html = "";
                $.each(response.dopings, function (key, value) {
                    html += '<div class="btn-group-toggle" data-toggle="buttons">' +
                        '<label class="btn btn-secondary active">' +
                        '<input type="checkbox" name="doping" autocomplete="off" value="'+ value.id + '">' +
                        value.name +
                        '</label>';
                });
                $('.modal-product-doping').html(html);
                $('.store-cart').data('url', response.url);
            },
            error: function (response) {
            }
        });
    });
    $(document).on('change', 'select[name="size"], input[name="doping"]', function (e) {
        e.preventDefault();
        $.ajax({
            url: $('select[name="size"]').data('url'),
            method: "POST",
            data: {
                variant: $(".modal-body").find('select[name="size"]').val(),
                dopings: $(".modal-body").find('input[name="doping"]:checked').map(function() {return this.value;}).get()
            },
            success: function (response) {
                $('.modal-product-price').html(response.price);
            },
            error: function (response) {

            }
        });
    });
});

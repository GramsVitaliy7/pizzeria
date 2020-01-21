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
                    $('<option>', {
                        value: value.id,
                        text: value.name + ':' + value.size,
                    }).appendTo('.modal-product-variant');
                });
                $.each(response.dopings, function (key, value) {
                    $('<div>', {
                        class: 'btn-group-toggle',
                        'data-toggle': 'buttons',
                    }).append(
                        $('<label>', {
                                class: 'btn btn-secondary active',
                            }
                        ).append(
                        $('<input>', {
                                type: 'checkbox',
                                name: 'doping',
                                autocomplete: 'off',
                                value: value.id,
                                text: value.name,
                            }
                        ))).appendTo('.modal-product-doping');
                });

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
                dopings: $(".modal-body").find('input[name="doping"]:checked').map(
                    () => {
                        return this.value;
                    }).get()
            },
            success: function (response) {
                $('.modal-product-price').html(response.price);
            },
            error: function (response) {

            }
        });
    });
});

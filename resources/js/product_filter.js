$(document).ready(function () {
    function filter() {
        let selectedCategory = $('.product-filter[name="category-filter"]').children("option:selected").val();
        let selectedSort = $('.product-filter[name="price-sort-filter"]:checked').val();
        let url = $('.product-filter[name="category-filter"]').data('url');
        let minimumPrice = $('#hidden_minimum_rating').val();
        let maximumPrice = $('#hidden_maximum_rating').val();
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: url,
            data: {
                category: selectedCategory,
                priceSort: selectedSort,
                minPrice: minimumPrice,
                maxPrice: maximumPrice,
            },
            success: function (response) {
                $('.product-list').fadeOut().html(response.html).fadeIn();
            },
            error: function (response) {
                $('.show-error').html(response.error).show();
            }
        });
        return false;
    }


    $('.product-filter').change(function () {
        filter();
    });


    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 5,
        step: 0.1,
        values: [0, 5],
        slide: function (event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            $('#hidden_minimum_rating').val(ui.values[0]);
            $('#hidden_maximum_rating').val(ui.values[1]);
            filter();
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));

});

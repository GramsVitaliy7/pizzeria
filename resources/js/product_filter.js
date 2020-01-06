$(document).ready(function () {
    $('.category-filter').change(function () {
        let self = $(this);
        let selectedCategory = $(self).children("option:selected").val();
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'GET',
            url: $(self).data("url"),
            data: {
                category: selectedCategory
            },
            success: function (response) {
                $('.product-list').fadeOut().html(response.html).fadeIn();
                let obj = {Title: 'filter', Url: window.location.search};
                window.history.pushState(obj, obj.Title, obj.Url);
            },
            error: function (response) {
                $('.show-error').html(response.error).show();
            }
        });
        return false;
    });
});

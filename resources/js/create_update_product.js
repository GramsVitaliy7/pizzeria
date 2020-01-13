$(document).ready(function () {
    // Starting number of inputs
    let variantCounter = 0;
    let dopingCounter = 0;
    // Wrapper
    const variantWrapper = $('.variant-wrapper');
    const dopingWrapper = $('.doping-wrapper');
    const variant_fields = ['name', 'size', 'price'];
    const doping_fields = ['name', 'price'];
    $(document).on('click', '.btn-add-variant', function (e) {
        e.preventDefault();
        variantCounter++;
        let el = $('<div>', { class: 'variant-wrapper-element'} ).appendTo(variantWrapper);
        $('<h5>', { text: 'VARIANT ' + variantCounter + ':' }).appendTo(el);
        for (let i = 0; i < 3; i++) {
            $('<div>', {class: 'form-group'}).append(
                $('<strong>', {
                    text: variant_fields[i],
                })
            ).append(
                $('<input>', {
                    class: 'form-control',
                    placeholder: variant_fields[i].charAt(0).toUpperCase() + variant_fields[i].substring(1),
                    type: 'text',
                    name: 'variants[' + (variantCounter - 1) + '][' + variant_fields[i] + ']'
                })
            ).appendTo(el);
        }
        el.append($('<div>', {
            class: 'btn btn-warning btn-sm btn-delete-variant',
            href: '#',
            text: 'Delete variant',
        }));
    });
    $(document).on('click', '.btn-add-doping', function (e) {
        e.preventDefault();
        dopingCounter++;
        let el = $('<div>', { class: 'doping-wrapper-element'} ).appendTo(dopingWrapper);
        $('<h5>', {text: 'DOPING ' + dopingCounter + ':'}).appendTo(el);
        for (let i = 0; i < 2; i++) {
            $('<div>', {class: 'form-group'}).append(
                $('<strong>', {
                    text: doping_fields[i],
                })
            ).append(
                $('<input>', {
                    class: 'form-control',
                    placeholder: doping_fields[i].charAt(0).toUpperCase() + doping_fields[i].substring(1),
                    type: 'text',
                    name: 'dopings[' + (dopingCounter - 1) + '][' + doping_fields[i] + ']'
                })
            ).appendTo(el);
        }
        // Optional: add empty whitespace after each child
        el.append($('<div>', {
            class: 'btn btn-warning btn-sm btn-delete-doping',
            href: '#',
            text: 'Delete doping',
        }));
    });

    $(document).on('click', '.btn-delete-variant', function (e) {
        e.preventDefault();
        let self = $(this);
        self.closest('.variant-wrapper-element').remove();
    });

    $(document).on('click', '.btn-delete-doping', function (e) {
        e.preventDefault();
        let self = $(this);
        self.closest('.doping-wrapper-element').remove();
    });
});

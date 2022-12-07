// Show selected Image
function imagePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(input).closest('.imageDiv').find('img').attr('src', e.target.result);
            // $(input).closest('.imageDiv').find('a').removeClass('hidden');
            $(input).closest('.imageDiv').find('a').css('display', 'block');

        }

        reader.readAsDataURL(input.files[0]);
    } else {
        $(input).closest('.imageDiv').find('img').attr('src', 'placeholder.png');
    }
}

//For selected image remove
$(document).on('click', '.image_remove', function () {

    var x = confirm("Are you sure you want to delete?");
    if (!x) return false;
    var itemDiv = $(this).closest('.imageDiv');
    itemDiv.find('img').attr('src',  'storage/placeholder.png');
    itemDiv.find('a').css('display', 'none');
    itemDiv.find('input').val('');
});


$(document).on("click", ".checkbox_list", function () {

    var is_checked = $(this).val(); // this gives me null
    let token= $('meta[name="csrf-token"]').attr('content');

    if (is_checked != null) {
        var url = $(this).attr('data-url'); // this gives me null
        var dltUrl = url;
        $.ajax({
            url: dltUrl,
            type: 'post',
            dataType: 'json',
            data: {
                'is_active': is_checked,
                '_token': token
            },
            success: function () {
                location.reload();
            }, error: function () {
                location.reload();

            },
        });

    }

});

const url = $('#url').val();

$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
        }
    });
});
$(document).ready(function () {
    let countryCode = $('#country').find(':selected').data('code');
    let state = $('#state');
    let states = $("#state-code").val();
    if (states) {
        if (countryCode in regionList) {
            state.prop('disabled', false);
            regionList[countryCode].forEach(function (item) {
                let option = $('<option></option>').attr("value", item.name).text(item.name);
                if (item.name == states) {
                    option.attr('selected', 'selected')
                }
                state.append(option);
            });
        } else {
            let option = $('<option></option>').attr("value", "").text();
            state.append(option);
            state.prop('disabled', true);
        }
    }
});
$("#country").change(function () {
    let countryCode = $(this).find(':selected').data('code');
    let state = $("#state");
    state.parent().removeClass('d-none')
    state.empty();
    if (countryCode in regionList) {
        state.prop('disabled', false);
        regionList[countryCode].forEach(function (item) {
            let option = $('<option></option>').attr("value", item.name).text(item.name);
            state.append(option);
        });
    } else {
        let option = $('<option></option>').attr("value", "").text();
        state.append(option);
        state.prop('disabled', true);
    }
});

function loadMediaModel() {

    $('#media-modal').modal('show');
    myDropzone.removeAllFiles();


}

Dropzone.autoDiscover = false;
var myDropzone = new Dropzone(".dropzone", {
    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
    autoProcessQueue: false,
    maxFiles: 1,
    success: function (file, response) {
        var str = "";
        var obj = JSON.parse(response);
        if (!obj.error) {
            str += `<input type="hidden" name="image" value="${obj.id}">`;
            str += `<img src="${url}/${obj.folder_path}/${obj.image}">`;
            $(".profile-picture").empty().append(str);
            $('#media-modal').modal('toggle');
            $('.card-header').empty().append(`<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            <div class="alert-message">
                <strong>Hello there!</strong> Image Upload is Successful!
            </div>
        </div>`);
        }
        else {
            alert('Image not uploaded');
        }
    }
});

$('#uploadFile').click(function () {

    myDropzone.processQueue();

});


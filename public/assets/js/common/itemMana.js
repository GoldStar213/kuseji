$(document).ready(function() {

    var cw = $('.avatar-wrapper').width();
    $('.avatar-wrapper').css({'height':cw+'px'});

    var readURL = function(input, location) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#profile-pic-' + location).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file-upload-front").on('change', function() {
        readURL(this, 'front');
    });

    $("#upload-button-front").on('click', function() {
        $("#file-upload-front").click();
    });

    $("#file-upload-back").on('change', function() {
        readURL(this, 'back');
    });

    $("#upload-button-back").on('click', function() {
        $("#file-upload-back").click();
    });

    $("#file-upload-side").on('change', function() {
        readURL(this, 'side');
    });

    $("#upload-button-side").on('click', function() {
        $("#file-upload-side").click();
    });
});

function addItem() {

    var frontImg = $('#profile-pic-front').attr('src');
    var backImg = $('#profile-pic-back').attr('src');
    var sideImg = $('#profile-pic-side').attr('src');
    var categoryId = $('#category').val();
    var itemTitle = $('#itemTitle').val();
    var frontalColor = $('#frontalColor').find(":selected").val();
    var itemDescription = $('#itemDescription').val();
    var matchId = $('#matches').find(":selected").val();
    var requestType = $('#joinRequest').find(":selected").val();

    if(frontImg == "") {
        toastr.warning('正面画像を入力してください。');
        return;
    }

    if(backImg == "") {
        toastr.warning('画像1を入力してください。');
        return;
    }

    if(sideImg == "") {
        toastr.warning('画像2を入力してください。');
        return;
    }

    if($('#category').val().length  < 1) {
        toastr.warning('カテゴリが選択されませんでした。');
        $('#category').focus();
        return;
    }

    if(itemTitle == "") {
        toastr.warning('作品のタイトルを入力してください。');
        $('#itemTitle').focus();
        return;
    }

    if(frontalColor == undefined) {
        toastr.warning('額色を入力してください。');
        $('#frontalColor').focus();
        return;
    }

    if(itemDescription.length < 20) {
        toastr.warning('説明文の長さは少なくとも20文字でなければなりません。');
        $('#itemDescription').focus();
        return;
    }

    $.post('/itemAdd/new', {
        _token: $('meta[name="csrf-token"]').attr('content'),
        'frontImg': frontImg,
        'backImg': backImg,
        'sideImg': sideImg,
        'categoryId': categoryId,
        'itemTitle': itemTitle,
        'frontalColor': frontalColor,
        'itemDescription': itemDescription,
        'matchId': matchId,
        'requestType': requestType
    }, function(data){
        if(data == "unselected match") {
            toastr.warning('マッチングが選択されていません。');
            $('#matches').focus();
            return;
        }

        if(data == "OK") {
            toastr.success('操作に成功しました。');
            location.href = '/itemAdd';
        }
    });
}
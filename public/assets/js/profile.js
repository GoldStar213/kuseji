$("#profileDropdown_PC").css('display', 'block');
$("#profileEdit_PC").addClass('active');
$("#dashboard_PC").removeClass('active');

$(document).ready(function() {

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function() {
        readURL(this);
        changeState();
    });

    $(".upload-button").on('click', function() {
        $(".file-upload").click();
    });
});

function changeState() {
    $('#state').val(1);
}

function saveProfile() {
    if ($('#state').val() == 0) {
        toastr.warning('変更された資料はありません。');
        return;
    } else {
        var firstName = $('#firstName').val();
        var lastName = $('#lastName').val();
        var email = $('#email').val();
        var phoneNumber = $('#phoneNumber').val();
        var postalCode = $('#postalCode').val();
        var capitalCity = $('#capitalCity').val();
        var houseNumber = $('#houseNumber').val();
        var buildingName = $('#buildingName').val();
        var avatarUrl = $('#avatarUrl').attr('src');
        var currentPassword = $('#currentPassword').val();
        var newPassword = $('#newPassword').val();
        var confirmPassword = $('#confirmPassword').val();

        let validEmailType = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        let validPassType = /^(?=.*[A-Za-z])(?=.*\d).{6,20}$/;
        let validPhoneType = /^\(?(\d{3})\)?[- ]?(\d{4})[- ]?(\d{4})$/;
        let validPostalType = /^\d{7}$/;

        if (firstName == "") {
            toastr.warning('あなたの姓を入力してください。');
            $('#firstName').focus();
            return;
        }

        if (lastName == "") {
            toastr.warning('あなたの名を入力してください。');
            $('#lastName').focus();
            return;
        }

        if (email.match(validEmailType) == null) {
            toastr.warning('メールアドレスが正しく入力されていません');
            $("#registerEmail").focus();
            return;
        }

        if (validPhoneType.test(phoneNumber) == false) {
            toastr.warning('電話番号の種類が正しくありません。');
            $("#phoneNumber").focus();
            return;
        }

        if (postalCode == "") {
            toastr.warning('あなたの郵便番号を入力してください。');
            $('#postalCode').focus();
            return;
        }

        if (postalCode.match(validPostalType) == null) {
            toastr.warning('郵便番号形式が無効です。');
            $("#postalCode").focus();
            return;
        }

        if (capitalCity == "") {
            toastr.warning('都道府県を入力してください。');
            $("#capitalCity").focus();
            return;
        }

        if (houseNumber == "") {
            toastr.warning('お住まいの市区町村を入力してください。');
            $("#houseNumber").focus();
            return;
        }

        if (buildingName == "") {
            toastr.warning('あなたの町のエリアを入力してください。');
            $("#buildingName").focus();
            return;
        }

        if (currentPassword.length > 0 && currentPassword.match(validPassType) == null) {
            toastr.warning('パスワードは、文字と数字を含む6文字以上20文字未満でなければなりません。');
            $("#currentPassword").focus();
            return;
        }

        if (newPassword.length > 0 && newPassword.match(validPassType) == null) {
            toastr.warning('パスワードは、文字と数字を含む6文字以上20文字未満でなければなりません。');
            $("#newPassword").focus();
            return;
        }

        if (confirmPassword.length > 0 && confirmPassword.match(validPassType) == null) {
            toastr.warning('パスワードは、文字と数字を含む6文字以上20文字未満でなければなりません。');
            $("#confirmPassword").focus();
            return;
        }

        if (currentPassword.length == 0 && (newPassword.length > 0 || confirmPassword.length > 0)) {
            toastr.warning('現在のパスワードが入力されていません。');
            $("#currentPassword").focus();
            return;
        }

        if (newPassword != confirmPassword) {
            toastr.warning('確認パスワードが正しくありません。');
            $('#newPassword').focus();
            return;
        }

        $.post('/profileEdit/update', {
            _token: $('meta[name="csrf-token"]').attr('content'),
            'firstName': firstName,
            'lastName': lastName,
            'email': email,
            'phoneNumber': phoneNumber,
            'postalCode': postalCode,
            'capitalCity': capitalCity,
            'houseNumber': houseNumber,
            'buildingName': buildingName,
            'avatarUrl': avatarUrl,
            'currentPassword': currentPassword,
            'newPassword': newPassword
        }, function (data) {
            if (data == "email conflict") {
                toastr.warning('メールアドレスが重複しました。');
                return;
            }

            if (data == "password mismatch") {
                toastr.warning('現在のパスワードが正しくありません。');
                return;
            }

            if (data == "OK") {
                toastr.success('正常にアップデートされました。');
                location.href = "/profileEdit";
            }
        });
    }
}
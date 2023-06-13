function registerUser() {
    let firstName = $("#registerFirstName").val();
    let lastName = $("#registerLastName").val();
    let email = $("#registerEmail").val();
    let password = $("#registerPassword").val();
    let password_confirmation = $("#confirmPassword").val();

    let validEmailType = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    let validPassType =  /^(?=.*[A-Za-z])(?=.*\d).{6,20}$/;

    if(firstName === "" || firstName == undefined) {
        toastr.warning('あなたの姓を入力してください。');
        $("#registerFirstName").focus();
        return;
    }
    
    if(lastName === "" || lastName == undefined) {
        toastr.warning('あなたの名を入力してください。');
        $("#registerLastName").focus();
        return;
    }

    if (email.match(validEmailType) == null) {
        toastr.warning('メールアドレスが正しく入力されていません');
        $("#registerEmail").focus();
        return;
    }

    if(password.match(validPassType) == null) {
        toastr.warning('パスワードは、文字と数字を含む6文字以上20文字未満でなければなりません。');
        $("#registerPassword").focus();
        return;
    }

    if(password != password_confirmation) {
        toastr.warning('確認パスワードが正しくありません。');
        $("#confirmPassword").focus();
        return;
    }

    if($("#agreeCheck").prop('checked') == false) {
        toastr.warning('まず、利用規約に同意してください。');
        $("#agreeCheck").focus();
        return;
    }
    
    $.post('/register', {
        _token: $('meta[name="csrf-token"]').attr('content'),
        'firstName': firstName,
        'lastName': lastName,
        'email': email,
        'password': password
    }, function(data){
        if(data == "Already registered Email!") {
            toastr.warning('すでに登録されているメールアドレスです。');
            return;
        }

        if(data == "signined") {
            location.href="/";
            toastr.success('成果的に登録されています。');
        }
    });
}
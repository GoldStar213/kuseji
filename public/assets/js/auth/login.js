function loginUser() {
    email = $("#loginEmail").val();
    password = $("#loginPwd").val();
    
    let validEmailType = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    if(email == "") {
        toastr.warning('メールアドレスを入力してください');
        $("#loginEmail").focus();
        return;
    }

    if (email.match(validEmailType) == null) {
        toastr.warning('メールアドレスが正しく入力されていません');
        $("#loginPwd").focus();
        return;
    }

    $.post('/login', {
        _token: $('meta[name="csrf-token"]').attr('content'),
        'email': email,
        'password': password
    }, function(data){
        if(data == "none-registered") {
            toastr.warning('登録されていないメールアドレスです。');
            return;
        }

        if(data == "incorrect-password") {
            toastr.warning('パスワードが正しくありません。');
            return;
        }
        
        if(data =="logged") {
            location.href="/";
        }
    });
    
}
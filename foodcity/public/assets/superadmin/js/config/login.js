$(function(){
    $('#loginForm').on('submit', function(e){
        e.preventDefault();
        var submitBtn = $('#btnSubmit');
        var prevContent = submitBtn.html();
        $('#btnSubmit').html('<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Login');
        let data = {};
        data.userName = $('#inputUname').val();
        data.password = $('#inputPassword').val();
        data._token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: baseUrl+"/superAdmin/login",
            type: "POST",
            dataType: "json",
            data: data,
            success: function(result){
                console.log(result);
                if(result.status == true)
                {
                    $.growl.notice({
                        message: 'Your Credential is accepted.'
                    });
                    localStorage.setItem('OwnMakeShoppingSuperAdmin', btoa(JSON.stringify(result.userData)));
                    setTimeout(function(){
                        location.assign(baseUrl+'/superAdmin');
                    }, 1000);
                }
                else
                {
                    $.growl.error({
                        message: result.msg
                    });
                    submitBtn.html(prevContent); 
                    if(result.errors){
                        validateLogin(result.errors);
                    }
                }
            },
            fail: function (xhr, textStatus, errorThrown) {
                console.log(xhr);
                $.growl.error({
                    message: 'Something went wrong! Please check your internet connection.'
                });
                submitBtn.html(prevContent);
            },
            error: function (xhr, textStatus) {
                console.log(xhr);
                $.growl.error({
                    message: xhr.responseJSON.message
                });
                submitBtn.html(prevContent);
            }
        });
    });
});

function validateLogin(errors){
    if(errors.userName){
        $('#inputUname').parent('div').addClass('has-danger');
        $('#inputUname').siblings('div .pristine-error').html('Username field is required.');
    }else{
        $('#inputUname').parent('div').removeClass('has-danger');
        $('#inputUname').siblings('div .pristine-error').html('');
    }
    if(errors.password){
        $('#inputPassword').parent('div').addClass('has-danger');
        $('#inputPassword').siblings('div .pristine-error').html('Password field is required.');
    }else{
        $('#inputPassword').parent('div').removeClass('has-danger');
        $('#inputPassword').siblings('div .pristine-error').html('');
    }
}
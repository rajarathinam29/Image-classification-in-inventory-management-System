var submitBtn = $('#btnSubmit');
$(function(){
    $("#phone_no").intlTelInput();
});

$(document).on('click', '#btnSubmit', function(e){
    // e.preventDefault();
    var prevContent = submitBtn.html();
    submitBtn.html('<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Create');
    let data = adminData;
    $.each($('#userCreateForm').serializeArray(), function(k,v){
        data[v.name] = v.value;
    })

    $.ajax({
        url: `${baseUrl}/superAdmin/admins/addUser`,
        type: "POST",
        dataType: "json",
        data: data,
        success: function(result){
            if(result.status == true)
            {
                $.growl.notice({
                    message: result.msg
                });
                submitBtn.html(prevContent);
                history.back();
                // location.assign(`${baseUrl}/superAdmin/users`);
            }
            else
            {
                showError(result.msg); 
                submitBtn.html(prevContent)
                validateErrors(result.errors);
            }
        },
        fail: function (xhr) {
            console.log(xhr);
            showError('Something went wrong! Please check your internet connection.');
            submitBtn.html(prevContent)
        },
        error: function (xhr) {
            console.log(xhr);
            showError(xhr.responseJSON.message);
            submitBtn.html(prevContent)
        }
    });
});
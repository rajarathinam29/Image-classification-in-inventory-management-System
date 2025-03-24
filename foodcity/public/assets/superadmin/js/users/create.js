var userData = [], roleData=[];
$(function(){
    $("#phone_no").intlTelInput();
    getRole();
    // $("#phone_no").intlTelInput();
    var maskOptions = {
        placeholder: "+00 00 000 0000",
        onKeyPress: function(cep, e, field, options) {
          // Use an optional digit (9) at the end to trigger the change
          var masks = ["+00 00 000 00000","+00 0 00 0000 0000"],
            digits = cep.replace(/[^0-9]/g, "").length,
            // When you receive a value for the optional parameter, then you need to swap
            // to the new format
            mask = digits <= 11 ? masks[0] : masks[1];
    
          $("#phone_no").mask(mask, options);
        }
      };
    
      $("#phone_no").mask("+00 (0) 00 0000 0000", maskOptions);
    // $('#phone_no').mask('+00 (0) 00 0000 0000|+00 (00) 000 0000');

    $('#btnSubmit').on('click', function(e){
        console.log('form submit')
        // e.preventDefault();
        var submitBtn = $(this);
        var prevContent = submitBtn.html();
        submitBtn.html('<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Updating');
        let data = adminData;
        $.each($('#userEditForm').serializeArray(), function(k,v){
            data[v.name] = v.value;
        });
        var phone_no = data.phone_no;
        data.phone_no = phone_no.replace(/\D/g, "");
        console.log(data);

        $.ajax({
            url: `${baseUrl}/superAdmin/users/addUser`,
            type: "POST",
            dataType: "json",
            data: data,
            success: function(result){
                if(result.status == true)
                {
                    var rslt = result.insertData;
                    $.growl.notice({
                        message: rslt.msg
                    });
                    submitBtn.html(prevContent);
                    location.assign(`${baseUrl}/superAdmin/users`);
                    // resetPanels();
                }
                else
                {
                    showError(result.msg); 
                    submitBtn.html(prevContent)
                    validateErrors(result.errors);
                }
            },
            fail: function (xhr, textStatus, errorThrown) {
                console.log(xhr);
                showError('Something went wrong! Please check your internet connection.');
                submitBtn.html(prevContent)
            },
            error: function (xhr, textStatus) {
                console.log(xhr);
                showError(xhr.responseJSON.message);
                submitBtn.html(prevContent)
            }
        });
    });

    // get Role
    function getRole(){
        roleData = [];
        let data = adminData;
        $.ajax({
            url: `${baseUrl}/superAdmin/userRole/getUserRole`,
            type: "POST",
            dataType: "json",
            data: data,
            success: function(result){
                if(result.status == true)
                {
                    roleData = result.roleData;
                    $('select[name="user_role"]').empty();
                    $.each(roleData, function(k,v){
                        $('select[name="user_role"]').append($('<option />', {value:v.id, html:v.role_name}));
                    })
                }
                else
                {
                    showError(result.msg);
                }
            },
            fail: function (xhr) {
                console.log(xhr);
                showError('Something went wrong! Please check your internet connection.');
            },
            error: function (xhr) {
                console.log(xhr);
                showError('Something went wrong!.');
            }
        });
    }
})
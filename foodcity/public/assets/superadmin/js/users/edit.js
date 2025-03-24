var userData = [], roleData = [];
var url_string = location.href; //window.location.href
var url = new URL(url_string);
var userIdData = JSON.parse(atob(url.searchParams.get("q")));
var masks = ["+00 00 000 00000","+00 0 00 0000 0000"]
var maskOptions = {
    placeholder: "+00 00 000 0000",
    onKeyPress: function(cep, e, field, options) {
      // Use an optional digit (9) at the end to trigger the change
        masks,
        digits = cep.replace(/[^0-9]/g, "").length,
        // When you receive a value for the optional parameter, then you need to swap
        // to the new format
        mask = digits <= 11 ? masks[0] : masks[1];

      $("#phone_no").mask(mask, options);
    }
};
$(function(){
    getRole();
    getUser();
    
    $(document).on('input', 'input[name="email"]', function(){
        $('input[name="user_name"]').val($(this).val());
    });
    $('#btnSubmit').on('click', function(e){
        console.log('form submit')
        // e.preventDefault();
        var submitBtn = $(this);
        var prevContent = submitBtn.html();
        submitBtn.html('<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Edit');
        let data = adminData;
        $.each($('#userEditForm').serializeArray(), function(k,v){
            data[v.name] = v.value;
        })
        var phone_no = data.phone_no;
        data.phone_no = phone_no.replace(/\D/g, "");

        $.ajax({
            url: `${baseUrl}/superAdmin/users/updateUser`,
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
    // get user
    function getUser(){
        userData = [];
        let data = adminData;
        data.userId = userIdData.userId;
        $.ajax({
            url: `${baseUrl}/superAdmin/users/getUser`,
            type: "POST",
            dataType: "json",
            data: data,
            success: function(result){
                if(result.status == true)
                {
                    userData = result.userData;
                }
                else
                {
                    showError(result.msg);
                }
                showUser();
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
    // show details
    function showUser(){
    //    console.log(usersData);
        if(userData){
            $('select[name="user_title"]').val(userData.title).trigger('change');
            $('input[name="first_name"]').val(userData.first_name);
            $('input[name="last_name"]').val(userData.last_name);
            $('input[name="phone_no"]').val(userData.phone_no);
            $('input[name="email"]').val(userData.email);
            $('input[name="user_name"]').val(userData.user_name);
            $('select[name="user_status"]').val(userData.status).trigger('change');
            $('select[name="user_role"]').val(userData.role_id).trigger('change'); 
            $('input[name="building_no"]').val(userData.building_no);
            $('input[name="street"]').val(userData.street);
            $('input[name="city"]').val(userData.state);
            $('input[name="state"]').val(userData.city);
            $('select[name="country"]').val(userData.country).trigger('change');
            $('input[name="zipcode"]').val(userData.zipcode);
            var digits = userData.phone_no.replace(/[^0-9]/g, "").length;
            mask = digits <= 11 ? masks[0] : masks[1];
            $("#phone_no").intlTelInput();
            if(userData.role_id < adminSession.role_id)
                $('select[name="user_role"]').prop('disabled', true);
        }
    }

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
var adminUserData = [], roleData = [];
var url_string = location.href; //window.location.href
var url = new URL(url_string);
var userIdData = JSON.parse(atob(url.searchParams.get("q")));
$(function(){
    getUser(); 
});

$(document).on('input', 'input[name="email"]', function(){
    $('input[name="user_name"]').val($(this).val());
});
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
    data.adminId = userIdData.userId;

    $.ajax({
        url: `${baseUrl}/superAdmin/admins/updateUser`,
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
                history.back();
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
    adminUserData = [];
    let data = adminData;
    data.adminId = userIdData.userId;
    $.ajax({
        url: `${baseUrl}/superAdmin/admins/getUser`,
        type: "POST",
        dataType: "json",
        data: data,
        success: function(result){
            if(result.status == true)
            {
                adminUserData = result.adminData;
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
    if(adminUserData){
        $('select[name="user_title"]').val(adminUserData.title).trigger('change');
        $('input[name="first_name"]').val(adminUserData.first_name);
        $('input[name="last_name"]').val(adminUserData.last_name);
        $('input[name="phone_no"]').val(adminUserData.phone_no);
        $('input[name="email"]').val(adminUserData.email);
        $('input[name="user_name"]').val(adminUserData.user_name);
        $('select[name="user_status"]').val(adminUserData.status).trigger('change');
        $('select[name="user_role"]').val(adminUserData.role_id).trigger('change'); 
        $('input[name="building_no"]').val(adminUserData.building_no);
        $('input[name="street"]').val(adminUserData.street);
        $('input[name="city"]').val(adminUserData.state);
        $('input[name="state"]').val(adminUserData.city);
        $('select[name="country"]').val(adminUserData.country).trigger('change');
        $('input[name="zipcode"]').val(adminUserData.zipcode);
        $("#phone_no").intlTelInput();
    }
}
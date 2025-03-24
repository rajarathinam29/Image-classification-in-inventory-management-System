var adminUserData = [], companiesData=[], userCompaniesData = [];
var url_string = location.href; //window.location.href
var url = new URL(url_string);
var userIdData = JSON.parse(atob(url.searchParams.get("q")));
$(function(){
    getUser();
});

//edit user
$(document).on('click', '.btnEdit', function(){
    location.assign(`${baseUrl}/superAdmin/admins/edit?q=${btoa(JSON.stringify(userIdData))}`);
})
//Set permission
$(document).on('click', '.btnSetPermission', function(){
    location.assign(`${baseUrl}/superAdmin/admins/setPermission?q=${btoa(JSON.stringify(userIdData))}`);
})
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
        $('#userId').html(`${adminUserData.user_name}`);
        $('#userName').html(`${adminUserData.title}. ${adminUserData.first_name} ${adminUserData.last_name}`);
        $('#userEmail').html(`${adminUserData.email}`);
        $('#userStatus').html(adminUserData.status==1?`<span class="badge badge-gradient-success mt-2 fs-11">Active</span>`:`<span class="badge badge-gradient-warning mt-2 fs-11">Inactive</span>`);
        $('#userPhone').html(`${adminUserData.phone_no}`);
        $('#building_no').html(`${adminUserData.building_no || ''}`);
        $('#street').html(`${adminUserData.street || ''}`);
        $('#city').html(`${adminUserData.city || ''}`);
        $('#state').html(` ${adminUserData.state || ''}`);
        $('#country').html(`${adminUserData.country || ''}`);
        $('#zipcode').html(`${adminUserData.zipcode || ''}`);
        $.growl.notice({
            message: 'Successfully loaded.'
        });
    }
    
}
var adminUserData = [], modulesData = [];
var url_string = location.href; //window.location.href
var url = new URL(url_string);
var userIdData = JSON.parse(atob(url.searchParams.get("q")));
$(function(){
    getModules();
});

$('#btnSubmit').on('click', function(e){
    // e.preventDefault();
    var submitBtn = $(this);
    var prevContent = submitBtn.html();
    submitBtn.html('<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Set permission');
    let data = adminData;
    let permissions = {};
    $.each($('#permissionForm').serializeArray(), function(k,v){
        permissions[v.name] = v.value;
    });
    data.permissions = permissions;
    data.adminId = userIdData.userId;

    $.ajax({
        url: `${baseUrl}/superAdmin/admins/setPermission`,
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
                // history.back();
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
    data.adminId = userIdData.userId;
    $.ajax({
        url: `${baseUrl}/superAdmin/admins/getPermission`,
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
            setUserPermission();
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
function setUserPermission(){
    if(adminUserData.Permissions){
        var permissions = JSON.parse(adminUserData.Permissions);
        $.each(permissions, function(k,v){
                $('#'+k).prop('checked', true);
        });
    }
}

// get Role
function getModules(){
    modulesData = [];
    let data = adminData;
    $.ajax({
        url: `${baseUrl}/superAdmin/modules/getAdminModules`,
        type: "POST",
        dataType: "json",
        data: data,
        success: function(result){
            if(result.status == true)
            {
                modulesData = result.modulesData;
            }
            else
            {
                showError(result.msg);
            }
            setModules();
            getUser();
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

function setModules(){
    $('#tree3').empty();
    if(modulesData.length){
        $.each(modulesData, function(k,v){
            $('#tree3').append(
                generateModules(v)
            )
        })
    }
    $('#tree3').treed({openedClass:'si si-arrow-right', closedClass:'si si-arrow-down'});
}

function generateModules(data){
    var $li = '';
    var moduleName = data.module_name.toLowerCase()
    $.each(data.modulessub, function(k,v){
        $li += `<li>
        ${v.sub_module_name}
        <div class="material-switch pull-right">
            <input id="${moduleName}${v.sub_module_name}" name="${moduleName}${v.sub_module_name}" type="checkbox"/>
            <label for="${moduleName}${v.sub_module_name}" class="label-success"></label>
        </div>
    </li>`;
    });
    return `<li><a href="javascript:void(0);">${data.module_name}</a>
        <ul>
            ${$li}
        </ul>
    </li>`;
}
var userData = [], companiesData=[], userCompaniesData = [];
var url_string = location.href; //window.location.href
var url = new URL(url_string);
var userIdData = JSON.parse(atob(url.searchParams.get("q")));
$(function(){
    getUser();
    getUserCompanies();
    getCompanies();
});

//edit user
$(document).on('click', '.btnEdit', function(){
    var data = {userId:userIdData.userId};
    location.assign(`${baseUrl}/superAdmin/users/edit?q=${btoa(JSON.stringify(data))}`);
})
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
        $('#userId').html(`${userData.user_name}`);
        $('#userName').html(`${userData.title}. ${userData.first_name} ${userData.last_name}`);
        $('#userEmail').html(`${userData.email}`);
        $('#userStatus').html(userData.status==1?`<span class="badge badge-gradient-success mt-2 fs-11">Active</span>`:`<span class="badge badge-gradient-warning mt-2 fs-11">Inactive</span>`);
        $('#userPhone').html(`${userData.phone_no}`);
        $('#userAddress').html(`${(userData.building_no?userData.building_no+',':'')}  ${(userData.street?userData.street+',':'')} ${(userData.state?userData.state+',':'')} ${(userData.city?userData.city+',':'')} ${(userData.country?userData.country+',':'')} ${(userData.zipcode?userData.zipcode+',':'')}`);
        $('#roleName').html(`<span class="badge badge-gradient-success mt-2 fs-11">${userData.role.role_name}</span>`);
        $.growl.notice({
            message: 'Successfully loaded.'
        });
    }
    
}

// get user Companies
function getUserCompanies(){
    userCompaniesData = [];
    let data = adminData;
    data.userId = userIdData.userId;
    $.ajax({
        url: `${baseUrl}/superAdmin/userCompanies/getCompanies`,
        type: "POST",
        dataType: "json",
        data: data,
        success: function(result){
            if(result.status == true)
            {
                userCompaniesData = result.companiesData;
            }
            else
            {
                showError(result.msg);
            }
            showCompanies();
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
// Show Branch
function showCompanies(){
    let companiesContent = $('#companiesContent');
    companiesContent.empty();
    if(userCompaniesData.length){
        $.each(userCompaniesData, function(k,v){
            companiesContent.append(
                generateCompanyContent(v)
            );

        });
    }
}
// Generate Company Content
function generateCompanyContent(data){
    return `<div class="col-xl-3 col-lg-6">
        <div class="card border p-0 shadow-none">
            <div class="d-flex align-items-center p-4">
                <div class="avatar avatar-lg brround d-block cover-image" data-image-src="{{asset('assets/images/users/7.jpg')}}" >
                </div>
                <div class="wrapper ms-3">
                    <p class="mb-0 mt-1  font-weight-semibold">${data.company.name}</p>
                    <small class="text-muted">${data.branch.branch_name} ${data.default_company==1?`<span class="badge badge-gradient-success mt-2 fs-11">Default</span>`:``}</small>
                </div>
                <div class="float-end ms-auto">
                    <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical fs-18"></i></a>
                    <div class="dropdown-menu dropdown-menu-start" id="${data.id}">
                        ${data.default_company==0?`<a class="dropdown-item btnSetAsDefault" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Set as default</a>`:``}
                        <a class="dropdown-item btnSetPermission" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Set Permission</a>
                        <a class="dropdown-item btnCompanyDelete" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
                    </div>
                </div>
            </div>
            <div class="card-body border-top">
                <p class="mb-5"></p>
                <ul class="mb-0 user-details" >
                    <li class="mb-5"><span class=""><i class="fe fe-mail p-2 bg-warning-transparent text-warning border-warning brround me-3"></i></span><span class="h6">${data.branch.email}</span></li>
                    <li><span class=""><i class="fe fe-phone-call p-2 bg-success-transparent text-success border-success brround me-3"></i></span><span class="h6">${data.branch.phone_no}</span></li>
                </ul>
            </div>
        </div>
    </div>`;
}


// Assign company
$(document).on('click', '#btnCompanyAssign', function(){
    $('#companyAssignModal').modal('show');
    resetPanels();
});
//set Permission
$(document).on('click', '.btnSetPermission', function(){
    var k = $(this).parent('div').attr('id');
    location.assign(`${baseUrl}/superAdmin/userCompanies/setPermission?q=${btoa(JSON.stringify({userCompanyId:k}))}`);
})
// set as default
$(document).on('click', '.btnSetAsDefault', function(){
    var k = $(this).parent('div').attr('id');
    let data = adminData;
    data.userId = userIdData.userId;
    data.userCompanyId = k
    $.ajax({
        url: `${baseUrl}/superAdmin/userCompanies/setDefault`,
        type: "POST",
        dataType: "json",
        data: data,
        success: function(result){
            if(result.status == true)
            {
                $.growl.notice({
                    message: result.msg
                });
                getUserCompanies();
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
})
// Delete User Company
$(document).on('click', '.btnCompanyDelete', function(){
    var k = $(this).parent('div').attr('id');
    swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#1c84ee",
        cancelButtonColor: "#fd625e",
        confirmButtonText: "Yes, remove it!"
      }, function (result) {
        if (result) {
            let data = adminData;
            data.userCompanyId = k;
            $.ajax({
                url: baseUrl+"/superAdmin/userCompanies/deleteUserCompany",
                type: "POST",
                data: data,
                success: function(result){
                    if(result.status == true)
                    {
                        $.growl.notice({
                            message: result.msg
                        });
                        getUserCompanies();
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
                    showError(xhr.responseJSON.message);
                }
            });
          
        }
    });
});
// Get Companies
function getCompanies(){
    companiesData = [];
    let data = adminData;
    $.ajax({
        url: `${baseUrl}/superAdmin/companies/getCompanies`,
        type: "POST",
        dataType: "json",
        data: data,
        success: function(result){
            if(result.status == true)
            {
                companiesData = result.companiesData;
                $('#sltCompany').empty();
                $('#sltCompany').append(`<option value="">Choose Company</option>`)
                $.each(companiesData, function(k,v){
                    $('#sltCompany').append(`<option value="${v.id}">${v.name}</option>`);
                })
                $('#sltCompany, #sltBranch').select2({
                    dropdownParent: $('#companyAssignModal'),
                    width: '100%'
                });
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
//get Branch 
$(document).on('change', '#sltCompany', function(){
    branchesData = [];
    let data = adminData;
    data.companyId = $(this).val();
    $.ajax({
        url: `${baseUrl}/superAdmin/branches/getBranches`,
        type: "POST",
        dataType: "json",
        data: data,
        success: function(result){
            if(result.status == true)
            {
                branchesData = result.branchesData;
                $('#sltBranch').empty();
                $.each(branchesData, function(k,v){
                    var branch = userCompaniesData.find(branch => branch.branch_id === v.id);
                    if(!branch){
                        $('#sltBranch').append(`<option value="${v.id}">${v.branch_name}</option>`);
                    }
                })
                $('#sltBranch').select2({
                    dropdownParent: $('#companyAssignModal'),
                    width: '100%'
                });
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
});
// Assign Company For user
$(document).on('click', '#btnAssignCompany', function(){
    var submitBtn = $(this);
    var prevContent = submitBtn.html();
    submitBtn.html('<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Assign');
    let data = adminData;
    data.user_id = userIdData.userId;
    $.each($('#assignCompanyForm').serializeArray(), function(k,v){
        data[v.name] = v.value;
    })

    $.ajax({
        url: `${baseUrl}/superAdmin/userCompanies/addUserCompanies`,
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
                $('#companyAssignModal').modal('hide');
                getUserCompanies();
                resetPanels();
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
})

function resetPanels(){
    $('select[name="status"]').val(0).trigger('change');
    $('select[name="company_id"]').val('').trigger('change');
    $('select[name="branch_id"]').select2('destroy').empty();
}


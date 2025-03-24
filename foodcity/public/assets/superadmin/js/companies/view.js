var companyData = [], branchesData = [];
var months=['January','February','March','April','May','June','July','August','September','October','November','December'];
var url_string = location.href; //window.location.href
var url = new URL(url_string);
var companyIdData = JSON.parse(atob(url.searchParams.get("q")));
$(function(){
    getCompany();
    getBranches();
});


//edit user
$(document).on('click', '.btnEdit', function(){
    var data = {companyId:companyIdData.companyId};
    location.assign(`${baseUrl}/superAdmin/companies/edit?q=${btoa(JSON.stringify(data))}`);
})
// get user
function getCompany(){
    companyData = [];
    let data = adminData;
    data.companyId = companyIdData.companyId;
    $.ajax({
        url: `${baseUrl}/superAdmin/companies/getCompany`,
        type: "POST",
        dataType: "json",
        data: data,
        success: function(result){
            console.log(result);
            if(result.status == true)
            {
                companyData = result.companyData;
            }
            else
            {
                showError(result.msg);
            }
            showCompany();
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
function showCompany(){
//    console.log(usersData);
    if(companyData){
        $('#companyName').html(`${companyData.name}`);
        $('#registeredNo').html(`${companyData.registerd_no}`);
        $('#startDate').html(`${companyData.start_date}`);
        $('#proprietorName').html(companyData.proprietor_name || '');
        $('#companyEmail').html(`${companyData.email}`);
        $('#companyStatus').html(companyData.status==1?`<span class="badge badge-gradient-success mt-2 fs-11">Active</span>`:`<span class="badge badge-gradient-warning mt-2 fs-11">Inactive</span>`);
        $('#companyPhone').html(`${companyData.phone_no}`);
        $('#companyAddress').html(`${(companyData.building_no?companyData.building_no+',':'')}  ${(companyData.street?companyData.street+',':'')} ${(companyData.state?companyData.state+',':'')} ${(companyData.city?companyData.city+',':'')} ${(companyData.country?companyData.country+',':'')} ${(companyData.zipcode?companyData.zipcode+',':'')}`);
        $('#userLimit').html(`${companyData.user_limit}`);
        $('#startingMonth').html(`${months[companyData.starting_month-1]}`);
        $('#currency').html(`${companyData.currency.symbol} (${companyData.currency.code}) `);
        $('#currencyPlacement').html(`${companyData.currency_placement}`);
        $('#dateFormat').html(`${companyData.date_format}`);
        if(companyData.logo)
            $('#companyLogo').attr("style", `background-image: url('${baseUrl}/${companyData.logo}')`)
        $.growl.notice({
            message: 'Successfully loaded.'
        });
    }
}

// get Branch
function getBranches(){
    branchesData = [];
    let data = adminData;
    data.companyId = companyIdData.companyId;
    $.ajax({
        url: `${baseUrl}/superAdmin/branches/getBranches`,
        type: "POST",
        dataType: "json",
        data: data,
        success: function(result){
            if(result.status == true)
            {
                branchesData = result.branchesData;
            }
            else
            {
                showError(result.msg);
            }
            showBranches();
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
function showBranches(){
    let branchContent = $('#branchesContent');
    branchContent.empty();
    if(branchesData.length){
        $.each(branchesData, function(k,v){
            branchContent.append(
                generateBranchContent(v)
            );

        });
    }
}
// Generate Branch Content
function generateBranchContent(data){
    return `<div class="col-xl-3 col-lg-6">
        <div class="card border p-0 shadow-none">
            <div class="d-flex align-items-center p-4">
                <div class="avatar avatar-lg brround d-block cover-image" data-image-src="{{asset('assets/images/users/7.jpg')}}" >
                </div>
                <div class="wrapper ms-3">
                    <p class="mb-0 mt-1  font-weight-semibold">${data.branch_name}</p>
                    <small class="text-muted">${data.status==1?`<span class="badge badge-gradient-success mt-2 fs-11">Active</span>`:`<span class="badge badge-gradient-warning mt-2 fs-11">Inactive</span>`}</small>
                </div>
                <div class="float-end ms-auto">
                    <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical fs-18"></i></a>
                    <div class="dropdown-menu dropdown-menu-start" id="${data.id}">
                        <a class="dropdown-item btnBranchEdit" href="javascript:void(0);"><i class="fe fe-edit me-2"></i> Edit</a>
                        <a class="dropdown-item btnBranchDelete" href="javascript:void(0);"><i class="fe fe-trash me-2"></i> Delete</a>
                    </div>
                </div>
            </div>
            <div class="card-body border-top">
                <p class="mb-5">${data.description || ''}</p>
                <ul class="mb-0 user-details" >
                    <li class="mb-5"><span class=""><i class="fe fe-mail p-2 bg-warning-transparent text-warning border-warning brround me-3"></i></span><span class="h6">${data.email}</span></li>
                    <li><span class=""><i class="fe fe-phone-call p-2 bg-success-transparent text-success border-success brround me-3"></i></span><span class="h6">${data.phone_no}</span></li>
                </ul>
            </div>
        </div>
    </div>`;
}

$(document).on('click', '#btnBranchAdd', function(){
    location.assign(`${baseUrl}/superAdmin/branches/create?q=${btoa(JSON.stringify({companyId:companyIdData.companyId}))}`)
})

$(document).on('click', '.btnBranchEdit', function(){
    let branchId = $(this).parent('div').attr('id');
    location.assign(`${baseUrl}/superAdmin/branches/edit?q=${btoa(JSON.stringify({companyId:companyIdData.companyId, branchId:branchId}))}`);
});

$(document).on('click', '.btnBranchDelete', function(){
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
            data.branchId = k;
            $.ajax({
                url: baseUrl+"/superAdmin/branches/deleteBranch",
                type: "POST",
                data: data,
                success: function(result){
                    if(result.status == true)
                    {
                        $.growl.notice({
                            message: result.msg
                        });
                        getBranches();
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

$(document).on('click', '#btnAttachmentUpload', function(){
    $('#modalTitle').html('Upload Avatar');
    
    var $cardBody = $('<div />');
    var $form = $('<form />', {class:'dropzone', id:'upload-form'})
    $form.append('<div class="fallback"><input name="file" type="file" multiple="multiple"></div>');
    $form.append('<div class="dz-message needsclick"><div class="mb-3"><i class="display-4 text-muted bx bx-cloud-upload"></i></div><h5>Drop files here or click to upload.</h5></div>');
    $form.append(`<input type="hidden" name="company_id" value="${companyIdData.companyId}">`);
    $form.append(`<input type="hidden" name="loginId" value="${adminSession.id}">`);
    $form.append('<input type="hidden" name="companyId" value="'+adminSession.company_id+'">');
    $form.append(`<input type="hidden" name="loginToken" value="${adminSession.token}">`);
    $form.append(`<input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">`);
    $cardBody.append($form);
    $('.modal-body').html($cardBody);
    $('#uploadAvatarModal').modal('show');
//        let Dropzone = new Dropzone('#upload-form',{autoProcessQueue: false});
    $("#upload-form").dropzone({
//            autoProcessQueue: false,
        url: `${baseUrl}/superAdmin/companies/uploadLogo`,
        method: 'post',
        init: function () {

            var myDropzone = this;

            this.on('sending', function(file, xhr, formData) {
                // Append all form inputs to the formData Dropzone will POST
                var data = $('#upload-form').serializeArray();
                $.each(data, function(key, el) {
                    formData.append(el.name, el.value);
                });
            });
            this.on('complete', function(file){
                getCompany();
                // $('#uploadAvatarModal').modal('hide');
            })
        }
    });
});
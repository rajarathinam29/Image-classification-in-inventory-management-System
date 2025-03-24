var banksData = {}; 
var bankBranchesData = [];
var url_string = location.href; //window.location.href
var url = new URL(url_string);
var bankIdData = JSON.parse(atob(url.searchParams.get("q")));
var bankbranchTbl = $('#bankbranchTbl');
var bankbranchContent = $('#bankbranchContent');
var addBankBranchForm = $('#addBankBranchForm');
var addBankBranchModal = $('#addBankBranchModal');
$(function(){
    getBank();
    getBankBranches();
});
//edit expenses
$(document).on('click', '.btnEdit', function(){
    location.assign(`${baseUrl}/superAdmin/banks/edit?q=${btoa(JSON.stringify(bankIdData))}`);
})
// get expenses
function getBank(){
    banksData = {};
    let data = adminData;
    data.bankId= bankIdData.bankId;
    $.ajax({
        url: `${baseUrl}/superAdmin/banks/getBank`,
        type: "POST",
        dataType: "json",
        data: data,
        success: function(result){
            console.log(result);
            if(result.status == true)
            {
                banksData = result.bankData;
            }
            else
            {
                showError(result.msg);
            }
            showBank();
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
function showBank(){
//    console.log(usersData);
    if(banksData){
        $('#bankCode').html(`${banksData.bank_code}`);
        $('#bankName').html(`${banksData.bank_name}`);
        $('#shortName').html(`${banksData.short_name ||''}`);
        $('#country').html(`${banksData.country}`);
        // $('#status').html(customerData.suppliers_status==1?`<span class="badge badge-gradient-success mt-2 fs-11">Active</span>`:`<span class="badge badge-gradient-warning mt-2 fs-11">Inactive</span>`);
        $.growl.notice({
            message: 'Successfully loaded.'
        });
    }
}

function getBankBranches(){
    banksData = {};
    let data = adminData;
    data.bankId = bankIdData.bankId;
    $.ajax({
        url: `${baseUrl}/superAdmin/banks/getBankBranches`,
        type: "POST",
        dataType: "json",
        data: data,
        success: (result) => {
            console.log(result);
            if (result.status == true) {
                bankBranchesData = result.bankBranchesData;
            }

            else {
                showError(result.msg);
            }
            showBankBranch();
        },
        fail: (xhr) => {
            console.log(xhr);
            showError('Something went wrong! Please check your internet connection.');
        },
        error: (xhr) => {
            console.log(xhr);
            showError('Something went wrong!.');
        }
    });
}

function showBankBranch(){
    //    console.log(usersData);
    if ( $.fn.dataTable.isDataTable( bankbranchTbl ) ) {
        bankbranchTbl.DataTable().destroy();
    }
    bankbranchContent.empty();
    if(bankBranchesData.length){
        $.each(bankBranchesData, function(k,v){
            var $tr = $('<tr />', {id:k});
            $tr.append(
                $('<td />', {html:`${k+1}`}),
                $('<td />', {html:`${v.branch_code}`}),
                $('<td />', {html:`${v.branch_name}`}),
                $('<td />').append(
                    `<button type="button" class="btn btn-sm bg-info-transparent btnBankBranchEdit"><i class="fe fe-edit-3"></i></button>
                    <button type="button" class="btn btn-sm bg-danger-transparent btnbankBranchDelete"><i class="fe fe-trash"></i></button>`
                ),
            );
            bankbranchContent.append($tr);
        });
    }
    var table = bankbranchTbl.DataTable({
        lengthChange: true,
        buttons: ['copy', 'excel', 'pdf', 'colvis'],
        language: {
          searchPlaceholder: 'Search...',
          scrollX: "100%",
          sSearch: '',
          lengthMenu: '_MENU_ '
        }
    });
    table.buttons().container().appendTo('#bankbranchTbl_wrapper .col-md-6:eq(0)');
}

//Edit BankBranch
$(document).on('click', '.btnBankBranchEdit', function(){
    bankbranchKey = $(this).parents('tr').attr('id');
    addBankBranchModal.modal('show');
    resetBankBranchForm();
    $('#bankbranch-modal-title').html('Edit BankBranch');
    $('#btnSaveBankBranch').html(`<i class="fe fe-edit-3"></i> Update`)
    var branch = bankBranchesData[bankbranchKey];
    $('#branchCode').val(branch.branch_code);
    $('#branchName').val(branch.branch_name);
    
    //save BankBranch
    $('#btnSaveBankBranch').unbind().on('click', function(){
        var btnSaveBankBranch = $('#btnSaveBankBranch');
        var prevContent = btnSaveBankBranch.html();
        btnSaveBankBranch.html('<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Updating');
        let data = adminData;
        $.each(addBankBranchForm.serializeArray(), function(k,v){
            data[v.name] = v.value; 
        })
        data.bankId = bankIdData.bankId;
        data.branchId = branch.id;
        $.ajax({
            url: `${baseUrl}/superAdmin/banks/updateBankBranch`,
            type: "POST",
            dataType: "json",
            data: data,
            success: (result) => {
                if (result.status == true) {
                    $.growl.notice({
                        message: result.msg
                    });
                    btnSaveBankBranch.html(prevContent);
                    addBankBranchModal.modal('hide');
                    getBankBranches();
                    // resetPanels();
                }

                else {
                    showError(result.msg);
                    btnSaveBankBranch.html(prevContent);
                    validateErrors(result.errors);
                }
            },
            fail: (xhr) => {
                console.log(xhr);
                showError('Something went wrong! Please check your internet connection.');
                btnSaveBankBranch.html(prevContent);
            },
            error: (xhr) => {
                console.log(xhr);
                showError(xhr.responseJSON.message);
                btnSaveBankBranch.html(prevContent);
            }
        });
    })
});


//Delete btnSaveProductLanguage
$(document).on('click', '.btnbankBranchDelete', function(){
    var k = $(this).parents('tr').attr('id');
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
            data.bankId = bankBranchesData[k].id;
            $.ajax({
                url: baseUrl+"/superAdmin/banks/deleteBankBranch",
                type: "POST",
                data: data,
                success: function(result){
                    if(result.status == true)
                    {
                        $.growl.notice({
                            message: result.msg
                        });
                        getBankBranches();
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

$(document).on('click', '#btnAddBranch', function(){
    console.log(291);
    $('.modal').modal('hide');
    addBankBranchModal.modal('show');
    resetBankBranchForm();
    // $('#alliance-modal-title').html('Add new alliance');
    // $('#btnSaveAlliance').html(`<i class="fe fe-plus"></i> Create`)
    //save Alliance
    $('#btnSaveBankBranch').unbind().on('click', function(){
        var btnSaveBankBranch = $(this);
        var prevContent = btnSaveBankBranch.html();
        btnSaveBankBranch.html('<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Creating');
        let data = adminData;
        $.each(addBankBranchForm.serializeArray(), function(k,v){
            data[v.name] = v.value; 
        })
        data.bankId = bankIdData.bankId;
        $.ajax({
            url: `${baseUrl}/superAdmin/banks/addBankBranch`,
            type: "POST",
            dataType: "json",
            data: data,
            success: (result) => {
                if (result.status == true) {
                    $.growl.notice({
                        message: result.msg
                    });
                    btnSaveBankBranch.html(prevContent);
                    addBankBranchModal.modal('hide');
                    getBankBranches();
                    // resetPanels();
                }

                else {
                    showError(result.msg);
                    btnSaveBankBranch.html(prevContent);
                    validateErrors(result.errors);
                }
            },
            fail: (xhr) => {
                console.log(xhr);
                showError('Something went wrong! Please check your internet connection.');
                btnSaveBankBranch.html(prevContent);
            },
            error: (xhr) => {
                console.log(xhr);
                showError(xhr.responseJSON.message);
                btnSaveBankBranch.html(prevContent);
            }
        });
    })
});


function resetBankBranchForm(){
    addBankBranchModal.find('input').val('');
    $('#btnSaveBankBranch').html(`<i class="fe fe-plus"></i> Create`)
}

// function getBankBranch(){
//     bankBranchesData = [];
//     let data = adminData;
//     $.ajax({
//         url: `${baseUrl}/superAdmin/banks/getBankBranch`,
//         type: "POST",
//         dataType: "json",
//         data: data,
//         success: function(result){
//             console.log(result);
//             if(result.status == true)
//             {
//                 bankBranchesData = result.bankBranchesData;
//                 $('#branch_id').empty().html(`<option value="">Select Branch</option>`);
//                 if(bankBranchesData.length){
//                     $.each(bankBranchesData, function(k,v){
//                         $('#branch_id').append(`<option value="${v.id}">${v.branch_name}</option>`);
//                     });   
//                 }
//             }
//             else
//             {
//                 showError(result.msg);
//             }
//         },
//         fail: function (xhr) {
//             console.log(xhr);
//             showError('Something went wrong! Please check your internet connection.');
//         },
//         error: function (xhr) {
//             console.log(xhr);
//             showError('Something went wrong!.');
//         }
//     });
// }


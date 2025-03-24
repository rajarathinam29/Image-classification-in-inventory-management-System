
var companiesData = [];
$(function(){
    getCompanies();
});

// View user
$(document).on('click', '.btnView', function(){
    var k = $(this).parents('tr').attr('id');
    var data = {companyId:companiesData[k].id};
    location.assign(`${baseUrl}/superAdmin/companies/view?q=${btoa(JSON.stringify(data))}`);
});
// Edit user
$(document).on('click', '.btnEdit', function(){
    var k = $(this).parents('tr').attr('id');
    var data = {companyId:companiesData[k].id};
    location.assign(`${baseUrl}/superAdmin/companies/edit?q=${btoa(JSON.stringify(data))}`);
});
// Delete user
$(document).on('click', '.btnDelete', function(){
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
            data.companyId = companiesData[k].id;
            $.ajax({
                url: baseUrl+"/superAdmin/companies/deleteCompany",
                type: "POST",
                data: data,
                success: function(result){
                    if(result.status == true)
                    {
                        $.growl.notice({
                            message: result.msg
                        });
                        getCompanies();
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

function showCompanies(){
//    console.log(companiesData);
    if ( $.fn.dataTable.isDataTable( '#companiesTbl' ) ) {
        $('#companiesTbl').DataTable().destroy();
    }
    $('#companiesContent').empty();
    if(companiesData.length){
        $.each(companiesData, function(k, v){
            var $tr = $('<tr />', {id:k});
            $tr.append(
                $('<td />', {html:`${k+1}`}),
                $('<td />', {html:`${v.name}`}),
                $('<td />', {html:`${v.email}`}),
                $('<td />', {html:(v.status?`<span class="badge badge-gradient-success mt-2 fs-11">Active</span>`:`<span class="badge badge-gradient-warning mt-2 fs-11">Inactive</span>`)}),
                // $('<td />', {html:(v.role_id==1?``:`<div class="btn-group">
                //     <a href="javascript:void(0);" class="btn btn-light btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options <i class="fa fa-angle-down"></i></a>
                //     <div class="dropdown-menu">
                //         <a class="dropdown-item" href=""><i class="fe fe-list me-2"></i> List of all companies</a>
                //         <a class="dropdown-item" href=""><i class="fe fe-plus-circle me-2"></i> Add company</a>
                //     </div>
                // </div>`)}),
                $('<td />').append(
                    `<button type="button" class="btn btn-sm bg-success-transparent btnView" ><i class="fe fe-eye"></i></button>
                    <button type="button" class="btn btn-sm bg-info-transparent btnEdit"><i class="fe fe-edit-3"></i></button>
                    <button type="button" class="btn btn-sm bg-danger-transparent btnDelete"><i class="fe fe-trash"></i></button>`
                ),
            );
            
            $('#companiesContent').append($tr);
        });
        $.growl.notice({
            message: 'Successfully loaded.'
        });
    }
    //Buttons examples
    var table = $('#companiesTbl').DataTable({
        lengthChange: true,
        buttons: ['copy', 'excel', 'pdf', 'colvis'],
        language: {
          searchPlaceholder: 'Search...',
          scrollX: "100%",
          sSearch: '',
          lengthMenu: '_MENU_ '
        }
    });
    table.buttons().container().appendTo('#companiesTbl_wrapper .col-md-6:eq(0)');
}
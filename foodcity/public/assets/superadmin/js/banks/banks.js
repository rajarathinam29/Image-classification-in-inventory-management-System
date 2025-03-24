var banksData = [];
$(function(){
    getBanks();
    // View Banks
    $(document).on('click', '.btnView', function(){
        var k = $(this).parents('tr').attr('id');
        var data = {bankId:banksData[k].id};
        location.assign(`${baseUrl}/superAdmin/banks/view?q=${btoa(JSON.stringify(data))}`);
    });
    // Edit Banks
    $(document).on('click', '.btnEdit', function(){
        var k = $(this).parents('tr').attr('id');
        var data = {bankId:banksData[k].id};
        location.assign(`${baseUrl}/superAdmin/banks/edit?q=${btoa(JSON.stringify(data))}`);
    });
    // Delete Banks
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
                data.bankId = banksData[k].id;
                $.ajax({
                    url: baseUrl+"/superAdmin/banks/deleteBank",
                    type: "POST",
                    data: data,
                    success: function(result){
                        if(result.status == true)
                        {
                            $.growl.notice({
                                message: result.msg
                            });
                            getBanks();
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
    
    
    function getBanks(){
        banksData = [];
        let data = adminData;
        $.ajax({
            url: `${baseUrl}/superAdmin/banks/getBanks`,
            type: "POST",
            dataType: "json",
            data: data,
            success: function(result){
                if(result.status == true)
                {
                    banksData = result.banksData;
                }
                else
                {
                    showError(result.msg);
                }
                showBanks();
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
    
    function showBanks(){
    //    console.log(companiesData);
        if ( $.fn.dataTable.isDataTable( '#banksTbl' ) ) {
            $('#banksTbl').DataTable().destroy();
        }
        $('#banksContent').empty();
        if(banksData.length){
            $.each(banksData, function(k, v){
                var $tr = $('<tr />', {id:k});
                $tr.append(
                    $('<td />', {html:`${k+1}`}),
                    $('<td />', {html:`${v.bank_code}`}),
                    $('<td />', {html:`${v.bank_name}`}),
                    $('<td />', {html:`${v.short_name || ''}`}),
                    $('<td />', {html:`${v.country}`}),
                    // $('<td />', {html:(v.suppliers_status?`<span class="badge badge-gradient-success mt-2 fs-11">Active</span>`:`<span class="badge badge-gradient-warning mt-2 fs-11">Inactive</span>`)}),
                    
                    $('<td />').append(
                        `<button type="button" class="btn btn-sm bg-success-transparent btnView" ><i class="fe fe-eye"></i></button>
                        <button type="button" class="btn btn-sm bg-info-transparent btnEdit"><i class="fe fe-edit-3"></i></button>
                        <button type="button" class="btn btn-sm bg-danger-transparent btnDelete"><i class="fe fe-trash"></i></button>`
                    ),
                );
                
                $('#banksContent').append($tr);
            });
            $.growl.notice({
                message: 'Successfully loaded.'
            });
        }
        //Buttons examples
        var table = $('#banksTbl').DataTable({
            lengthChange: true,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            language: {
              searchPlaceholder: 'Search...',
              scrollX: "100%",
              sSearch: '',
              lengthMenu: '_MENU_ '
            }
        });
        table.buttons().container().appendTo('#banksTbl_wrapper .col-md-6:eq(0)');
    }
});
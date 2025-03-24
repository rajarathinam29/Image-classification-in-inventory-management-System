var banksData = [];
var submitBtn = $('#btnSubmit');
var url_string = location.href; //window.location.href
var url = new URL(url_string);
var bankIdData = JSON.parse(atob(url.searchParams.get("q")));


// Form submit
$('#bankForm').on('submit', function(e){
    e.preventDefault();
    var prevContent = submitBtn.html();
    submitBtn.html('<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Updating');
    let data = adminData;
    $.each($('#bankForm').serializeArray(), function(k,v){
        data[v.name] = v.value;
    })
    $.ajax({
        url: `${baseUrl}/superAdmin/banks/updateBank`,
        type: "POST",
        dataType: "json",
        data: data,
        success: function(result){
            console.log(result);
            if(result.status == true)
            {
                $.growl.notice({
                    message: result.msg
                });
                submitBtn.html(prevContent);
                history.back();
                // location.assign(`${baseUrl}/productCategories`);
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
// get Bank
function getBank(){
    banksData = [];
    let data = adminData;
    data.bankId = bankIdData.bankId;
    $.ajax({
        url: `${baseUrl}/superAdmin/banks/getBank`,
        type: "POST",
        dataType: "json",
        data: data,
        success: (result) => {
            console.log(result);
            if (result.status == true) {
                banksData = result.bankData;
            }

            else {
                showError(result.msg);
            }
            showBank();
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
// show details
function showBank(){
//    console.log(usersData);
    if(banksData){
        $('input[name="bankCode"]').val(banksData.bank_code);
        $('input[name="bankName"]').val(banksData.bank_name);
        $('input[name="shortName"]').val(banksData.short_name);
        $('input[name="country"]').val(banksData.country);   
    }
}

$(function(){
    getBank();
});




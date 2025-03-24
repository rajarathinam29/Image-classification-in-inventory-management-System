var userData = [];
$(function(){
    $("#phone_no").intlTelInput();
    getCurrencies();
});

$('#companyForm').on('submit', function(e){
    e.preventDefault();
    var submitBtn = $('#btnSubmit');
    var prevContent = submitBtn.html();
    submitBtn.html('<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Creating');
    let data = adminData;
    $.each($('#companyForm').serializeArray(), function(k,v){
        data[v.name] = v.value;
    });
   

    $.ajax({
        url: `${baseUrl}/superAdmin/companies/addcompany`,
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
                location.assign(`${baseUrl}/superAdmin/companies`);
                // resetPanels();
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
});
function getCurrencies(){
    let data=adminData
    $.ajax({
        url: `${baseUrl}/superAdmin/currencies/getCurrencies`,
        type: "POST",
        dataType: "json",
        data: data,
        success: function(result){
            
            $('#currency').empty();
            if(result.status == true)
            {
              var currencyData = result.currencyData;
              $.each(currencyData,function(k,v){
                    $('#currency').append(`<option value="${v.id}">${v.country} - ${v.currency} - ${v.symbol}</option>`)
              });
            }
            else
            {
                showError(result.msg); 
                
            }
        },
        fail: function (xhr, textStatus, errorThrown) {
            console.log(xhr);
            showError('Something went wrong! Please check your internet connection.');
            
        },
        error: function (xhr, textStatus) {
            console.log(xhr);
            showError(xhr.responseJSON.message);
            
        }
    });
}
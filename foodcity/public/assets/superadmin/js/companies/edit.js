var companyData = [];
var url_string = location.href; //window.location.href
var url = new URL(url_string);
var companyIdData = JSON.parse(atob(url.searchParams.get("q")));
var masks = ["+00 00 000 00000","+00 0 00 0000 0000"]
var maskOptions = {
    placeholder: "+00 00 000 0000",
    onKeyPress: function(cep, e, field, options) {
      // Use an optional digit (9) at the end to trigger the change
        masks,
        digits = cep.replace(/[^0-9]/g, "").length,
        // When you receive a value for the optional parameter, then you need to swap
        // to the new format
        mask = digits <= 11 ? masks[0] : masks[1];

      $("#phone_no").mask(mask, options);
    }
};
$(function(){
    getCurrencies();
    
    $('#btnSubmit').on('click', function(e){
        e.preventDefault();
        var submitBtn = $(this);
        var prevContent = submitBtn.html();
        submitBtn.html('<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Updating');
        let data = adminData;
        $.each($('#companyForm').serializeArray(), function(k,v){
            data[v.name] = v.value;
        });
        // var phone_no = data.phone_no;
        // data.phone_no = phone_no.replace(/\D/g, "");
        // console.log(data);

        $.ajax({
            url: `${baseUrl}/superAdmin/companies/updateCompany`,
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
})
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
              getCompany();
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
        $('input[name="company_name"]').val(companyData.name);
        $('input[name="registered_no"]').val(companyData.registerd_no);
        $('input[name="start_date"]').val(companyData.start_date);
        $('input[name="proprietor_name"]').val(companyData.proprietor_name); 
        $('input[name="phone_no"]').val(companyData.phone_no);
        $('input[name="email"]').val(companyData.email);
        $('select[name="status"]').val(companyData.status).trigger('change');
        $('input[name="user_limit"]').val(companyData.user_limit);
        
        $('input[name="building_no"]').val(companyData.building_no);
        $('input[name="street"]').val(companyData.street);
        $('input[name="city"]').val(companyData.state);
        $('input[name="state"]').val(companyData.city);
        $('select[name="country"]').val(companyData.country).trigger('change');
        $('input[name="zipcode"]').val(companyData.zipcode);

        $('select[name="starting_month"]').val(companyData.starting_month).trigger('change');
        $('select[name="currency"]').val(companyData.currency_id).trigger('change');
        $('select[name="currency_placement"]').val(companyData.currency_placement).trigger('change'); 
        $('select[name="date_format"]').val(companyData.date_format).trigger('change'); 
        var digits = companyData.phone_no.replace(/[^0-9]/g, "").length;
        mask = digits <= 11 ? masks[0] : masks[1];
        $("#phone_no").intlTelInput();
    }
}

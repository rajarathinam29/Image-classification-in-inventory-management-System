var userData = [];
var url_string = location.href; //window.location.href
var url = new URL(url_string);
var companyIdData = JSON.parse(atob(url.searchParams.get("q")));
var submitBtn = $('#btnSubmit');
$(function(){
    var maskOptions = {
        placeholder: "+00 00 000 0000",
        onKeyPress: function(cep, e, field, options) {
          // Use an optional digit (9) at the end to trigger the change
          var masks = ["+00 00 000 00000","+00 0 00 0000 0000"],
            digits = cep.replace(/[^0-9]/g, "").length,
            // When you receive a value for the optional parameter, then you need to swap
            // to the new format
            mask = digits <= 11 ? masks[0] : masks[1];
    
          $("#phone_no").mask(mask, options);
        }
      };
    
    // $("#phone_no").mask("+00 00 000 00000", maskOptions);
    $("#phone_no").intlTelInput();
});

$('#branchForm').on('submit', function(e){
    e.preventDefault();
    var prevContent = submitBtn.html();
    submitBtn.html('<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Creating');
    let data = adminData;
    data.company_id = companyIdData.companyId;
    $.each($('#branchForm').serializeArray(), function(k,v){
        data[v.name] = v.value;
    });
    // var phone_no = data.phone_no;
    // data.phone_no = phone_no.replace(/\D/g, "");
    console.log(data);
    $.ajax({
        url: `${baseUrl}/superAdmin/branches/addBranch`,
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
                history.back();
                // location.assign(`${baseUrl}/companies/view?q=${btoa(JSON.stringify({companyId:companyIdData.companyId}))}`);
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
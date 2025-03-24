var branchData = [];
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
    getBranch();
    
    $('#btnSubmit').on('click', function(e){
        e.preventDefault();
        var submitBtn = $(this);
        var prevContent = submitBtn.html();
        submitBtn.html('<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Updating');
        let data = adminData;
        data.company_id = companyIdData.companyId;
        $.each($('#branchForm').serializeArray(), function(k,v){
            data[v.name] = v.value;
        })
        // var phone_no = data.phone_no;
        // data.phone_no = phone_no.replace(/\D/g, "");
        // console.log(data);

        $.ajax({
            url: `${baseUrl}/superAdmin/branches/updateBranch`,
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
                    // location.assign(`${baseUrl}/companies`);
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
    function getBranch(){
        companyData = [];
        let data = adminData;
        data.branchId = companyIdData.branchId;
        $.ajax({
            url: `${baseUrl}/superAdmin/branches/getBranch`,
            type: "POST",
            dataType: "json",
            data: data,
            success: function(result){
                if(result.status == true)
                {
                    branchData = result.branchData;
                }
                else
                {
                    showError(result.msg);
                }
                showBranch();
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
    function showBranch(){
    //    console.log(usersData);
        if(branchData){
            $('input[name="branch_name"]').val(branchData.branch_name);
            $('input[name="phone_no"]').val(branchData.phone_no);
            $('input[name="email"]').val(branchData.email);
            $('select[name="status"]').val(branchData.status).trigger('change');
            $('textarea[name="description"]').val(branchData.description);
            
            $('input[name="building_no"]').val(branchData.building_no);
            $('input[name="street"]').val(branchData.street);
            $('input[name="city"]').val(branchData.state);
            $('input[name="state"]').val(branchData.city);
            $('select[name="country"]').val(branchData.country).trigger('change');
            $('input[name="zipcode"]').val(branchData.zipcode);
            var digits = branchData.phone_no.replace(/[^0-9]/g, "").length;
            mask = digits <= 11 ? masks[0] : masks[1];
            // $("#phone_no").mask(mask, maskOptions);
            $("#phone_no").intlTelInput();
        }
    }
})
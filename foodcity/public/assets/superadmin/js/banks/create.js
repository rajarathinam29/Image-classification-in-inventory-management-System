var banksData = [];
var submitBtn = $('#btnSubmit');

$('#bankForm').on('submit', function(e){
    e.preventDefault();
   var prevContent = submitBtn.html();
   submitBtn.html('<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Creating');
   let data = adminData;
   $.each($('#bankForm').serializeArray(), function(k,v){
       data[v.name] = v.value; 
   })
    

   $.ajax({
       url: `${baseUrl}/superAdmin/banks/addBank`,
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



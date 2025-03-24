/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
const adminSession = localStorage.getItem('OwnMakeShoppingSuperAdmin')?JSON.parse(atob(localStorage.getItem('OwnMakeShoppingSuperAdmin'))):false;
var permission = {};
let  adminData = {};
var notifications = [];
// console.log(adminSession);
//console.log(permission); && (baseUrl+'/login' != location.href)
if(!adminSession){
    logOut();
}else{
    adminData = { loginId : adminSession.id, loginToken : adminSession.token, _token : $('meta[name="csrf-token"]').attr('content')}
    $('#setting_user_name').html(`${adminSession.f_name} ${adminSession.l_name}`);
    // $('#settingUserRole').html(`${adminSession.role_name}`);
    // adminSession.img?$('#userImg').attr('src', `${baseUrl}/uploads/profiles/${adminSession.img}`):'';
    // permission = JSON.parse(adminSession.permissions)||{};
    // adminSession.clients !== 1 ? $('.btn_swichCompany').remove():'';
    // $(document).on('click', '.btn_swichCompany', function(){
    //     location.assign(`${baseUrl}/selectCompany?id=${adminSession.id}`);
    // });
    // $(document).on('click', '.btn_lockscreen', function(){
    //     lockScreen();
    // });
    $(document).on('click', '.btnLogout', function(){
        logOut();
    });
    // go back 
    $(document).on('click', '.btnBack', function(){
        history.back();
    });
    // $(function(){
    //     var url_string = location.href;
    //     if(adminSession.clients == 1){
    //         $('.navbar-users').show();
    //         $('.navbar-admin').remove();
    //         getUnreadNotification();
    //         setInterval(getUnreadNotification, 60*1000);
    //     }else{
    //         $('.navbar-admin').show();
    //         $('.navbar-users').remove();
    //     }
    //     setPermission();
    //     $('a[href="'+url_string+'"]').addClass('active');
        if(adminSession.role_id>1){
            $("body").on("contextmenu",function(e){
                return false;
            });
            $(document).on('keydown', function(e){
                if(e.keyCode == 123) {
                    return false;
                }
                if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                    return false;
                }
                if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                    return false;
                }
                if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                    return false;
                }
                if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                    return false;
                }
            });
        }
    // });
}

function setPermission(){
    // console.log(permission);
    if(permission){
        $.each(permission, function(key, val){
            var ul = $('ul.navbar-nav');
            var li = ul.find('.li'+key).length;
//            console.log(li);
            li > 0 && val == 1?$('.li'+key).show():$('.li'+key).remove();
        });
    }else{
        logOut();
    }
}

function validateErrors(errors){
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    $.each(errors, function(k,v){
        $('#'+k).addClass('is-invalid');
        $('#'+k).parent().append(`<div  class="invalid-feedback">${v}</div>`)
        // $.growl.error({
        //     message: v
        // });
    });
}

function showError(error){
    switch(error){
        case 'Session Expired':
            lockScreen();
            break;
        case 'No Session':
            logOut();
            break;
        case 'Access denied.':
            logOut();
            // location.assign(`${baseUrl}/unauthorizedAccess`);
            break;
        case 'Username or password is wrong.':
            response = result;
            break;
        case 'No Internet connection':
            $.growl.error({
                message: 'Something went wrong! Please check your internet connection.'
            });
        default:
            $.growl.error({
                message: error
            });
    }
}

function logOut(){
   console.log('logout');
    localStorage.removeItem('OwnMakeShoppingSuperAdmin');
    location.assign(`${baseUrl}/superAdmin/login`);
}

function lockScreen(){
   location.assign(baseUrl+'/OwnMakeShoppingSuperAdmin/lockscreen?redirect='+location.href);
} 

// function getUnreadNotification(){
//     let data = adminData;
//     notifications = [];
//     $.ajax({
//         url: `${baseUrl}/notifications/getUnread`,
//         type: "POST",
//         dataType: "json",
//         data: data,
//         success: function(result){
//             // console.log(result);
//             if(result.status){
//                 notifications = result.notificationsData;
//                 $('#notificationCount').html(notifications.length);
//             }
//             showNotifications();
//         },
//         fail: function (xhr) {
//             console.log(xhr);
//             showError('Something went wrong! Please check your internet connection.');
//         },
//         error: function (xhr) {
//             console.log(xhr);
//             showError('Something went wrong!');
//         }
//     });
// }

// function showNotifications(){
//     $('#notifyContent').empty();
//     if(notifications.length){
//         $('#notificationCount').html(notifications.length);
//         $.each(notifications, function(k,v){
//             var date = new Date(v.created_at);
//             date = `${date.getFullYear()}-${(date.getMonth()+1)}-${date.getDate()} ${date.getHours()} : ${date.getMinutes()}`;
//             $('#notifyContent').append(`<a href="javascript:void(0)" class="text-reset notification-item" id="${v.id}">
//                     <div class="d-flex">
//                         <div class="flex-grow-1">
//                             <h6 class="mb-1">${v.data.title} </h6>
//                             <div class="font-size-13 text-muted">
//                                 <p class="mb-1">${v.data.message}</p>
//                                 <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>${date} </span></p>
//                             </div>
//                         </div>
//                     </div>
//                 </a>`);
//         })
//     }else{
//         $('#notificationCount').html('');
//     }
// }

// $(document).on('click', '.notification-item', function(){
//     var notificationId = $(this).attr('id');
//     var notification = notifications.find(notification => notification.id === notificationId);
//     let data = adminData;
//     data.notificationId = notificationId;
//     $.ajax({
//         url: `${baseUrl}/notifications/markAsRead`,
//         type: "POST",
//         dataType: "json",
//         data: data,
//         success: function(result){
//             // console.log(result);
//             if(result.status){
//                 location.assign(notification.data.url);
//             }
//         },
//         fail: function (xhr) {
//             console.log(xhr);
//             showError('Something went wrong! Please check your internet connection.');
//         },
//         error: function (xhr) {
//             console.log(xhr);
//             showError('Something went wrong!');
//         }
//     });
// })

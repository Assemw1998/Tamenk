$(document).ready(function () {
    var token = $('meta[name="csrf-token"]').attr('content');
    var table=$('#admins_table').DataTable({
        responsive: true ,
        sScrollX: '100%',
        sScrollXInner: "100%",  
    });

    $(document).on("click", ".show", function (e) {
        $("#password").attr("type","password");
        $(this).children().removeClass("fa-eye");
        $(this).children().addClass("fa-eye-slash");
        $(this).removeClass("show");
        $(this).addClass("hide");
    });
    
    $(document).on("click", ".hide", function (e) {
        $("#password").attr("type","text");
        $(this).children().removeClass("fa-eye-slash");
        $(this).children().addClass("fa-eye");
        $(this).removeClass("hide");
        $(this).addClass("show");
    });
    $(document).on("click", ".generate-password", function (e) {
        let password=generatePassword();
        $("#password").val(password);
    });


    //delete
    $(document).on("click", ".delete", function (e) {

        e.preventDefault();
        var model_id = $(this).attr('data-id');
        $.confirm({
            title: 'Admin delete',
            content: 'Are you sure that you wnat to delete this admin?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                Yes: {
                    text: 'Yes',
                    btnClass: 'btn-red',
                    action: function () {
                        $.ajax({
                            type: 'POST',
                            url: '/super-admin/dashboard/admin-delete',
                            data: {
                                _token: token,
                                id: model_id,
                            },
                            success: function (data) {
                                if (data == true) {
                                    $.confirm({
                                        title: 'Deleted',
                                        content: 'Admin has been deleted successfully',
                                        type: 'green',
                                        typeAnimated: true,
                                        buttons: {
                                            tryAgain: {
                                                text: 'Okay',
                                                btnClass: 'btn-green',
                                                action: function () {
                                                    window.location.replace('/super-admin/dashboard/admin-index');
                                                }
                                            },
                                        }
                                    });
                                }

                            },
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            $.confirm({
                                title: 'Technical Error',
                                content: 'Somthing went wrong please try again later.',
                                type: 'red',
                                typeAnimated: true,
                                buttons: {
                                    tryAgain: {
                                        text: 'Okay',
                                        btnClass: 'btn-red',
                                        action: function () {
                                            location.reload();
                                        }
                                    },
                                }
                            });
                        });
                    }
                },
                Cancel: {
                    text: 'Cancel',
                    btnClass: 'btn-green',
                    action: function () {

                    }
                },
            }
        });
    });


     //activate deactivate
     $(document).on("click", ".activate-deactivate", function (e) {

        e.preventDefault();
        var model_id = $(this).attr('data-id');
        $.ajax({
            type: 'POST',
            url: '/super-admin/dashboard/admin-activate-deactivate',
            data: {
                _token: token,
                id: model_id,
            },
            success: function (data) {
                if (data == true) {
                    location.reload();
                }

            },
        }).fail(function (jqXHR, textStatus, errorThrown) {
            $.confirm({
                title: 'Technical Error',
                content: 'Somthing went wrong please try again later.',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Okay',
                        btnClass: 'btn-red',
                        action: function () {
                            location.reload();
                        }
                    },
                }
            });
        });
    });

});
const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

function generatePassword(length=10) {
    let result = ' ';
    const charactersLength = characters.length;
    for ( let i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result;
}
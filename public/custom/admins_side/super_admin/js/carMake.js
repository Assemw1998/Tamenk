$(document).ready(function () {
    var token = $('meta[name="csrf-token"]').attr('content');
    var table = $('#car_make_table').DataTable({
        responsive: true,
        sScrollX: '100%',
        sScrollXInner: "100%",
    });

    //delete
    $(document).on("click", ".delete", function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.confirm({
            title: 'Car make delete',
            content: 'Are you sure that you wnat to delete this care make?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                Yes: {
                    text: 'Yes',
                    btnClass: 'btn-red',
                    action: function () {
                        $.ajax({
                            type: 'POST',
                            url: '/super-admin/dashboard/car-make-delete',
                            data: {
                                _token: token,
                                id: id,
                            },
                            success: function (data) {
                                if (data == true) {
                                    $.confirm({
                                        title: 'Deleted',
                                        content: 'Car make has been deleted successfully',
                                        type: 'green',
                                        typeAnimated: true,
                                        buttons: {
                                            tryAgain: {
                                                text: 'Okay',
                                                btnClass: 'btn-green',
                                                action: function () {
                                                    window.location.replace('/super-admin/dashboard/car-make-index');
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

});

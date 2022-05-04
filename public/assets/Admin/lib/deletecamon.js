function deleteCommon(id) {
    Swal.fire({
        title: 'Bạn có chắc chắn xoá không?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng Ý',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            callDelete(id)
        }
    });
}


function callDelete(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val(),
        },
    });
    $.ajax({
        url: document.URL + "/" + id,
        method: 'DELETE',
        async: false,
        dataType: 'json',
        success: function(data) {
            if (data.error_Code == 0) {
                $("#row" + id).css({ display: "none" });
                Message(data.message, data.icon);
            } else {
                Message(data.message, data.icon);
                window.setTimeout(function() { location.reload() }, 3000)
            }
        }
    });
}

function Message(title, icon) {
    swal.fire({
        title: title,
        icon: icon
    });
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("body").on("click", ".delete-btn-custom", function(e) {
    e.preventDefault();
    let id = $(this).attr("delete-id");
    let route = $(this).attr("delete-route");

    swal.fire({
            title: "bạn muốn xóa dữ liệu ?",
            text: "Dữ liệu của bạn sẽ mất và không tìm lại được,",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Chắc chắn!',
            cancelButtonText: 'Hủy!',
        })
        .then((result) => {
            if (result.isConfirmed) {
                let url = 'quantri/' + route + '/' + id

                let data = {
                    "_token": $('input[name=_token]').val(),
                    "id": id
                }

                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: data,
                    success: function(response) {
                        swal.fire({
                            icon: 'success',
                            title: response.titleMess,
                            text: response.textMess,
                            confirmButtonText: 'Đóng',
                        }).then((result) => {
                            location.reload();
                        });
                    },
                    error: function() {
                        swal.fire({
                            icon: 'error',
                            title: 'Đã xảy ra lỗi',
                            text: 'Lỗi khi gửi request delete',
                            confirmButtonText: 'Thử lại',
                        });
                    }
                });
            }
        });
});
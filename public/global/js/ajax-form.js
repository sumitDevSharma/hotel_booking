

function deleteData(url) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this data!',
        icon: 'warning',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#c82333',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success == true) {
                        Swal.fire({
                            title: "Deleted!",
                            text: response.payload.message,
                            icon: "success",
                            showCloseButton: true,
                        }).then(function () {
                            window.location.href = response.payload.redirect;
                        });
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: response.payload,
                            icon: "error",
                            showCloseButton: true,
                        }).then(function () {
                            location.reload();
                        });
                    }
                }
            });
        }
    })
}


function showPermissions(id, url, method) {
    $.ajax({
        url: url + '/' + id.value,
        method: method,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        beforeSend: function () {
            $('#permissionsList').html('<div class="text-danger text-center loader"><i class="fas fa-1x fa-sync-alt fa-spin mr-1"></i>Loading...</div>');
        },
        success: function (response) {
            if (response.success === true) {
                $('#permissionsList').html(response.payload);

            } else {
                $('#permissionsList').html('<div class="alert alert-danger no-border mb-2" role="alert">' + response.payload + '</div>');
            }
        }
    });
}


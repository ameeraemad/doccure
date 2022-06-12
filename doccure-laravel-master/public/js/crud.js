
function store(url, data) {
    axios.post(url, data)
        .then(function (response) {
            console.log(response.data.message);
            if (document.getElementById('create_form') != undefined)
                document.getElementById('create_form').reset();
            showToaster(response.data.message, true);
        })
        .catch(function (error) {
            console.log(error.response);
            showToaster(error.response.data.message, false);
        });
}

function update(url, data, redirectUrl) {
    axios.put(url, data)
        .then(function (response) {
            console.log(response);
            if (redirectUrl != '')
                window.location.href = redirectUrl;
        })
        .catch(function (error) {
            console.log(error.response);
            showToaster(error.response.data.message, false);
        });
}

function confirmDestroy(url, td) {
    Swal.fire({
        title: 'هل أنت متأكد',
        text: "سيتم حذف العنصر بشكل نهائي",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم',
        cancelButtonText: 'لا'
    }).then((result) => {
        if (result.isConfirmed) {
            destroy(url, td);
        }
    });
}

function destroy(url, td) {
    axios.delete(url)
        .then(function (response) {
            // handle success
            console.log(response.data);
            td.closest('tr').remove();
            showAlert(response.data);
        })
        .catch(function (error) {
            // handle error
            console.log(error.response);
            showAlert(error.response.data);
        })
        .then(function () {
            // always executed
        });
}

function showToaster(message, status) {
    console.log("Status: " + status);
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-left",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    if (status) {
        toastr.success(message);
    } else {
        toastr.error(message);
    }
}

function showAlert(data) {
    Swal.fire({
        title: data.title,
        text: data.message,
        icon: data.icon,
        timer: 2000,
        showConfirmButton: false,
        timerProgressBar: false,
        willOpen: () => {
            // Swal.showLoading()
        },
        willClose: () => {

        }
    }).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
        }
    });
}

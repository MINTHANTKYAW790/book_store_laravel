function confirmDelete(Id, name) {
    Swal.fire({
        title: "Delete?",
        text: 'Are you sure to delete "' + name + '" ?',
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-form-" + Id).submit();
        }
    });
}

function confirmRestore(Id, name) {
    Swal.fire({
        title: "Restore?",
        text: 'Are you sure to Restore "' + name + '" ?',
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, restore it!",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("restore-form-" + Id).submit();
        }
    });
}

function togglePassword1() {
    var passwordField = document.getElementById("password-confirm");
    var toggleIcon = document.getElementById("toggleIcon1");
    if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.classList.remove("fa-eye");
        toggleIcon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        toggleIcon.classList.remove("fa-eye-slash");
        toggleIcon.classList.add("fa-eye");
    }
}

function togglePassword() {
    var passwordField = document.getElementById("password");
    var toggleIcon = document.getElementById("toggleIcon");
    if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.classList.remove("fa-eye");
        toggleIcon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        toggleIcon.classList.remove("fa-eye-slash");
        toggleIcon.classList.add("fa-eye");
    }
}

function fungsiTampilkanPassword() {
    var inputPassword = document.getElementById("password");
    var gambarTombol = document.getElementById("toggleIcon");

    if (inputPassword.type === "password") {
        inputPassword.type = "text";
        // teksTombol.innerText = "Sembunyikan";
        gambarTombol.src = "/aset/images/lihat.png";
    } else {
        inputPassword.type = "password";
        //teksTombol.innerText = "Lihat";
        gambarTombol.src = "/aset/images/tutup.png";
    }
}

function TampilkanPassword() {
    var inputPassword = document.getElementById("password");
    var teksTombol = document.getElementById("toggleText");
    if (inputPassword.type === "password") {
        inputPassword.type = "text";
        teksTombol.innerText = "Tutup";
    } else {
        inputPassword.type = "password";
        teksTombol.innerText = "Lihat";
    }
}

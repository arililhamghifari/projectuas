document.getElementById("formDaftar").addEventListener("submit", function (e) {
    let nama   = document.getElementById("nama").value.trim();
    let email  = document.getElementById("email").value.trim();
    let no_hp  = document.getElementById("no_hp").value.trim();
    let event  = document.getElementById("event").value;
    let alasan = document.getElementById("alasan").value.trim();

    // Validasi kosong
    if (nama === "" || email === "" || no_hp === "" || event === "") {
        alert("Field wajib tidak boleh kosong!");
        e.preventDefault();
        return;
    }

    // Validasi email
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Format email tidak valid!");
        e.preventDefault();
        return;
    }

    // Validasi nomor HP (angka saja)
    if (!/^[0-9]+$/.test(no_hp)) {
        alert("Nomor HP hanya boleh angka!");
        e.preventDefault();
        return;
    }

    // Panjang minimal alasan
    if (alasan.length < 5) {
        alert("Alasan minimal 5 karakter!");
        e.preventDefault();
    }
});

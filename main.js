function kiemTra() {
    var matKhau = document.frDangKy.matKhau.value;
    var nhapLaiMatKhau = document.frDangKy.nhapLaiMatKhau.value;
    var dieuKhoang = document.frDangKy.dieuKhoang;
    if (matKhau != nhapLaiMatKhau) {
        alert('Nhập lại mật khẩu không đúng');
        document.frDangKy.nhapLaiMatKhau.focus();
        return false;
    }
    if (dieuKhoang.checked == false) {
        alert("Vui lòng đồng ý với điều khoảng của chúng tôi");
        return false;
    }
}
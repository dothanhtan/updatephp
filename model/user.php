<?php 
class User {
    var $userName;
    var $passWord;
    var $fullName;

    function User($userName, $passWord, $fullName) {
        $this->userName = $userName;
        $this->passWord = $passWord;
        $this->fullName = $fullName;
    }

    /**
     * Xac thuc nguoi su dung
     * @param $userName string Ten dang nhap
     * @param $passWord string Mat khau
     * @return User hoac null 
     */
    static function authentication($userName, $passWord) {
        if($userName == "thanhtan280198@gmail.com" && $passWord == "1234") {
            return new User($userName, $passWord, "Đỗ Thanh Tân");
        }
        else {
            return null;
        }
    }
}
?>
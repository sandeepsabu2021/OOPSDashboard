<?php
class Project
{
    private $conn;
    public $msg;

    function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "myproject");
    }

    function register($name, $username, $age, $gen, $mail, $pass, $mob, $city, $tmp, $ext)
    {
       $img_path =  "uploads/" . $mail . time() . "." . $ext;
        $password = substr(sha1($pass), 0, 12);
        if(mysqli_query($this->conn, "insert into users(username, email, name, age, gender, city, mobile, img_path, password) values ('$username','$mail','$name','$age','$gen','$city','$mob','$img_path','$password')")){
            move_uploaded_file($tmp, $img_path);
            $output = "User added";
            return $output;
        }
        else{
            $output =  "User already exists";
            return $output;
        }
    }

    function login($userinput, $pass)
    {

        $password = substr(sha1($pass), 0, 12);
        $sel = mysqli_query($this->conn, "select * from users where (email = '$userinput') OR (username = '$userinput');");
        $arr = mysqli_fetch_assoc($sel);
        $checkpass = $arr['password'];
        if ($checkpass == $password) {
            session_start();
            $_SESSION['user'] = $arr;
            $userinput_error = "Login successfull";
            return $userinput_error;
        } else {
            $userinput_error = "Incorrect data entered";
            return $userinput_error;
        }
    }

    function changepass($npass,$mail){
        // echo "<script>console.log('$npass')</script>";
        // echo "<script>console.log('$mail')</script>";
        $npassword = substr(sha1($npass), 0, 12);
        if (mysqli_query($this->conn, "update users set password = '$npassword' where email = '$mail'")) {
            $output = "Password changed successfully!!!";
            return $output;
        } else {
            $output =  "Updating Error";
            return $output;
        }
    }

    function __destruct()
    {
        mysqli_close($this->conn);
    }
}

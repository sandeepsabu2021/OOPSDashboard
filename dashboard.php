<?php
session_start();
$arr = $_SESSION['user'];
if(empty($arr)){
    header("location:index.php");
}
$name = $arr['name'];
$username = $arr['username'];
$mail = $arr['email'];
$city = $arr['city'];
$gen = $arr['gender'];
$mob = $arr['mobile'];
$age = $arr['age'];
$pic = $arr['img_path'];
$pass = $arr['password'];
?>
<!DOCTYPE html>
<html>

<head>
    <?php include "head.php"; ?>
    <title>Dashboard</title>
    <style>
        .error{
            color: red;
        }
    </style>

</head>

<body>
    <?php include "nav.php"; ?>
    <div class="row">
        <aside class="col-sm-3">
            <?php include "sidebar.php"; ?>
        </aside>
        <aside class="col-sm-9 py-4">
            <?php
            switch (@$_GET['page']) {

                case 'home':
                    include("home.php");
                    break;

                case 'changepass':
                    include("changepass.php");
                    break;

                case 'changepic':
                    include("changepic.php");
                    break;

                case 'editprofile':
                    include("editprofile.php");
                    break;

                default:
                    include("home.php");
                    break;
            }
            ?>
        </aside>
    </div>

    <?php include "foot.php"; ?>
</body>

</html>

<?php
include("class.php");


function inputfields($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$name_error = $age_error = $gen_error =  $mob_error = $city_error = $output = '';

if (isset($_POST['update'])) {
    $name = inputfields($_POST['name']);
    $age = inputfields($_POST['age']);
    $gen = @$_POST['gen'];
    $mob = inputfields($_POST['mob']);
    $city = @$_POST['city'];

    if (empty($name)) {
        $name_error = "Please enter name";
    } else {
        if (!preg_match("/^[a-zA-Z ]{2,100}$/", $name)) {
            $name_error = "Enter valid format";
        }
    }

    if (empty($gen)) {
        $gen_error = "Please select gender";
    }

    if (empty($age)) {
        $age_error = "Please enter age";
    } else {
        if (!($age >= 1 && $age <= 100)) {
            $age_error = "Enter valid age";
        }
    }


    if (empty($city)) {
        $city_error = "Please select city";
    }


    if (empty($mob)) {
        $mob_error = "Please enter mobile number";
    } else {
        if (!preg_match("/^[6-9][0-9]{9}+$/", $mob)) {
            $mob_error = "Only 10 digit  allow";
        }
    }


    if ($name_error == "" && $age_error == "" && $gen_error == "" &&  $city_error == "" && $mob_error == "") {
        if (mysqli_query($conn, "update users set name = '$name', age = '$age', city = '$city', gender = '$gen', mobile = '$mob' where email = '$mail'")) {
            $output = "Details Updated";
        } else {
            $output =  "Updating Error";
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <?php include "head.php"; ?>
    <title>Edit User</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h4>Edit Profile Details</h4>
    <hr />
    <div class="container">
        <form method="POST">
            <h5 class="my-2" style="color: green;"><?php echo "$output"; ?></h5>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $name ?>" name="name" placeholder="Name">
                    <span class="error"><?php echo "$name_error"; ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="age" class="col-sm-2 col-form-label">Age:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" value="<?php echo $age ?>" id="age" name="age" placeholder="Age">
                    <span class="error"><?php echo "$age_error"; ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="gen" class="col-sm-2 col-form-label">Gender:</label>
                <div class="col-sm-10">
                    <input type="radio" name="gen" value="Male" <?php if ($gen == 'Male') {
                                                                    echo "checked";
                                                                } ?>>&nbsp;Male&nbsp;
                    <input type="radio" name="gen" value="Female" <?php if ($gen == 'Female') {
                                                                        echo "checked";
                                                                    } ?>>&nbsp;Female&nbsp;
                    <input type="radio" name="gen" value="Other" <?php if ($gen == 'Other') {
                                                                        echo "checked";
                                                                    } ?>>&nbsp;Other&nbsp;
                    <span class="error"><?php echo "$gen_error"; ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">City:</label>
                <div class="col-sm-10">
                    <select name="city" class="form-control">
                        <option value="" <?php if ($city == '') {
                                                echo "selected";
                                            } ?>>Select an Option</option>
                        <option value="mumbai" <?php if ($city == 'mumbai') {
                                                    echo "selected";
                                                } ?>>Mumbai</option>
                        <option value="delhi" <?php if ($city == 'delhi') {
                                                    echo "selected";
                                                } ?>>Delhi</option>
                        <option value="chennai" <?php if ($city == 'chennai') {
                                                    echo "selected";
                                                } ?>>Chennai</option>
                        <option value="pune" <?php if ($city == 'pune') {
                                                    echo "selected";
                                                } ?>>Pune</option>
                    </select>
                    <span class="error"><?php echo "$city_error" ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mobile:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $mob ?>" name="mob" placeholder="Mobile">
                    <span class="error"><?php echo "$mob_error"; ?></span>
                </div>
            </div>
            <input type="submit" class="btn btn-primary btn-large" name="update" value="Update Details"><br/>
            <?php
                if($output == "Details Updated"){
                    ?>
                    <h6>Login again to view updated details</h6>
                    <?php
                }
            ?>
        </form>
    </div>

    <?php include "foot.php"; ?>
</body>

</html>
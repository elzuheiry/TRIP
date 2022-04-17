<?php

// START CODING OF NEW PASSWORD PAGE
$newPassword = "";
$confirmNewPassword = "";
$errorNewPassword = [""=>"",""=>"",""=>""];

if(isset($_POST[""])){
    $newPassword = mysqli_real_escape_string($conn, $_POST[""]);
    $confirmNewPassword = mysqli_real_escape_string($conn, $_POST[""]);

    if(empty($newPassword)){
        $errorNewPassword[""] = "<i class='fas fa-exclamation-circle'></i> The text field is required.";
    }elseif(strlen($newPassword) <= 8){
        $errorNewPassword[""] = "<i class='fas fa-exclamation-circle'></i> The password must be greater than 8 characters.";
    }

    if(empty($confirmNewPassword)){
        $errorNewPassword[""] = "<i class='fas fa-exclamation-circle'></i> The text field is required.";
    }elseif(checkPassword($newPassword, $confirmNewPassword) !== false){
        $errorNewPassword[""] = "<i class='fas fa-exclamation-circle'></i> The password doesn't match!";
    }

    if(!array_filter($errorNewPassword)){

        $hashedNewPwd = password_hash($newPassword, PASSWORD_DEFAULT);
        $sqlPassword = "UPDATE users SET userPassword = '$hashedNewPwd' WHERE userId = {$_SESSION["userid"]} LIMIT 1";
        $resultPassword = mysqli_query($conn, $sqlPassword);

        if($resultPassword){
            $errorNewPassword["errorMessageNewPwd"] = "Your password has been updated!";

            $newPassword = "";
            $confirmNewPassword = "";
            
        }else{
            header("Location:".BURLU."settings?error=stmtWORNG");
            exit();
        }
    }
}
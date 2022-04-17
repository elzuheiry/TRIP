<?php

$textPasswordRecovery = "";
$errorForgetPwd = ["textPasswordRecovery"=>"","errorMessage"=>""];

if(isset($_POST["btnPwdRecovery"])){
   
    $textPasswordRecovery = mysqli_real_escape_string($conn, $_POST["textPasswordRecovery"]);

    if(empty($textPasswordRecovery)){
        $errorForgetPwd["textPasswordRecovery"] = "<i class='fas fa-exclamation-circle'></i>We need this information to find your account.";
    }

    if(!array_filter($errorForgetPwd)){
        $uemailExists = checkUsernameAndEmail($conn, $textPasswordRecovery);

        if($uemailExists === false){
            $errorForgetPwd["errorMessage"] = "The username or email you entered doesn't belong to an account. Please check your username or email and try again!";
        }else{
            $_SESSION["verifyuserid"] = $uemailExists["userId"];
            $_SESSION["verifyusername"] = $uemailExists["userName"];
            $_SESSION["verifyuseremail"] = $uemailExists["userEmail"];

            header("location: " . BURLU . "send-verify-code");
            exit();
        }
    }    
}

// START CODING OF PAGE RESET PASSWORD 
$newPwd = "";
$confirmNewPwd = "";
$newPwdErrorMessage = ["newPwdEroor"=>"","cofirmNewPwdError"=>""];

if(isset($_POST["submitNewPwd"])){
    $newPwd = mysqli_real_escape_string($conn, $_POST["new-password"]);
    $confirmNewPwd = mysqli_real_escape_string($conn, $_POST["confirm-new-password"]);

    if(empty($newPwd)){
        $newPwdErrorMessage["newPwdEroor"] = "<i class='fas fa-exclamation-circle'></i> The text field is required.";
    }elseif(strlen($newPwd) <= 8){
        $newPwdErrorMessage["newPwdEroor"] = "<i class='fas fa-exclamation-circle'></i> The password must be greater than 8 characters.";
    }

    if(empty($confirmNewPwd)){
        $newPwdErrorMessage["cofirmNewPwdError"] = "<i class='fas fa-exclamation-circle'></i> The text field is required.";
    }elseif(checkPassword($newPwd, $confirmNewPwd) !== false){
        $newPwdErrorMessage["cofirmNewPwdError"] = "<i class='fas fa-exclamation-circle'></i> The password doesn't match!";
    }

    if(!array_filter($newPwdErrorMessage)){
        $hashedPwd = password_hash($newPwd, PASSWORD_DEFAULT);

        $newPwdSQL = "UPDATE users SET userPassword = '$hashedPwd' WHERE userId = {$_SESSION["UID"]} LIMIT 1";
        $newPwdResultSQL = mysqli_query($conn, $newPwdSQL);

        if($newPwdResultSQL === false){
            header("Location: " . BURLU . "reset-password?error=stmtworng");
            exit();
        }else{

            $sql = "SELECT * FROM users WHERE userId = ?;";
            $stmt = mysqli_stmt_init($conn);
            $stmtPrepare = mysqli_stmt_prepare($stmt, $sql);
            if($stmtPrepare === false){
                header("location: " . BURLU . "reset-password?error=stmtwrong");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt, "s", $_SESSION["UID"]);
                mysqli_stmt_execute($stmt);
                $resultData = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($resultData);
                mysqli_stmt_close($stmt);

                $_SESSION["userid"] = $row["userId"];
                $_SESSION["username"] = $row["userName"];
                $_SESSION["userfullname"] = $row["userFullname"];
                $_SESSION["userclass"] = $row["userClass"];
                $_SESSION["userlastseen"] = $row["userLastseen"];
                $_SESSION["userjoined"] = $row["userJoined"];
                $_SESSION["useremail"] = $row["userEmail"];

                $sqlLastseen = "UPDATE users SET userLastseen = NOW() WHERE userId = {$_SESSION["userid"]} LIMIT 1";
                $resultLastseen = mysqli_query($conn, $sqlLastseen);

                if($resultLastseen === false){
                    header("location: " . BURLU . "reset-password?error=stmtwrong");
                    exit();
                }else{
                    unset($_SESSION["UID"]);

                    header("Location: " . BURL);
                    exit();
                }
            }
        }
    }
}

// START CODING OF SEND VERIFY CODE PAGE 
$sendverifycodeErrors = ["sendverifycodeError"=>""];

if(isset($_POST["submit-verify"])){

    if(empty($_POST["verifyemail"])){
        $sendverifycodeErrors["sendverifycodeError"] = "<i class='fas fa-exclamation-circle'></i> Please check the box to send code.!";
    }

    if(!array_filter($sendverifycodeErrors)){
        $verifyCode = rand(9999999, 1111111);
        $verifySQL = "UPDATE users SET userVerificationCode = '$verifyCode' WHERE userId = {$_SESSION["verifyuserid"]}";
        $verifyResultSQL = mysqli_query($conn, $verifySQL);

        if($verifyResultSQL === false){
            header("Location: " . BURLU . "send-verify-code?error=stmtworng");
            exit();
        }else{
            $sendto = $_SESSION["verifyuseremail"];
            $subject = "Email Verification Code";
            $message = "Your verification code to reset your password is $verifyCode";
            $headers = "From:elzuheiry@gmail.com";
            $sendMail = mail($sendto, $subject, $message, $headers);
            if($sendMail === false){
                $sendverifycodeErrors["sendverifycodeError"] = "<i class='fas fa-exclamation-circle'></i> Faild to send code.!";
            }else{
                $info = "We've sent a verification code to your <br /> email - $sendto";
                $_SESSION["info"] = $info;
                header("location: " . BURLU . "verify-code");
                exit();
            }
        }
    }
}
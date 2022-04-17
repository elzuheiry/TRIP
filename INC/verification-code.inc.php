<?php 

$verificationCodePage = "";
$verificationErrors = ["verificationCode"=>""];

if(isset($_POST["Verified"])){
    $verificationCodePage = mysqli_real_escape_string($conn, $_POST["verificationCode"]);

    if(empty($verificationCodePage)){
        $verificationErrors["verificationCode"] = "<i class='fas fa-exclamation-circle'></i> The text field is required.";
    }

    if(!array_filter($verificationErrors)){
        $verificationCodeSQL = checkVerificationCode($conn, $verificationCodePage);

        if($verificationCodeSQL === false){
            $verificationErrors["verificationCode"] = "Sorry, your code was incorrect. Please double-check your code.!";
        }else{
            $updateVerificationCode = 0;
            $updateStatus = "Verified";
            $updateSQL = "UPDATE users SET userVerificationCode = '$updateVerificationCode', userStatus = '$updateStatus' WHERE userId = {$verificationCodeSQL["userId"]}";
            $updateResult = mysqli_query($conn, $updateSQL);
            
            if($updateResult === false){
                header("Location: " . BURL . "verification-code?error=stmtwrong");
                exit();
            }elseif($sqlResultImg === false){
                header("Location: " . BURL . "verification-code?error=stmtwrong");
                exit();
            }else{
                $_SESSION["userid"] = $verificationCodeSQL["userId"];
                $_SESSION["username"] = $verificationCodeSQL["userName"];
                $_SESSION["useremail"] = $verificationCodeSQL["userEmail"];
                $_SESSION["userclass"] = $verificationCodeSQL["userClass"];
                $_SESSION["userjoined"] = $verificationCodeSQL["userJoined"];
                $_SESSION["userlastseen"] = $verificationCodeSQL["userLastseen"];
                $_SESSION["userfullname"] = $verificationCodeSQL["userFullname"];

                $sqlLastseen = "UPDATE users SET userLastseen = NOW() WHERE userId = {$_SESSION["userid"]} LIMIT 1";
                $resultLastseen = mysqli_query($conn, $sqlLastseen);

                unset($_SESSION["info"]);
                
                header("Location: " . BURL);
                exit();
            }
        }
    }
}

// START CODING OF PAGE VERIFY CODE FOR RECOVERY PASSWORD
$verifyCodePage = "";
$verifyErrors = ["verifyCode"=>""];

if(isset($_POST["Verify"])){
    $verifyCodePage = mysqli_real_escape_string($conn, $_POST["verifyCode"]);

    if(empty($verifyCodePage)){
        $verifyErrors["verifyCode"] = "<i class='fas fa-exclamation-circle'></i> The text field is required.";
    }

    if(!array_filter($verifyErrors)){
        $verifyCodeSQL = checkVerificationCode($conn, $verifyCodePage);

        if($verifyCodeSQL === false){
            $verifyErrors["verifyCode"] = "Sorry, your code was incorrect. Please double-check your code.!";
        }else{
            $updateVerificationCode = 0;
            $updateSQL = "UPDATE users SET userVerificationCode = '$updateVerificationCode' WHERE userId = {$_SESSION["verifyuserid"]}";
            $updateResult = mysqli_query($conn, $updateSQL);

            if($updateResult === false){
                header("Location: " . BURLU . "verify-code.php?error=stmtworng");
                exit();
            }else{
                $_SESSION["UID"] = $verifyCodeSQL["userId"];

                unset($_SESSION["info"]);
                unset($_SESSION["verifyuserid"]);
                unset($_SESSION["verifyusername"]);
                unset($_SESSION["verifyuseremail"]);

                header("Location: " . BURLU . "reset-password.php");
                exit();
            }
            
        }
    }
}
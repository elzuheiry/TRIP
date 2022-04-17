<?php 

$registerUsername = "";
$registerEmail = "";
$registerPassword = "";
$registerConfirmPassword = "";

$errorsOfRegister = ["registerUsername"=>"","registerEmail"=>"","registerPassword"=>"","registerConfirmPassword"=>"","registerError"=>""];

if(isset($_POST["submitRegister"])){

    $registerUsername = mysqli_real_escape_string($conn, $_POST["registerUsername"]);
    $registerEmail = mysqli_real_escape_string($conn, $_POST["registerEmail"]);
    $registerPassword = mysqli_real_escape_string($conn, $_POST["registerPassword"]);
    $registerConfirmPassword = mysqli_real_escape_string($conn, $_POST["registerConfirmPassword"]);

    if(empty($registerUsername)){
        $errorsOfRegister["registerUsername"] = "<i class='fas fa-exclamation-circle'></i> The text field is required.";
    }
    elseif(checkUsername($registerUsername) !== false){
        $errorsOfRegister["registerUsername"] = "<i class='fas fa-exclamation-circle'></i> the text is not validated username.";
    }
    elseif(checkUsernameIndb($conn, $registerUsername) !== false){
        $errorsOfRegister["registerUsername"] = "<i class='fas fa-exclamation-circle'></i> The username already taken.";
    }
    
    if(empty($registerEmail)){
        $errorsOfRegister["registerEmail"] = "<i class='fas fa-exclamation-circle'></i> The text field is required.";
    }
    elseif(checkEmail($registerEmail) !== false){
        $errorsOfRegister["registerEmail"] = "<i class='fas fa-exclamation-circle'></i> The text is not validated email.";
    }
    elseif(checkEmailIndb($conn, $registerEmail) !== false){
        $errorsOfRegister["registerEmail"] = "<i class='fas fa-exclamation-circle'></i> The email already taken.";
    }
    
    if(empty($registerPassword)){
        $errorsOfRegister["registerPassword"] = "<i class='fas fa-exclamation-circle'></i> The text field is required.";
    }
    elseif(strlen($registerPassword) <= 8){
        $errorsOfRegister["registerPassword"] = "<i class='fas fa-exclamation-circle'></i> The password must be greater than 8 characters.";
    }
    
    if(empty($registerConfirmPassword)){
        $errorsOfRegister["registerConfirmPassword"] =  "<i class='fas fa-exclamation-circle'></i> The text field is required.";
    }
    elseif(checkPassword($registerPassword, $registerConfirmPassword) !== false){
        $errorsOfRegister["registerConfirmPassword"] = "<i class='fas fa-exclamation-circle'></i> The password doesn't match!";
    }
    
    if(!array_filter($errorsOfRegister)){
        $verificationCode = rand(9999999, 1111111);
        $sql = "INSERT INTO users (userName, userEmail, userPassword, userVerificationCode) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        $stmtPrepare = mysqli_stmt_prepare($stmt, $sql);
        if($stmtPrepare === false){
            $errorsOfRegister["registerError"] = "Something went wrong, please try again.";
        }else{
            $hashedPwd = password_hash($registerPassword, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $registerUsername, $registerEmail, $hashedPwd, $verificationCode);
            $stmtExecute = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            if($stmtExecute !== false){
                
                $subject = "PICNIC Email Verification Code";
                $message = "PINIC Your verification code is $verificationCode";
                $headers = "From:elzuheiry@gmail.com";
                $sendMail = mail($registerEmail, $subject, $message, $headers);
                if($sendMail === false){
                    $errorsOfRegister["registerError"] = "Failed to send verification code to your E-Mail.";
                }else{
                    $info = "Your registration was successful.! <br />";
                    $info .= "And we've sent a verification code to your <br /> email - $registerEmail";
                    $_SESSION["info"] = $info;
                    header("location: " . BURL . "verification-code.php");
                    exit();
                }
            }else{
                header("location: " . BURL . "signup.php?error=failedmail");
                exit();
            }
        }
    }
}

// START CODIG OF LOGIN PAGE 
$loginUsername = "";
$loginPassword = "";
$errorsOfLogin = ["loginUsername" => "", "loginPassword" => "", "errorLogin" => ""];

if(isset($_POST["submitLogin"])){
    $loginUsername = mysqli_real_escape_string($conn, $_POST["loginUsername"]);
    $loginPassword = mysqli_real_escape_string($conn, $_POST["loginPassword"]);

    if(empty($loginUsername)){
        $errorsOfLogin["loginUsername"] = "<i class='fas fa-exclamation-circle'></i> The text field is required.";
    }
    
    if(empty($loginPassword)){
        $errorsOfLogin["loginPassword"] = "<i class='fas fa-exclamation-circle'></i> The text field is required.";
    }

    if(!array_filter($errorsOfLogin)){
        $uidExists = checkUsernameAndEmail($conn, $loginUsername);
        if($uidExists === false){
            $errorsOfLogin["errorLogin"] = "The username or email you entered doesn't belong to an account. Please check your username or email and try again.";
        }else{
            $statusFromDB = $uidExists["userStatus"];
            $pwdFromDB = $uidExists['userPassword'];
            $checkPwd = password_verify($loginPassword, $pwdFromDB);
    
            if($checkPwd === false){               
                $errorsOfLogin["errorLogin"] = "Sorry, your password was incorrect. Please double-check your password.";
            }elseif($statusFromDB == "Verified"){
                $_SESSION["userid"] = $uidExists["userId"];
                $_SESSION["username"] = $uidExists["userName"];
                $_SESSION["useremail"] = $uidExists["userEmail"];
                $_SESSION["userclass"] = $uidExists["userClass"];
                $_SESSION["userjoined"] = $uidExists["userJoined"];
                $_SESSION["userlastseen"] = $uidExists["userLastseen"];
                $_SESSION["userfullname"] = $uidExists["userFullname"];
                $_SESSION["userimg"] = $uidExists["userProfileImg"];

                $sqlLastseen = "UPDATE users SET userLastseen = NOW() WHERE userId = {$_SESSION["userid"]} LIMIT 1";
                $resultLastseen = mysqli_query($conn, $sqlLastseen);

                header("Location: " . BURL);
                exit();
            }else{
                $info = "It's look like you haven't still verify your <br /> email - {$uidExists['userEmail']}";
                $_SESSION['info'] = $info;
                header("location: " . BURL . "verification-code.php");
                exit();
            }
        }
    }
}
<?php 
// START CODING OF FORM SIGN UP
function checkUsername($registerUsername){
    if(!preg_match("/^[a-zA-Z_\.]+$/", $registerUsername)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function checkEmail($registerEmail){
    if(!filter_var($registerEmail, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function checkPassword($registerPassword, $registerConfirmPassword){
    if($registerPassword !== $registerConfirmPassword){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function checkUsernameIndb($conn, $registerUsername){
    $sql = "SELECT * FROM users WHERE userName = ?;";
    $stmt = mysqli_stmt_init($conn);
    $stmtPrepare = mysqli_stmt_prepare($stmt, $sql);
    if($stmtPrepare === false){
        header("location: ". BURL."signin.php?error=stmtwrong");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $registerUsername);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }
}

function checkEmailIndb($conn, $registerEmail){
    $sql = "SELECT * FROM users WHERE userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    $stmtPrepare = mysqli_stmt_prepare($stmt, $sql);
    if($stmtPrepare === false){
        header("location: ". BURL."signin.php?error=stmtwrong");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $registerEmail);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }else{
            $result = false;
            return $result;
        }   
        mysqli_stmt_close($stmt);
    }
}

// START CODING OF FORM LOG IN
function checkUsernameAndEmail($conn, $loginUsername){
    $sql = "SELECT * FROM users WHERE userName = ? OR userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    $stmtPrepare = mysqli_stmt_prepare($stmt, $sql);
    if($stmtPrepare === false){
        header("location: ". BURL."signin.php?error=stmtwrong");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "ss", $loginUsername, $loginUsername);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }
}

function checkEmailIndbPwd($conn, $textPwd){
    $sql = "SELECT * FROM users WHERE userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    $stmtPrepare = mysqli_stmt_prepare($stmt, $sql);
    if($stmtPrepare === false){
        header("location: ". BURL."signin.php?error=stmtwrong");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $textPwd);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }else{
            $result = false;
            return $result;
        }   
        mysqli_stmt_close($stmt);
    }
}

function checkVerificationCode($conn, $verificationCodePage){
    $sql = "SELECT * FROM users WHERE userVerificationCode = ?;";
    $stmt = mysqli_stmt_init($conn);
    $stmtPrepare = mysqli_stmt_prepare($stmt, $sql);
    if($stmtPrepare === false){
        header("location: " . BURL . "signup.php?error=stmtwrong");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $verificationCodePage);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }
}
<?php 
require_once "./config.php";

if(isset($_SESSION["userid"])){
    header("location: ". BURL);
    exit();
}else{
    require_once BLINC."dbConn.inc.php";
    require_once BLINC."functions.inc.php";
    require_once BLINC."signup.inc.php";
    
    if(isset($_GET["error"])){
        if($_GET["error"] == "stmtwrong"){
            $errorsOfLogin["errorLogin"] = "Something went wrong, please try again!";
        }
    } ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="<?php echo ASSETS."Styles/mainStyle.css"; ?>">

    <title>Sign In - PICNIC</title>
</head>

<body>
    <header class="l-header flex flex-ai-c">
        <div class="backToHome">
            <a href='<?php echo BURL ?>'> back to home </a>
        </div>
    </header>
    <div class="formPage">
        <div class="allForms">
            <div class="titleForm">
                <div class="loginTitle title">
                    <h2><a href="<?php echo BURL."signin" ?>">log In</a></h2>
                </div>
                <div class="title bordder-signup">
                    <h2><a href="<?php echo BURL."signup" ?>">Register</a></h2>
                </div>
            </div>
            <div class="login_error_message"><?php echo $errorsOfLogin["errorLogin"]; ?></div>

            <div class="bodyForm" id="bodyForm">
                <div class="loginForm form">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="input">
                            <div class="boxInput">
                                <input type="text" class="username" autocomplete="off" placeholder=" "
                                    value="<?php echo $loginUsername; ?>" name="loginUsername" id="loginUsername" />
                                <label for="">Type here your username or email</label>
                                <i class="fas fa-user iconInput"></i>
                            </div>
                            <div class="errorMessage" id="loginUsernameError">
                                <?php echo $errorsOfLogin["loginUsername"]; ?>
                            </div>
                        </div>
                        <div class="input">
                            <div class="boxInput">
                                <input type="password" class="password" autocomplete="off" placeholder=" "
                                    value="<?php echo $loginPassword; ?>" name="loginPassword" id="loginPassword" />
                                <label for="">Type here your password</label>
                                <i class="fas fa-lock iconInput"></i>
                                <i class="fas fa-eye-slash iconInputLockShow"></i>
                            </div>
                            <div class="errorMessage" id="loginPasswordError">
                                <?php echo $errorsOfLogin["loginPassword"]; ?>
                            </div>
                        </div>
                        <div class="forgetPwd">
                            <a class="linkForgetPwd" href="<?php echo BURLU . "password-recovery"; ?>">Forgotten
                                password?</a>
                        </div>
                        <button class="button btnLogin" id="submitLogin" name="submitLogin" type="submit">
                            Log In
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo ASSETS."JS/signin.js" ?>"></script>
</body>

</html>

<?php } ?>
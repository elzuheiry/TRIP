<?php 
require_once "./config.php";
require_once BLINC."dbConn.inc.php";
require_once BLINC."functions.inc.php";
require_once BLINC."signup.inc.php";

if(!isset($_SESSION["userid"])){

    if(isset($_GET["error"])){
        if($_GET["error"] == "stmtwrong"){
            $errorsOfRegister["registerError"] = "Something went wrong, please try again!";
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

    <title>Sign Up - PICNIC</title>
</head>

<body>
    <header class="l-header flex flex-ai-c">
        <div class="backToHome">
            <a href="<?php echo BURL ?>"> back to home </a>
        </div>
    </header>
    <div class="formPage">
        <div class="allForms">
            <div class="titleForm">
                <div class="title bordder-login">
                    <h2><a href="<?php echo BURL."signin" ?>">log In</a></h2>
                </div>
                <div class="sginupTitle title">
                    <h2><a href="<?php echo BURL."signup" ?>">Register</a></h2>
                </div>
            </div>

            <div class="login_error_message"><?php echo $errorsOfRegister["registerError"]; ?></div>

            <div class="bodyForm signupBodyForm" id="bodyForm">
                <div class="sginupForm form">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                        <div class="input">
                            <div class="boxInput">
                                <input type="text" class="inputLoginForm" placeholder=" "
                                    value="<?php echo $registerUsername ?>" autocomplete="off" name="registerUsername"
                                    id="registerUsername" />
                                <label for="">Type here your username</label>
                                <i class="fas fa-user iconInput"></i>
                            </div>
                            <div class="errorMessage" id="registerUsernameError">
                                <?php echo $errorsOfRegister["registerUsername"]; ?>
                            </div>
                        </div>
                        <div class="input">
                            <div class="boxInput">
                                <input type="text" class="inputLoginForm" autocomplete="off" placeholder=" "
                                    value="<?php echo $registerEmail ?>" name="registerEmail" id="registerEmail" />
                                <label for="">Type here your email</label>
                                <i class="fas fa-envelope iconInput"></i>
                            </div>
                            <div class="errorMessage" id="registerEmailError">
                                <?php echo $errorsOfRegister["registerEmail"]; ?>
                            </div>
                        </div>
                        <div class="input">
                            <div class="boxInput">
                                <input type="password" class="inputLoginForm r-p" id="registerPassword"
                                    value="<?php echo $registerPassword ?>" placeholder=" " autocomplete="off"
                                    name="registerPassword" />
                                <label for="">Type here your password</label>
                                <i class="fas fa-lock iconInput"></i>
                                <i class="fas fa-eye-slash iconInputLockShow su-ic-p"></i>
                            </div>
                            <div class="errorMessage" id="registerPasswordError">
                                <?php echo $errorsOfRegister["registerPassword"]; ?>
                            </div>
                        </div>
                        <div class="input">
                            <div class="boxInput">
                                <input type="password" class="inputLoginForm r-c-p" autocomplete="off"
                                    id="registerConfirmPassword" placeholder=" " name="registerConfirmPassword"
                                    value="<?php echo $registerConfirmPassword ?>" />
                                <label for="">Type here your confirm password</label>
                                <i class="fas fa-lock iconInput"></i>
                                <i class="fas fa-eye-slash iconInputLockShow su-ic-p-2"></i>
                            </div>
                            <div class="errorMessage" id="registerConfirmPasswordError">
                                <?php echo  $errorsOfRegister["registerConfirmPassword"]; ?>
                            </div>
                        </div>
                        <button id="submitRegister" class="button btnLogin" name="submitRegister" type="submit">
                            Register
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo ASSETS."JS/signup.js" ?>"></script>
</body>

</html>

<?php }else{
    header("Location: " . BURL);
    exit();
} ?>
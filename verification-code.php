<?php 
require_once "./config.php";
require_once BLINC."dbConn.inc.php";
require_once BLINC."functions.inc.php";
require_once BLINC."verification-code.inc.php"; ?>

<?php 
if(isset($_SESSION["info"])){ ?>
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

    <title>Verification code - PICNIC</title>
</head>

<body>
    <div class="verification-code">
        <div class="container">
            <div class="verification-content">
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <div class="title-form">
                        <h5><?php echo $_SESSION["info"] ?></h5>
                    </div>

                    <div class="input">
                        <div class="boxInput">
                            <input type="text" placeholder=" " autocomplete="off" name="verificationCode" />
                            <label for="">Type here your code</label>
                        </div>
                        <div class="errorMessage" id="verificationCodeError">
                            <?php echo $verificationErrors["verificationCode"] ?>
                        </div>
                    </div>

                    <button class="btn-verification button" type="submit" name="Verified">Verified</button>
                </form>
            </div>
        </div>
    </div>

    <script src="<?php echo ASSETS."" ?>"></script>
</body>

</html>
<?php }else{
    header("Location: " . BURL);
    exit(); 
} ?>
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
    <link rel="stylesheet" href="<?php echo ASSETS."OwlCarousel/owl.carousel.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo ASSETS."OwlCarousel/owl.theme.default.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo ASSETS."Styles/mainStyle.css"; ?>">

    <title><?php echo $titlePage ?>PICNIC</title>
</head>

<body>
    <header class="l-header flex flex-jc-sb flex-ai-c">
        <div class="logo">
            <h2 class="text-logo">
                <a href="<?php echo BURL ?>">PICNIC</a>
            </h2>
        </div>
        <nav class="nav" id="nav">
            <ul>
                <li>
                    <a href="#" class="navLink">
                        <span class="nav-icon"><i class="fas fa-pen"></i></span>
                        <span>reveiw</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="navLink">
                        <span class="nav-icon"><i class="far fa-bell"></i></span>
                        <span>alerts</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="navLink">
                        <span class="nav-icon"><i class="far fa-heart"></i></span>
                        <span>trips</span>
                    </a>
                </li>
                <?php if(isset($_SESSION["userid"])){ ?>
                <li>
                    <a href='#' class="navLink">
                        <span class='nav-icon'><i class='far fa-bookmark'></i></span>
                        <span>bookmarks</span>
                    </a>
                </li>
                <li id="navLinkProfile" class='navLinkProfile'>
                    <?php echo $_SESSION["username"]; ?> <i class="fas fa-caret-down" id="navLinkProfileIcon"></i>
                    <ul class="drop-dwon-menu" id="drop-dwon-menu">
                        <li>
                            <a href="<?php echo BURLU . "profile.php" ?>">
                                <span><i class="far fa-user"></i></span>
                                Profile
                            </a>

                        </li>
                        <li>
                            <a href="<?php echo BURLU . "edit-profile" ?>">
                                <span><i class="far fa-edit"></i></span>
                                Edit Profile
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BURLU . "#" ?>">
                                <span><i class="far fa-question-circle"></i></span>
                                Suport
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BURLU . "#" ?>">
                                <span><i class="fas fa-cog"></i></span>
                                Settings
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BURL . "logout" ?>">
                                <span><i class="fas fa-sign-out-alt"></i></span>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } else{ ?>
                <li>
                    <a class='button' href='<?php echo BURL."signin" ?>'>sgin in</a>
                </li>
                <?php } ?>
            </ul>
        </nav>
        <div class="navToggles" id="navToggles">
            <div class="navToggle navToggle_1"></div>
            <div class="navToggle navToggle_2"></div>
        </div>
    </header>
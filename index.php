<?php 
require_once "./config.php";
$titlePage = "Home - ";
require_once BLINC."header.inc.php";
?>

<section class="menu container">
    <div class="links flex flex-d-r flex-ai-s">
        <div class="link flex shortCute">
            <span class="link-text">hotels</span>
            <span class="link-icon flex flex-jc-e"><i class="fas fa-hotel"></i></span>
        </div>
        <div class="link flex shortCute">
            <span class="link-text">Vacation Rentals</span>
            <span class="link-icon flex flex-jc-e"><i class="fas fa-concierge-bell"></i></span>
        </div>
        <div class="link flex shortCute">
            <span class="link-text">Things to Do </span>
            <span class="link-icon flex flex-jc-e"><i class="fas fa-clipboard-check"></i></span>
        </div>
        <div class="link flex shortCute">
            <span class="link-text">Restaurants</span>
            <span class="link-icon flex flex-jc-e"><i class="fas fa-utensils"></i></span>
        </div>
        <div class="link flex shortCute">
            <span class="link-text">Write a review</span>
            <span class="link-icon flex flex-jc-e"><i class="fas fa-edit"></i></span>
        </div>
        <div class="link flex shortCute">
            <span class="link-text">Travel Forums</span>
            <span class="link-icon flex flex-jc-e"><i class="fab fa-forumbee"></i></span>
        </div>
        <div class="link flex shortCute">
            <span class="link-text">More</span>
            <span class="link-icon flex flex-jc-e"></span>
        </div>
    </div>
</section>

<section class="box-search">
    <div class="search container ">
        <div class="inputBox ">
            <div class="inputBoxSearch" id="inputBoxSearch">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                    <input type="text" class="input-search" name="search" id="search" autocomplete="off"
                        placeholder="Where to?" />
                    <button type="submit" name="buttonSearch" class="button-search">
                        <i class="fas fa-search"></i>
                    </button>
                </form>

                <div class="autocom-box">
                    <hr class="hr">
                    <div class="autocomBoxLine">
                        <a href="" class="flex">
                            <div class="a-b-r flex flex-ai-c"><i class="fas fa-location-arrow"></i></div>
                            <div class="a-b-l nearby">
                                nearby
                            </div>
                        </a>
                    </div>
                    <div class="autocomBoxTitle">
                        <h4>recently viewed</h4>
                    </div>

                    <div class="autocomBoxLine">
                        <a href="" class="flex">
                            <div class="a-b-r flex flex-ai-c"><i class="fas fa-location-arrow"></i></div>
                            <div class="a-b-l nearby">
                                <div class="a-b-l-t">Ahmed Mahmoud</div>
                                <div class="a-b-l-b">cairo, egypt</div>
                            </div>
                        </a>
                    </div>
                    <div class="autocomBoxLine">
                        <a href="" class="flex">
                            <div class="a-b-r flex flex-ai-c"><i class="fas fa-location"></i></div>
                            <div class="a-b-l nearby">
                                <div class="a-b-l-t">Mohamed Mahmoud</div>
                                <div class="a-b-l-b">cairo, egypt</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay_search"></div>
</section>

<section class="home">
    <div class="container">
        <h2>Home Rentals Near You</h2>
        <div class="detuls flex flex-d-r">
            <h4>We think you'd enjoy these homes for a quick trip out of town.</h4>
            <div class="con-home grid">
                <div class="box-home">
                    <div class="img-home">
                        <a href="#">
                            <img src="<?php echo IMG."ea.jpg" ?>" alt="" />
                        </a>
                    </div>
                    <div class="title-home">
                        <h6><a href="#">Rentals in El Gouna, Egypt</a></h6>
                    </div>
                </div>
                <div class="box-home">
                    <div class="img-home">
                        <a href="#"><img src="<?php echo IMG."eb.jpg" ?>" alt="" /></a>
                    </div>
                    <div class="title-home">
                        <h6>
                            <a href="http://" target="_blank" rel="noopener noreferrer">Rentals in El cairo, Egypt</a>
                        </h6>
                    </div>
                </div>
                <div class="box-home">
                    <div class="img-home">
                        <a href="#"><img src="<?php echo IMG."ec.jpg" ?>" alt="" /></a>
                    </div>
                    <div class="title-home">
                        <h6>
                            <a href="http://" target="_blank" rel="noopener noreferrer">Rentals in El alx, Egypt</a>
                        </h6>
                    </div>
                </div>
                <div class="box-home">
                    <div class="img-home">
                        <a href="#"><img src="<?php echo IMG."ed.jpg" ?>" alt="" /></a>
                    </div>
                    <div class="title-home">
                        <h6><a href="#">Rentals in El Gouna, Egypt</a></h6>
                    </div>
                </div>
                <div class="box-home">
                    <div class="img-home">
                        <a href="#"><img src="<?php echo IMG."ee.jpg" ?>" alt="" /></a>
                    </div>
                    <div class="title-home">
                        <h6><a href="#">Rentals in Marina, Egypt</a></h6>
                    </div>
                </div>
                <div class="box-home">
                    <div class="img-home">
                        <a href="#"><img src="<?php echo IMG."f1.jpg" ?>" alt="" /></a>
                    </div>
                    <div class="title-home">
                        <h6><a href="#">Rentals in Ain Sukhna, Egypt</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cover">
    <div class="l-containerCover container">
        <h1>
            Egyptian
            tourism is the
            most beautiful in
            the world.
        </h1>
    </div>
</section>

<section class="weekend">
    <div class="container-weekend">
        <h1>Dream Your Next Trip</h1>
        <h3>Weekend getaways from Banha</h3>
        <p>Explore what’s nearby</p>

        <div class="con-weekend owl-carousel owl-theme">
            <div class="item box-weekend">
                <a href="#">
                    <div class="img-weekend">
                        <img src="<?php echo IMG."dahab.jpg" ?>" alt="" />
                    </div>
                    <div class="title-weekend">
                        <h2>Dahab, egypt</h2>
                    </div>
                </a>
            </div>

            <div class="item box-weekend">
                <a href="#">
                    <div class="img-weekend">
                        <img src="<?php echo IMG."cairo.jpg" ?>" alt="" />
                    </div>
                    <div class="title-weekend">
                        <h2>cairo, egypt</h2>
                    </div>
                </a>
            </div>

            <div class="item box-weekend">
                <a href="#">
                    <div class="img-weekend">
                        <img src="<?php echo IMG."alexandria.jpg" ?>" alt="" />
                    </div>
                    <div class="title-weekend">
                        <h2>alexandria, egypt</h2>
                    </div>
                </a>
            </div>

            <div class="item box-weekend">
                <a href="#">
                    <div class="img-weekend">
                        <img src="<?php echo IMG."ain-sukhna.jpg" ?>" alt="" />
                    </div>
                    <div class="title-weekend">
                        <h2>ain sukhna, egypt</h2>
                    </div>
                </a>
            </div>

            <div class="item box-weekend">
                <a href="#">
                    <div class="img-weekend">
                        <img src="<?php echo IMG."el-alamein.jpg" ?>" alt="" />
                    </div>
                    <div class="title-weekend">
                        <h2>el alamein, egypt</h2>
                    </div>
                </a>
            </div>

            <div class="item box-weekend">
                <a href="#">
                    <div class="img-weekend">
                        <img src="<?php echo IMG."photo1jpg.jpg" ?>" alt="" />
                    </div>
                    <div class="title-weekend">
                        <h2>mersa matruh, egypt</h2>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="discover">
    <div class="container-dis container">
        <div class="title-dis">
            <h2>Discover El Gouna</h2>
        </div>

        <div class="data-dis">
            <div class="box-dis">
                <div class="detuls-dis">
                    <div class="det-dis">
                        <h6><a href="#">from gouna</a></h6>
                        <h3><a href="#">Ride with Us</a></h3>
                        <p>
                            Get all the epic itineraries and must-see stops to make your
                            next California Road Trip the adventure of a lifetime.
                        </p>
                    </div>
                </div>
                <div class="box-img-dis">
                    <img src="<?php echo IMG ?>El_Gouna_,_Egypt.jpg" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once BLINC."footer.inc.php"; ?>
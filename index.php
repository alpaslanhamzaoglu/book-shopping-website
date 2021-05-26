<?php 
session_start();

if (isset($_SESSION['name']) && isset($_SESSION['surname'])){

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>PHPJabbers.com | Free Shopping Website Template</title>
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
<body>
    <?php
        include "header.php";
    ?>
      
    <section class="banner" id="top" style="background-image: url(img/book1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
                        <h2>Let's read and grow together!</h2>
                        <div class="blue-button">
                            <a href="contact.html">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main>
        <section class="our-services">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="left-content">
                            <br>
                            <h4>About us</h4>
                            <p>In BookCrave, we all work every day to make sure every one of our precious customers are happy. We are a team that works hard to guarantee happiness. From science fiction to poem, from poem to sports, we work with the best!</p>
                            <div class="blue-button">
                                <a href="about-us.html">Discover More</a>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="img/team2.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <span>Genres</span>
                            <h2>There are many book genres for your taste!</h2>
                        </div>
                    </div> 
                </div> 
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <img src="img/fiction_new.png" alt=""
                                    width="500"
                                    height="250" />
                            </div>
                            <div class="down-content">
                                <h4>Fiction</h4>
                                <p>Anything is possible in fiction! They can be about space, time travel, aliens or time-traveling aliens in space :)</p>
                                <div class="text-button">
                                    <a href="product-details.html">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <img src="img/novel.jpg" alt=""
                                    width="500"
                                    height="250" />
                            </div>
                            <div class="down-content">
                                <h4>Novels</h4>
                                <p>Get to know the characters in depth and experience everything with them. Novels may or may not stick to reality but they sure teach a lot.</p>
                                <div class="text-button">
                                    <a href="product-details.html">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <img src="img/socialrealism.jpg" alt=""
                                    width="500"
                                    height="250" />
                            </div>
                            <div class="down-content">
                                <h4>Social Realism</h4>
                                <p>Social realist artists describe the daily life of workers and poor people in a realistic way. Thus, they lack attractiveness.</p>
                                <div class="text-button">
                                    <a href="product-details.html">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <img src="img/dystopianfiction.jpg" alt=""
                                    width="500"
                                    height="250" />
                            </div>
                            <div class="down-content">
                                <h4>Dystopian Fiction</h4>
                                <p>They challenge the readers to think differently about the current social and political climates and may even inspire action.</p>
                                <div class="text-button">
                                    <a href="product-details.html">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <img src="img/history_new.png" alt=""
                                    width="500"
                                    height="250" />
                            </div>
                            <div class="down-content">
                                <h4>History</h4>
                                <p>They capture the details of the period as accurately as possible for authenticity, including social norms, manners, customs, traditions.</p>
                                <div class="text-button">
                                    <a href="product-details.html">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <img src="img/dys.jpg" alt=""
                                    width="500"
                                    height="250" />
                            </div>
                            <div class="down-content">
                                <h4>Dystopian Novels</h4>
                                <p>They are imagined communities or societies that are dehumanizing and frightening. A dystopia is antonym of a utopia.</p>
                                <div class="text-button">
                                    <a href="product-details.html">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <img src="img/poetry_new.png" alt=""
                                    width="500"
                                    height="250" />
                            </div>
                            <div class="down-content">
                                <h4>Poetry</h4>
                                <p>They contain words that follow a rhythm or structure, and sometimes rhyme, that are designed on evoke emotion and thought!</p>
                                <div class="text-button">
                                    <a href="product-details.php">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    


    <section class="banner" id="top" style="background-image: url(img/contact3.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                            <h2>Contact Us</h2>
                            <h3>All your ideas and suggestions are very important to us. Please contact us if you have any questions as well!</h3>
                        <div class="blue-button">
                            <a href="contact.html">Talk to us</a>
                            <br><br>
                            <a href="logout.php">Logout</a>
                            <body>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    </main>
   
    <?php
        include "footer.php";
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/vendor/bootstrap.min.js"></script>
    
    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>
</html>


<!--<?php 
}//else{
   //  header("Location: login2.php");
     //exit();
//}
?>-->
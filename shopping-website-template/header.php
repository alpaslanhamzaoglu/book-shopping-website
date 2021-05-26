<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>BookCrave</title>

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

    <div class="wrap">
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button id="primary-nav-button" type="button">Menu</button>
                        <a href="index.php">
                            <div class="logo">
                                <img src="img/logo-update.png" alt="Venue Logo">
                            </div>
                        </a>
                        <nav id="primary-nav" class="dropdown cf">
                            <ul class="dropdown menu">
                                <li><a href="index.php">Home</a></li>

                                <li><a href="products.php?category=All">Books</a></li>

                                <li><a href="checkout.php">Checkout</a></li>
                                <?php
                                    include '../admin/config.php';
                                    $uid = $_SESSION['uID'];
                                    $sql_statement = "SELECT * FROM admin WHERE uID = '$uid'";
                                    $result = mysqli_query($db, $sql_statement)  or die(mysqli_error($db));
                                    if ($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<li><a href=\"../admin/admin.php\">Admin</a></li>"; 
                                    }                                    
                                ?>
                                <li><a href="./userpage.php">Profile Page</a></li>
                            </ul>
                        </nav><!-- / #primary-nav -->
                    </div>
                </div>
            </div>
        </header>
    </div>
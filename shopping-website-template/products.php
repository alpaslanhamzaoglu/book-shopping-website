<!DOCTYPE html>
<html>
    <?php include 'header.php'?>
    <section class="banner banner-secondary" id="top" style="background-image: url(img/26102.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Books</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
                div.scrollmenu {
                background-color: #333;
                overflow: auto;
                white-space: nowrap;
                }

                div.scrollmenu a {
                display: inline-block;
                color: white;
                text-align: center;
                padding: 14px;
                text-decoration: none;
                }

                div.scrollmenu a:hover {
                background-color: #777;
                }
            </style> 
        <div class="scrollmenu">
                <a href = "products.php?category=All">All<a>
            <?php
                include "../admin/config.php";
                $sql_statement = "SELECT DISTINCT bcategory FROM books";
                $result = mysqli_query($db, $sql_statement);
                while($row = mysqli_fetch_assoc($result))
                {
                    $category = $row['bcategory'];
                    echo "<a href=\"products.php?category=$category\">$category</a>";
                }
            ?>
        </div>
    <main>
        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <?php
                    include "../admin/config.php";
                    $sql_statement = "SELECT * FROM books";
                    $url= $_SERVER['REQUEST_URI'];  
                    $url_components = parse_url($url);
                    parse_str($url_components['query'], $params);
                    $cat = $params['category'];
                    if($cat != "All")
                    {
                        $sql_statement = $sql_statement . " WHERE bcategory = '$cat'";
                    }
                    $result = mysqli_query($db, $sql_statement);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $id = $row['bID'];
                        $title = $row['btitle'];
                        $language = $row['blanguage'];
                        $publisher = $row['bpublisher'];
                        $pubdate = $row['publishDate'];
                        $price = $row['bprice'];
                        $category = $row['bcategory'];
                        $blink = $row['blinks'];
                        echo "<div class=\"col-md-4 col-sm-6 col-xs-12\">
                            <div class=\"featured-item\">
                                <div class=\"thumb\">
                                    <img src=\"$blink\" alt=\"\" width = 640 height = 480>
                                </div>
                                <div class=\"down-content\">
                                    <h4>$title.</h4>

                                    <span><strong><sup>$</sup>$price</strong></span>

                                    <p>$category</p>

                                    <div class=\"text-button\">
                                        <a href=\"product-details.php?book=$id\">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <?php include 'footer.php'?>
</body>

</html>
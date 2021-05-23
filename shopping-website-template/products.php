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

    <main>
        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <?php
                    include "../admin/config.php";
                    $sql_statement = "SELECT * FROM books";
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
                                    <img src=\"$blink\" alt=\"\">
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
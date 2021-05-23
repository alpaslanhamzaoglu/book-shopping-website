<!DOCTYPE html>
<html>
    <?php include 'header.php'?>
    <main>
        <section class="featured-places">
            <div class="container">
               <div class="row">
                   <?php
                    $url= $_SERVER['REQUEST_URI'];  
                    $url_components = parse_url($url);
                    parse_str($url_components['query'], $params);
                    $id = $params['book'];
                    
                    include "../admin/config.php";
                    $sql_statement = "SELECT * FROM books b1 WHERE b1.bID = '$id'";
                    $result = mysqli_query($db, $sql_statement);
                    $row = mysqli_fetch_assoc($result);                 
                    $title = $row['btitle'];
                    $language = $row['blanguage'];
                    $publisher = $row['bpublisher'];
                    $pubdate = $row['publishDate'];
                    $price = $row['bprice'];
                    $category = $row['bcategory'];
                    $blink = $row['blinks'];
                    $sql_statement = "SELECT * FROM authors a1 WHERE a1.aID = (SELECT aID FROM wrote w WHERE w.bID = '$id')";
                    $result = mysqli_query($db, $sql_statement);
                    $row = mysqli_fetch_assoc($result);
                    $name = $row['aname'];
                    $surname = $row['asurname']; 

                    echo "
                    <style>
                    divt
                    divt {
                      border-left: 5px solid #1c87c9;
                      background-color: #FBFBFB;
                      text-align: center;
                      position: absolute;
                    }
                  </style>
                    <div class=\"col-md-6 col-xs-12\">
                        <div>
                            <h2>$title<h2/>
                        </div>
                        <div>
                        <img src=\"$blink\" alt=\"\" class=\"img-responsive wc-image\">
                        </div>
                        <br>
                    </div>
                    <div class=\"col-md-6 col-xs-12\">
                        <form action=\"handleCart.php\" method=\"post\" class=\"form\">
                        <h2><strong class=\"text-primary\">$$price</strong></h2>
                        <br>
                        <divt class = \"row\">
                            <divt class=\"col-md-6 col-xs-12 \">
                                <p class = 'lead'>Author: $name $surname</p>
                            </divt>
                        </divt>
                        <divt class = \"row\">
                            <divt class=\"col-md-6 col-xs-12 \">
                                <p class = 'lead'>Category: $category</p>
                            </divt>
                        </divt>
                        <divt class = \"row\">
                            <divt class=\"col-md-6 col-xs-12 \">
                                <p class = 'lead'>Language: $language</p>
                            </divt>
                        </divt>
                        <divt class = \"row\">
                            <divt class=\"col-md-6 col-xs-12 \">
                                <p class = 'lead'>Publisher: $publisher</p>
                            </divt>
                        </divt>
                        <divt class = \"row\">
                            <divt class=\"col-md-6 col-xs-12 \">
                                <p class = 'lead'>Publish Date: $pubdate</p>
                            </divt>
                        </divt>
                        <br> 

                        <div class=\"row\">
                            <div class=\"col-sm-4\">

                                <label class=\"control-label\">Quantity</label>

                                <div class=\"form-group\">
                                    <input type=\"text\" class=\"form-control\" placeholder=\"1\" name = 'amount'>
                                </div>
                            </div>
                        </div>
                        <button type=\"submit\" name=\"button\" class= \"btn btn-primary\" value = '$id'> ADD TO CART </button>
                        </form>
                    </div>";
                  ?>
                  </div>
                  <br>
                  <br>
                  <style>
                    .review-block{
                        background-color:#FAFAFA;
                        border:1px solid #EFEFEF;
                        padding:15px;
                        border-radius:3px;
                        margin-bottom:15px;
                    }
                    .review-block-name{
                        font-size:12px;
                        margin:10px 0;
                    }
                    .review-block-date{
                        font-size:12px;
                    }
                    .review-block-rate{
                        font-size:13px;
                        margin-bottom:15px;
                    }
                    .review-block-title{
                        font-size:15px;
                        font-weight:700;
                        margin-bottom:10px;
                    }
                    .review-block-description{
                        font-size:13px;
                    }
                    .checked {
                    color: orange;
                    }
                </style>
                    <div class="review-block">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                        <?php
                                            include "../admin/config.php";
                                            $sql_statement = "SELECT * FROM review r WHERE r.bID = $id";
                                            $result = mysqli_query($db, $sql_statement);
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                $userId = $row['uID'];
                                                $sql_statement = "SELECT * FROM users u WHERE u.uID = $userId";
                                                $result2 = mysqli_query($db, $sql_statement);
                                                $row2 = mysqli_fetch_assoc($result2);
                                                $name = $row2['name'] . " " . $row2['surname'];
                                                $rating = $row['rating'];
                                                $comment = $row['rcomment']; 
                                                echo "<hr/>
                                                <div class=\"row\">
                                                    <div class=\"col-sm-3\">
                                                        <div class=\"review-block-name\"><a>$name</a></div>
                                                    </div>
                                                    <div class=\"col-sm-9\">
                                                        <div class=\"review-block-rate\">";
                                                        for($x = 0; $x < $rating;$x++)
                                                        {
                                                            echo "<span class=\"fa fa-star checked\"></span>";
                                                        }
                                                        for($x = 0; $x <5- $rating;$x++)
                                                        {
                                                            echo "<span class=\"fa fa-star\"></span>";
                                                        }
                                                        echo "
                                                        </div>
                                                        <div class=\"review-block-description\">$comment</div>
                                                    </div>
                                                    
                                                </div>
                                                <hr/>";
                                            }
                            ?>
                    </div>
                    <br>
                    <br>
                    <h4>Leave a comment for this book</h4>

                    <div class="row">
                        <div class="col-md-8">
                            <form action="handleRating.php" id="comment" action="" method="post">
                                <div class="row">
                                <div class="col-lg-12">
                                    <fieldset>
                                    <textarea name="comment" rows="6" class="form-control" id="comment" placeholder="Your Message" required=""></textarea>
                                    </fieldset>
                                    <div class = "row">
                                        <div class = "col-sm-2"> 
                                            <p> Your Rating: </p>
                                        </div>
                                        <div class = "col-sm-1">
                                            <select class=" dropdown btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" name="rating">
                                                <option value='1'>1</option>
                                                <option value='2'>2</option>
                                                <option value='3'>3</option>
                                                <option value='4'>4</option>
                                                <option value='5'>5</option>
                                                <option value='5'>6</option>
                                                <option value='5'>7</option>
                                                <option value='5'>8</option>
                                                <option value='5'>9</option>
                                                <option value='5'>10</option>
                                            </select>
                                        </div>
                                        <div class = "col-sm-2">
                                            <?php
                                                $url= $_SERVER['REQUEST_URI'];  
                                                $url_components = parse_url($url);
                                                parse_str($url_components['query'], $params);
                                                $id = $params['book'];
                                                echo "<button type=\"submit\" name=\"button\" class= \"btn btn-primary\" value = \"$id\"> SUBMIT </button>"
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                
            </div>
        </section>
    </main>

    <?php include 'footer.php'?>
</body>
</html>
<!DOCTYPE html>
<html>

<?php include 'header.php'
// session_start();
// if (!isset($_SESSION['email']) && !isset($_SESSION['upassword'])) {
//       // redirect to your login page
//       exit();
// }
// $uid = $_SESSION['uID'];
?> 
    <section class="banner banner-secondary" id="top" style="background-image: url(img/26102.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Checkout</h2>
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
                    $uid = 40;
                    $sql_statement = "SELECT * FROM shoppinglist WHERE uID = '$uid'";
                    $result = mysqli_query($db, $sql_statement);
                    $outtaxprice = 0;        
                    while($row = mysqli_fetch_assoc($result))   
                    {
                         $Uid = $row['uID'];
                         $Bid = $row['bID'];
                         $amount = $row['amount'];
                         $sql_statement = "SELECT * FROM books WHERE bID = $Bid";
                         $result2 = mysqli_query($db, $sql_statement);
                         $row2 = mysqli_fetch_assoc($result2);
                         $price = $row2['bprice'];
                         $outtaxprice += $amount * $price;
                    }

                    $tax = (($outtaxprice * 8) / 100);
                    
                    //$_SESSION['totalprice'] = $total;

                    if($outtaxprice == 0)
                    {
                         $shipping = 0;
                    }
                    else 
                    {
                         $shipping = 5;     
                    }
                    $total = $outtaxprice + $tax + $shipping;
                    echo
                         "<div class=\"col-lg-4 col-md-5 pull-right\">
                              <ul class=\"list-group\">
                                   <li class=\"list-group-item\">
                                        <div class=\"row\">
                                             <div class=\"col-xs-6\">
                                                  <em>Sub-total</em>
                                             </div>

                                             <div class=\"col-xs-6 text-right\">
                                                  <strong>$ $outtaxprice</strong>
                                             </div>
                                        </div>
                                   </li>

                                   <li class=\"list-group-item\">
                                        <div class=\"row\">
                                             <div class=\"col-xs-6\">
                                                  <em>Tax (%8 KDV)</em>
                                             </div>

                                             <div class=\"col-xs-6 text-right\">
                                                  <strong>$ $tax</strong>
                                             </div>
                                        </div>
                                   </li>

                                   <li class=\"list-group-item\">
                                        <div class=\"row\">
                                             <div class=\"col-xs-6\">
                                                  <em>Shipping</em>
                                             </div>

                                             <div class=\"col-xs-6 text-right\">
                                                  <strong>$ $shipping</strong>
                                             </div>
                                        </div>
                                   </li>

                                   

                                   <li class=\"list-group-item\">
                                        <div class=\"row\">
                                             <div class=\"col-xs-6\">
                                                  <em>Total</em>
                                             </div>

                                             <div class=\"col-xs-6 text-right\">
                                                  <strong>$ $total</strong>
                                             </div>
                                        </div>
                                   </li>

                              </ul>
                         </div>";
                         ?>
                         <div class="col-lg-8 col-md-7">
                              
                                   <?php
                                        include "../admin/config.php";
                                        $uid = 40;
                                        $sql_statement = "SELECT * FROM shoppinglist WHERE uID = '$uid'";
                                        $result = mysqli_query($db, $sql_statement);
                                        if (mysqli_num_rows($result) != 0) 
                                        {
                                             echo "<h3>Shopping List</h3>";
                                        }
                                        echo "<tbody>";
                                        while($row = mysqli_fetch_assoc($result))   
                                        {
                                             $uid = $row['uID'];
                                             $bid = $row['bID'];
                                             $amount = $row['amount'];
                                             $sql_statement = "SELECT * FROM books WHERE bID = $bid";
                                             $result2 = mysqli_query($db, $sql_statement);
                                             $row2 = mysqli_fetch_assoc($result2);
                                             $price = $row2['bprice'];
                                             $title = $row2['btitle'];
                                             $outtaxprice = $amount * $price;
                                             echo "<tr>";
                                             echo "<th scope=“row”> $title - </th>";                                             
                                             echo "<td> $outtaxprice $</td>";
                                             echo "<tr/>";
                                        }
                                        echo "</tbody>";
                                   ?>
                              
                              <form action="checkoutHandler.php" method="POST">
                                   
                                   <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                             <h4>
                                                  You can enter your address, then you can buy your shopping list.
                                             </h4>
                                        </div>
                                   </div>

                                   <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                             <div class="form-group">
                                                  <label class="control-label">Address:</label>
                                                  <input type="text" class="form-control" id="address" name="address">
                                             </div>
                                        </div>                                        
                                   </div>                                   

                                   <div class="clearfix">
                                        <div class="blue-button pull-left">
                                             <a href="products.php">Back</a>
                                        </div>

                                        <div class="blue-button pull-right">
                                             <button type="submit" name="button" value="finish" class="btn btn-primary">Finish</button>
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
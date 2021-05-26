<?php 
session_start();
if (!isset($_SESSION['uID'])){
    exit();
}

?>
<!DOCTYPE html>
<html>
<style>
     #ozelbut {
  display: inline-block;
  background-color: #4883ff;
  color: #fff;
  font-size: 15px;
  font-weight: 500;
  padding: 10px 16px;
  text-decoration: none;
  border: 2px solid #4883ff;
  transition: all 0.5s;
}
</style>
<?php
include 'header.php'
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
                    
                    <?php
                    
                    include "../admin/config.php";
                

                    $uid = $_SESSION['uID'];
                    //$uid = 40;
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
                    
                    

                    if($outtaxprice == 0)
                    {
                         $shipping = 0;
                    }
                    else 
                    {
                         $shipping = 5;     
                    }
                    $total = $outtaxprice + $tax + $shipping;
                    //$_SESSION['totalprice'] = $total;
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
                                        //$uid = 40;
                                        $sql_statement = "SELECT * FROM shoppinglist WHERE uID = '$uid'";
                                        $result = mysqli_query($db, $sql_statement);  
                                        echo "
                                        <div class=\"row\">
                                        <div class=\"container py-5\">
                                             <div class=\"row text-center text-white mb-5\">
                                                  <div class=\"col-lg-7 mx-auto\">
                                                       <h1 class=\"display-4\">Shopping List</h1>
                                                  </div>
                                             </div>";                            
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
                                             $link = $row2['blinks'];
                                             $outtaxprice = $amount * $price;

                                             $sql_statement = "SELECT * FROM wrote WHERE bID = $bid";
                                             $result3 = mysqli_query($db, $sql_statement);
                                             $row3 = mysqli_fetch_assoc($result3);

                                             $aid = $row3['aID'];

                                             $sql_statement = "SELECT * FROM authors WHERE aID = $aid";
                                             $result4 = mysqli_query($db, $sql_statement);
                                             $row4 = mysqli_fetch_assoc($result4);

                                             $aname = $row4['aname'];
                                             $asurname = $row4['asurname'];
                                             echo 
                                             "
                                             <div class=\"col\">
                                                  <div class=\"col-lg-3 mx-auto\">
                                                       <!-- List group-->
                                                       <ul class=\"list-group shadow\">
                                                            <!-- list group item-->
                                                            <li class=\"list-group-item\">
                                                                 <!-- Custom content-->
                                                                 <div class=\"media align-items-lg-center flex-column flex-lg-row p-3\">
                                                                 <div class=\"media-body order-2 order-lg-1\">
                                                                      <h4 class=\"mt-0 font-weight-bold mb-2\"> $title </h4>
                                                                      <h6 class=\"mt-0 font-weight-bold mb-2\"> $aname $asurname </h6>
                                                                      <div class=\"d-flex align-items-center justify-content-between mt-1\">
                                                                           <h5 class=\"font-weight-bold my-2\">$ $price X $amount (amount)</h5>                                                                                
                                                                      </div>
                                                                 </div>
                                                                      <img src=\"$link\" alt=\"Generic placeholder image\" width=\"100\" length=\"100\" class=\"ml-lg-5 order-1 order-lg-2\">
                                                                      
                                                                      <form action=\"checkoutDelete.php\" method=\"POST\">
                                                                           <input type=\"hidden\" name=\"bid\" value=\"$bid\" />
                                                                           <label class=\"control-label\">Amount:</label>
                                                                           <input type=\"number\" class=\"form-control\" id=\"amount\" name=\"amount\" placeholder=\"Amount\" min=\"1\" max=\"$amount\">
                                                                           <button type=\"submit\" id=\"ozelbut\">Delete</button>
                                                                      </form>
                                                                      
                                                                 </div> <!-- End -->                                                                 
                                                            </li> <!-- End -->
                                                       </ul> <!-- End -->
                                                  </div>
                                             </div>";                                        
                                        }
                                        echo " 
                                             </div>
                                        </div>";
                                        
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
                                             <button type="submit" name="button" value="finish" id="ozelbut">Finish</button>
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
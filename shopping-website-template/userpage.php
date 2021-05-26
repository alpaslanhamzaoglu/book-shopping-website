<?php
    include '../shopping-website-template/header.php';
    include "config.php";
    $sql_statement = "SELECT email, name, surname FROM `users` WHERE uID=";
    $user_id = 40;
    $sql_statement = $sql_statement . $user_id;
    $result = mysqli_query($db, $sql_statement);
    while($row = mysqli_fetch_assoc($result)) {
    
    $name = $row['name'];
    $surname = $row['surname'];
    $email = $row['email'];
    }


?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="userpage.css">
<div class="all" style="background: linear-gradient(to right, #e96443, #904e95);">
<div class="row py-5 px-4">
    <div class="col-md-5 mx-auto">
        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden" >
            <div class="px-4 pt-0 pb-4 usercover" style=>
                <div class="media align-items-end profile-head">
                    <div class="profile mr-3"><img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" alt="..." width="130" class="rounded mb-2 img-thumbnail"></div>
                    <div class="media-body mb-5">
                        <?php
                         echo "<h4 >" . $name . " " . $surname .  "</h4>";
                        echo '<p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i>' . $email . '</p>'; 
                        
                        ?>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3">
                <h5 class="mb-0">Wishlist</h5>
                <div class="p-4 rounded shadow-sm bg-light">
                    <?php
                        $sql_statement = "SELECT * FROM `wishlist`, `books` WHERE wishlist.bID = books.bID AND uID =" . $user_id;
                        $result = mysqli_query($db, $sql_statement);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo '<p class="font-italic mb-0">' . $row['btitle'] . " (" . $row['bpublisher'] . ") " . '</p>';
                        }
                    ?>
                </div>
            </div>
            <div class="py-4 px-4">
            <h5 class="mb-0">Books you read so far</h5>
            <div class="p-4 rounded shadow-sm bg-light">
                    <?php
                        $sql_statement = "SELECT * FROM pastpurchases, includes_r2, includes_r1, books WHERE pastpurchases.pID = includes_r2.pID AND includes_r1.pID = includes_r2.pID AND books.bID = includes_r1.bID AND includes_r2.uID =" . $user_id;
                        $result = mysqli_query($db, $sql_statement);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo '<p class="font-italic mb-0">' . $row['btitle'] . " (" . $row['bpublisher'] . ") " . " bought at " . $row['pdate'] . '</p>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<style>
body {
    background: rgb(99, 39, 120)
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img src="img/logo-update.png" alt="Venue Logo"> <br> <span class="text-black-50">BookCrave Corporation by CS306</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="useredit.php" method="POST">
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels" >Name</label><input name="name" type="text" class="form-control" placeholder="first name" value=""></div>
                        <div class="col-md-6"><label class="labels" >Surname</label><input name="surname" type="text" class="form-control" value="" placeholder="surname"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email</label><input name="email" type="text" class="form-control" placeholder="enter email id" value=""></div>
                        <div class="col-md-12"><label class="labels" >Password</label><input  name="password" type="text" class="form-control" placeholder="password" value=""></div>
                    </div>
                    <input type="hidden" name="uID" value="<?php echo $user_id; ?>" />
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" type="button">Save Profile</button></div>
                </div>
            </form>
        </div>
        
        <div class="col-md-4">
            <div class="p-3 py-5">
            <h4 class="text-left">Your Wishlist</h4>
            <br>
                <?php
                     $sql_statement = "SELECT * FROM `wishlist`, `books` WHERE wishlist.bID = books.bID AND uID =" . $user_id;
                     $result = mysqli_query($db, $sql_statement);
                     while($row = mysqli_fetch_assoc($result)) {
                         echo '<div class="col-md-12"><label class="labels">' . $row['btitle'] . '</label></div>';
                         echo '<a href="/cs306-project/shopping-website-template/removefromwishlist.php?bID='. $row['bID'] . '&uID='. $user_id .'"><div class="d-flex justify-content-between align-items-center experience"><span class="border px-3 p-1 add-experience"><i class="fa fa-minus" href="/shopping-website-template/removefromwishlist.php"></i>&nbsp;Remove</span></div><br></a>';
                     }
                ?>  
                
                
            </div>
        </div>
    </div>
</div>
</div>
</div>""
<?php
    include '../shopping-website-template/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
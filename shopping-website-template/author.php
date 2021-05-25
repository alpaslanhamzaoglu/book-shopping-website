<?php
    include '../shopping-website-template/header.php';
    include "config.php";
    $sql_statement = "SELECT * FROM `authors` WHERE aID = ";
    $author_id = 28;
    $sql_statement = $sql_statement . $author_id;
    $result = mysqli_query($db, $sql_statement);
    while($row = mysqli_fetch_assoc($result)) {
    
    $name = $row['aname'];
    $surname = $row['asurname'];
    $email = $row['anationality'];
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
                <div class="py-4 px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="mb-0">Books I wrote</h5>
                </div>
                <div class="row">
                    <?php
                    
                    $sql_statement = 'SELECT * FROM books, authors, wrote WHERE wrote.aID=authors.aID AND books.bID = wrote.bID AND authors.aID=' . $author_id ;
                    
                    $result = mysqli_query($db, $sql_statement);

                    while($row = mysqli_fetch_assoc($result)) {

                        $image = $row['blinks'];
                        echo '<div class="col-lg-6 mb-2 pr-lg-1"><img src="' . $image . '"></div>';
                    }
                    
                    ?>
                </div>
            </div>
            </div>  
            </div>
        </div>
    </div>
</div>
</div>
<?php
    include '../shopping-website-template/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
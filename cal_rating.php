<?php
    include('connectdb.php');
    $id_r=$_POST['id_r'];
    $rating_count = $_POST['rating_count'];

    $rating=$_POST['rating'];
    $id=$_POST['id'];
    $og_rating=$_POST['og_rating'];
    if($og_rating!=0){

        $rating = ($rating + $og_rating)/2; 
    }
    $rating_count++;
    $q = "UPDATE tbl_book SET rating='$rating',rating_count='$rating_count' WHERE id='$id'";
    $result = mysqli_query($dbcon, $q);
     header( "location: detail_book.php?id=".$id_r );
?>

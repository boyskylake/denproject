<?php
    include('connectdb.php');

    $id = $_POST['id'];
    $b_name = $_POST['b_name'];
    $b_dcall = $_POST['b_dcall'];
    $b_author = $_POST['b_author'];
    $b_print = $_POST['b_print'];
    $b_imprint = $_POST['b_imprint'];
    $b_physical = $_POST['b_physical'];
    $b_heading = $_POST['b_heading'];
    $b_isbn = $_POST['b_isbn'];
    $b_briefly = $_POST['b_briefly'];
    $date = $_POST['date'];
    $type_id = $_POST['type_id'];

    $b_img1 = $_POST['b_img1'];
    $b_img2 = $_POST['b_img2'];
    $b_img3 = $_POST['b_img3'];

    $q = "UPDATE tbl_book SET b_name='$b_name',b_dcall='$b_dcall',b_author='$b_author',b_print='$b_print',b_imprint='$b_imprint',
          b_physical='$b_physical',b_heading='$b_heading',b_isbn='$b_isbn',b_briefly='$b_briefly',date='$date',type_id='$type_id' WHERE id='$id'";
    $result = mysqli_query($dbcon, $q);
    if ($result) {
        echo "<script>";
        echo "alert('บันทึกข้อมูลสำเร็จ');";
        echo "window.location = 'show_book_2.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('ไม่สามารถบันทึกข้อมูลได้ !');";
        echo "window.location = 'show_book_2.php';";
        echo "</script>";
    }


    // อันนี้แก้ไขตรงส่วนของรูปภาพ
if ($_FILES["b_img1"]["name"] != "") {
    if (move_uploaded_file($_FILES["b_img1"]["tmp_name"], "image/01/" . $_FILES["b_img1"]["name"])) {

        // ลบไฟล์เก่าออก
        @unlink("image/01/" . $_POST["old_file1"]);

        // แทนที่ด้วยไฟล์ใหม่
        $strSQL = "UPDATE tbl_book SET
          b_img1 = '" . $_FILES["b_img1"]["name"] . "'
          WHERE id = '" . $id . "'";
        $result = mysqli_query($dbcon, $strSQL);

        if ($result) {
            echo "<script>";
            echo "alert('บันทึกข้อมูลสำเร็จ');";
            echo "window.location = 'show_book_2.php';";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('ไม่สามารถบันทึกข้อมูลได้ !');";
            echo "window.location = 'show_book_2.php';";
            echo "</script>";
        }
    }
} if ($_FILES["b_img2"]["name"] != "") {
    if (move_uploaded_file($_FILES["b_img2"]["tmp_name"], "image/02/" . $_FILES["b_img2"]["name"])) {

        // ลบไฟล์เก่าออก
        @unlink("image/02/" . $_POST["old_file2"]);

        // แทนที่ด้วยไฟล์ใหม่
        $strSQL = "UPDATE tbl_book SET
        b_img2 = '" . $_FILES["b_img2"]["name"] . "'
        WHERE id = '" . $id . "'";
        $result = mysqli_query($dbcon, $strSQL);

        if ($result) {
            echo "<script>";
            echo "alert('บันทึกข้อมูลสำเร็จ');";
            echo "window.location = 'show_book_2.php';";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('ไม่สามารถบันทึกข้อมูลได้ !');";
            echo "window.location = 'show_book_2.php';";
            echo "</script>";
        }
    }
} if ($_FILES["b_img3"]["name"] != "") {
    if (move_uploaded_file($_FILES["b_img3"]["tmp_name"], "image/03/" . $_FILES["b_img3"]["name"])) {

        // ลบไฟล์เก่าออก
        @unlink("image/03/" . $_POST["old_file3"]);

        // แทนที่ด้วยไฟล์ใหม่
        $strSQL = "UPDATE tbl_book SET
        b_img3 = '" . $_FILES["b_img3"]["name"] . "'
        WHERE id = '" . $id . "'";
        $result = mysqli_query($dbcon, $strSQL);

        if ($result) {
            echo "<script>";
            echo "alert('บันทึกข้อมูลสำเร็จ');";
            echo "window.location = 'show_book_2.php';";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('ไม่สามารถบันทึกข้อมูลได้ !');";
            echo "window.location = 'show_book_2.php';";
            echo "</script>";
        }
    }
}

mysqli_close($dbcon);

?>

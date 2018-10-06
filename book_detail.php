<?php require_once('Connections/condb.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_showbook = "-1";
if (isset($_GET['id'])) {
  $colname_showbook = $_GET['id'];
}
mysql_select_db($database_condb, $condb);
$query_showbook = sprintf("SELECT * FROM tbl_book WHERE id = %s", GetSQLValueString($colname_showbook, "int"));
$showbook = mysql_query($query_showbook, $condb) or die(mysql_error());
$row_showbook = mysql_fetch_assoc($showbook);
$totalRows_showbook = mysql_num_rows($showbook);

//update book view
$id = $row_showbook['id'];
$p_view = $row_showbook['p_view'];
$count = $p_view + 1;

$sql= "UPDATE tbl_book SET  p_view=$count WHERE id = $id";
	mysql_db_query($database_condb,$sql);
//

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>รายละเอียดหนังสือ</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style media="screen">
    .checked {
          color: orange;
      }
      input[type=number]{
        width:40px;
        text-align:center;
        color:red;
        font-weight:600;

      }
    </style>

  </head>
  <body>
    <div class="container">
      <div class="row">
          <?php include('banner.php');?>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php include('navbar.php');?>
        </div>
      </div>
    </div>

          <!-- start show book detail -->
          <div class="container"><font style="font-family: 'Prompt', sans-serif;">
            <div class="row" align="left">
              <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="panel panel-info">
                  <div class="panel-heading">
                <!-- show book img -->
                <img src="image/01/<?php echo $row_showbook['b_img1']; ?>" width="100%" class="img-rounded"><br><br>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="glyphicon glyphicon-search"></span> ดูรูปภาพเพิ่มเติม</button>
              </div>
            </div>

          </div>

              <div class="col-xs-12 col-sm-8 col-md-9">
                <div class="panel panel-info">
                  <div class="panel-heading">
                        <!-- show book detail -->
                      <font color="#0000FF">ชื่อหนังสือ :</font>
                        <?php echo $row_showbook['b_name']; ?><br>
                      <font color="#0000FF">รหัสหนังสือ : </font>
                        <?php echo $row_showbook['b_dcall']; ?><br>
                      <font color="#0000FF">ผู้แต่ง : </font>
                        <?php echo $row_showbook['b_author']; ?><br>
                      <font color="#0000FF">ครั้งที่พิมพ์ : </font>
                        <?php echo $row_showbook['b_print']; ?><br>
                      <font color="#0000FF">พิมพลักษณ์ : </font>
                        <?php echo $row_showbook['b_imprint']; ?><br>
                      <font color="#0000FF">ลักษณะทางกายภาพ : </font>
                        <?php echo $row_showbook['b_physical']; ?><br>
                      <font color="#0000FF">หัวเรื่อง : </font>
                        <?php echo $row_showbook['b_heading']; ?><br>
                      <font color="#0000FF">ISBN : </font>
                        <?php echo $row_showbook['b_isbn']; ?><br>
                      <font color="#0000FF">รายละเอียด </font><br>
                        <?php echo $row_showbook['b_detail']; ?><br>
                      <font color="#0000FF">เนื้อหาสังเขป </font><br>
                        <?php echo $row_showbook['b_briefly']; ?><br>
                      <br>
            <?php
              for($i = 1;$i<=$row_showbook['rating'];$i++){ ?>
                <span class="fa fa-star checked"></span>
              <?php }
              $dropRating = 5-$row_showbook['rating'];
              for($i = 1;$i<=$dropRating;$i++){ ?>
                <span class="fa fa-star"></span>
              <?php } ?>
              <h5><font color="#0000FF">คะแนนรีวิว</font>
          <?php echo $row_showbook['rating']; ?>/5</h2><br>

          <form action="cal_rating.php" method="post">
          ให้คะแนน
          <input type="radio" name="rating" value="0" required> 0
          <input type="radio" name="rating" value="1" required> 1
          <input type="radio" name="rating" value="2" required> 2
          <input type="radio" name="rating" value="3" required> 3
          <input type="radio" name="rating" value="4" required> 4
          <input type="radio" name="rating" value="5" required> 5
          <input type="hidden" name="id" value="<?php echo $row_showbook['id']; ?>" >
          <input type="hidden" name="og_rating" value="<?php echo $row_showbook['rating']; ?>" >
          <button type="submit" class="btn btn-primary">ให้คะแนน</button>
          </form>
          <span class="glyphicon glyphicon-eye-open"></span>
          <span class="badge"><?php echo $row_showbook['p_view']; ?></span> ครั้ง <br>
          <p align="right">
          <!-- Go to www.addthis.com/dashboard to customize your tools -->
          <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5500ee80057fdb99"></script>
          <!-- Go to www.addthis.com/dashboard to customize your tools -->
          <div class="addthis_inline_share_toolbox_r64r"></div>
          </p>
        </div>
      </div>
          </div>
        </div>
      </div></font>
          <!-- end show book detail -->



    <div class="container"><font style="font-family: 'Prompt', sans-serif;">
      <div class="row">
        <div class="col-md-12">
          <h1>เพิ่มบทวิเคราะห์</h1>
          <h3><a href="#" class="btn btn-success">เพิ่มบทวิเคราะห์</a></h3>
          <hr>
        </div>
      </div>
    </div>

      <!-- Large modal -->


      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">

              <div class="row">
                <div class="col-md-12">
                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                      <div class="item active" align="center">
                        <img src="image/01/<?php echo $row_showbook['b_img1']; ?>" width="40%" class="img-rounded">
                      </div>
                      <div class="item" align="center">
                        <img src="image/02/<?php echo $row_showbook['b_img2']; ?>" width="40%" class="img-rounded">
                      </div>
                      <div class="item" align="center">
                        <img src="image/03/<?php echo $row_showbook['b_img3']; ?>" width="40%" class="img-rounded">
                      </div>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

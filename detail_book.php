<?php
  session_start();
  if(!isset($_SESSION['id'])) $login_c = 0;
      else $login_c = 1;
  ?>
<?php
    include('connectdb.php');
    include('session.php');

    $id = $_GET['id'];
    $id_rating = $id;
    $sql = "SELECT * FROM tbl_book WHERE id='$id'";
    $result = mysqli_query($dbcon, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    //update book view
    $id = $row['id'];
    $p_view = $row['p_view'];
    $count = $p_view + 1;

    $sql= "UPDATE tbl_book SET  p_view=$count WHERE id='$id'";
    $result = mysqli_query($dbcon, $sql);
    //
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Prompt:300" rel="stylesheet">

    <style media="screen">
    /* body{
            background-color: #f8f9f1;
        } */
    .checked {
          color: orange;
      }
      input[type=number]{
        width:40px;
        text-align:center;
        color:red;
        font-weight:600;

      }
      .container{
        font-family: 'Prompt', sans-serif;
        font-size: 16px;
      }
      p#p1{
            background-color: gray;
            font-size: 25px;
        }
        body {
            background-color: lightblue;
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

    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
          <div class="panel panel-primary">
            <div class="panel-body">
              <div class="thumbnail">
                <img src="image/01/<?php echo $row['b_img1']; ?>" width="100%" class="img-rounded">
              </div>
              <div class="form-grup">
                  <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="glyphicon glyphicon-search"></span> ดูรูปภาพเพิ่มเติม</button>
              </div>
            </div>
          </div>
        </div>
          <div class="col-xs-12 col-sm-8 col-md-9">
            <div class="panel panel-primary">
              <div class="panel-body">
                <font color="#0000FF">ชื่อหนังสือ :</font>
                  <?php echo $row['b_name']; ?><br>
                  <font color="#0000FF">Dewey Call # : </font>
                    <?php echo $row['b_dcall']; ?><br>
                  <font color="#0000FF">ผู้แต่ง : </font>
                    <?php echo $row['b_author']; ?><br>
                  <font color="#0000FF">ครั้งที่พิมพ์ : </font>
                    <?php echo $row['b_print']; ?><br>
                  <font color="#0000FF">พิมพลักษณ์ : </font>
                    <?php echo $row['b_imprint']; ?><br>
                  <font color="#0000FF">ลักษณะทางกายภาพ : </font>
                    <?php echo $row['b_physical']; ?><br>
                  <font color="#0000FF">หัวเรื่อง : </font>
                    <?php echo $row['b_heading']; ?><br>
                  <font color="#0000FF">ISBN : </font>
                    <?php echo $row['b_isbn']; ?><br>

                    <?php
                      for($i = 1;$i<=$row['rating'];$i++){ ?>
                        <span class="fa fa-star checked"></span>
                      <?php }
                      $dropRating = 5-$row['rating'];
                      for($i = 1;$i<=$dropRating;$i++){ ?>
                        <span class="fa fa-star"></span>
                      <?php } ?>
                      <h5><font color="#0000FF">คะแนนรีวิว</font>
                  <?php echo $row['rating']; ?>/5</h2><br>

                    <form action="cal_rating.php" method="post">
                    ให้คะแนน
                    <input type="radio" name="rating" value="0" required> 0
                    <input type="radio" name="rating" value="1" required> 1
                    <input type="radio" name="rating" value="2" required> 2
                    <input type="radio" name="rating" value="3" required> 3
                    <input type="radio" name="rating" value="4" required> 4
                    <input type="radio" name="rating" value="5" required> 5
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
                    <input type="hidden" name="og_rating" value="<?php echo $row['rating']; ?>" >
                    <input type="hidden" name="id_r" value="<?php echo $id_rating; ?>">
                    <input type="hidden" name="rating_count" value="<?php echo $row['rating_count']; ?>">
                    <button type="submit" class="btn btn-primary">ให้คะแนน</button>
                    </form>

                    <span class="glyphicon glyphicon-eye-open"></span>
                    <span class="badge"><?php echo $row['p_view']; ?></span> ครั้ง <br>
                    <div class="col-md-12">
                      <hr>
                    </div>
              </div>
            </div>
            <div class="panel panel-primary">
              <div class="panel-body">
                <div class="col-md-12">
                  <p id="p1" class="text-center">เนื้อหาสังเขป</p>
                  <p><?php echo $row['b_briefly']; ?></p>
                </div>
              </div>
            </div>




          <!-- Go to www.addthis.com/dashboard to customize your tools -->
          <!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b117b1a825c097f"></script> -->
        </div>
      </div>
    </div>
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
                        <img src="image/01/<?php echo $row['b_img1']; ?>" width="40%" class="img-rounded thumbnail">
                      </div>
                      <div class="item" align="center">
                        <img src="image/02/<?php echo $row['b_img2']; ?>" width="40%" class="img-rounded thumbnail">
                      </div>
                      <div class="item" align="center">
                        <img src="image/03/<?php echo $row['b_img3']; ?>" width="40%" class="img-rounded thumbnail">
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

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php if($login_c == 1){ ?>
          <h3>เพิ่มบทวิเคราะห์</h3>
          <a href="comment.php?id=<?php echo $row['id']; ?>&<?php echo $row['b_name']; ?>" class="btn btn-success">เพิ่มบทวิเคราะห์</a>
        <?php }else { ?>
          <h3>เพิ่มบทวิเคราะห์</h3>
          <button type="button" disabled name="button" class="btn btn-success">เพิ่มบทวิเคราะห์</button>
          <p>
            หากต้องการเพิ่มบทวิเคราะห์กรุณาเข้าสู่ระบบก่อน
            <a href="login.php" class="btn btn-primary">เข้าสู่ระบบ</a>
          </p>
        <?php } ?>

        </div>



      </div>
    </div>

    <div class="container">
      <!-- <div class="col-md-12"> -->
        <div class="panel panel-primary">
          <div class="panel-body">
            <h3 class="text-center">บทวิเคราะห์</h3>
            <!-- <div  align="center"> -->
            <?php
            $sqlcom = "SELECT * FROM `comment` WHERE c_id_book = '$id' ORDER BY `c_date` DESC";
            $rescom = mysqli_query($dbcon, $sqlcom);

              while ($a = mysqli_fetch_array($rescom)) {
            ?>
            <div class="col-md-12 ">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><?php echo $a['c_name']; ?></h3>
              </div>
              <div class="panel-body">
                <?php echo $a['c_detail']; ?>
              </div>
            </div>
            </div>
            <?php
              }
             ?>

          <!-- </div> -->

          </div>
        </div>
      <!-- </div> -->
    </div>

    <div class="container">
      <div class="row">
        <?php include('footer.php');?>
      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

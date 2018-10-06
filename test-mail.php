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

  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>ทดสอบส่ง E-mail</h3>
          <hr>
          <form class="" action="sendmail.php" method="post">
            <div class="form-group">
              <label>ชื่อผู้ส่ง :</label>
              <input type="text" name="name" value="">
            </div>
            <div class="form-group">
              <label>E-mail :</label>
              <input type="email" name="email" value="">
            </div>
            <div class="form-group">
              <label>รายละเอียด :</label>
              <textarea name="detail" cols="42" rows="6" required></textarea>
            </div>
            <div class="form-group">
              <input type="submit" name="submit" class="btn btn-info" value="ยืนยัน">
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

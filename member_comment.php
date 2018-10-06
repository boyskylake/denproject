<?php
  session_start();
  include('connectdb.php');
  include('session.php');

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
    <link href="https://fonts.googleapis.com/css?family=Prompt:300" rel="stylesheet">
    <style media="screen">
      .container{
        font-family: 'Prompt', sans-serif;
      }
      th{
        background-color: #12B3EB;
      }
      td{
        background-color: #DBF9BA;
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
          <?php include('navbar_admin.php');?>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center">สถิติสมาชิกที่เข้ามารีวิว 3 อันดับ</h3>
          <hr>
          <table class="table table-bordered">
            <tr>
              <th class="text-center">ลำดับที่</th>
              <th class="text-center">ชื่อสมาชิก</th>
              <th class="text-center">จำนวนการรีวิว / ครั้ง</th>
            </tr>
            <?php
            $sql = "SELECT `c_id`,`c_name`,COUNT(`c_name`) AS numview FROM `comment` GROUP BY (`c_name`) ORDER BY `numview` DESC";
            $query = mysqli_query($dbcon, $sql);
            $intnum = 1;
            while ($res = mysqli_fetch_array($query)) {
             ?>
            <tr>
               <td class="text-center"><?php echo $intnum; ?></td>
               <td class="text-center"><?php echo $res['c_name']; ?></td>
              <td class="text-center"><?php echo $res['numview']; ?></td>
            </tr>

            <?php
            $intnum++;
              }
            ?>
          </table>
        </div>

        <div class="col-md-12" id="barchart"></div>

      </div>
    </div>

    <?php
      $query = "SELECT `c_name`,COUNT(`c_name`) AS numview FROM `comment` GROUP BY (`c_name`) ORDER BY `numview` DESC LIMIT 0,3";
      $res_c = $dbcon->query($query);

      if (!$res_c) {
          die('<p><strong style="color:#FF0000">!! Invalid query:</strong> ' . $dbcon->error.'</p>');
      }
    ?>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
    $(function () {
        $('#barchart').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'กราฟแสดงสถิติสมาชิกที่เข้ามารีวิว 3 อันดับ'
            },
    /*        subtitle: {
                text: ''
            },*/
            xAxis: {
                categories: [
       <?php
       $c_field = $res_c->field_count-1;
        $c=0; while($row = $res_c->fetch_array(MYSQLI_NUM)){ $c++; ?>
       <?php if($c>1){ ?>,<?php }
       $data[] = $row[$c_field];
       ?>
                    '<?php echo htmlspecialchars(addslashes(str_replace("\t","",str_replace("\n","",str_replace("\r","",$row[0]))))); ?>'
       <?php } ?>
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Values'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:,.0f} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
        dataLabels: {
         enabled: true
        }
       }
            },
      credits: {
       enabled: false
      },
            series: [{
                name: 'Values',
                data: [<?php echo join(',',$data); ?>]

            }]
        });
    });
    </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

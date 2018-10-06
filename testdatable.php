<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>



	<title></title>
	<script>

$(document).ready(function() {
    $('#example').DataTable();
} );

	</script>

  <style type="text/css">
      input[type=number]{
        width:40px;
        text-align:center;
        color:red;
        font-weight:600;
      }
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
<table id="example" class="display table table-bordered">
   <!--ส่วนหัว-->
   <thead>
            <tr>
            	<th class="text-center">ลำดับ</th>
                <th class="text-center">ชื่อ</th>
                <th class="text-center">สกุล</th>
                <th class="text-center">ตำแหน่ง</th>
                <th class="text-center">อายุ</th>

            </tr>
    </thead>

 <!-- ส่วนท้าย -->
    <!-- <tfoot>
            <tr>
               <th>ลำดับ</th>
                <th>ชื่อ</th>
                <th>สกุล</th>
                <th>ตำแหน่ง</th>
                <th>อายุ</th>
            </tr>
        </tfoot> -->
 <!--ส่วนเนื้อหา -->
  	<tbody>
            <tr>
            	<td align="center">1</td>
                <td>พิศิษฐ์1</td>
                <td>devbanban</td>
                <td>Programmer</td>
                <td>28</td>
            </tr>
            <tr>
            	<td align="center">2</td>
                <td>พิศิษฐ์2</td>
                <td>devbanban</td>
                <td>Programmer</td>
                <td>28</td>
            </tr>
            <tr>
            	<td align="center">3</td>
                <td>พิศิษฐ์3</td>
                <td>devbanban</td>
                <td>Programmer</td>
                <td>28</td>
            </tr>
            <tr>
            	<td align="center">4</td>
                <td>พิศิษฐ์4</td>
                <td>devbanban</td>
                <td>Programmer</td>
                <td>28</td>
            </tr>
            <tr>
            	<td align="center">5</td>
                <td>พิศิษฐ์5</td>
                <td>devbanban</td>
                <td>Programmer</td>
                <td>28</td>
            </tr>
            <tr>
            	<td align="center">6</td>
                <td>พิศิษฐ์6</td>
                <td>devbanban</td>
                <td>Programmer</td>
                <td>28</td>
            </tr>
            <tr>
            	<td align="center">7</td>
                <td>พิศิษฐ์7</td>
                <td>devbanban</td>
                <td>Programmer</td>
                <td>28</td>
            </tr>
            <tr>
            	<td align="center">8</td>
                <td>พิศิษฐ์8</td>
                <td>devbanban</td>
                <td>Programmer</td>
                <td>28</td>
            </tr>
            <tr>
            	<td align="center">9</td>
                <td>พิศิษฐ์9</td>
                <td>devbanban</td>
                <td>Programmer</td>
                <td>28</td>
            </tr>
            <tr>
            	<td align="center">10</td>
                <td>พิศิษฐ์10</td>
                <td>devbanban</td>
                <td>Programmer</td>
                <td>28</td>
            </tr>
            <tr>
            	<td align="center">11</td>
                <td>พิศิษฐ์11</td>
                <td>devbanban</td>
                <td>Programmer</td>
                <td>28</td>
            </tr>
            <tr>
            	<td align="center">12</td>
                <td>พิศิษฐ์12</td>
                <td>devbanban</td>
                <td>Programmer</td>
                <td>28</td>
            </tr>
            <tr>
            	<td align="center">13</td>
                <td>พิศิษฐ์13</td>
                <td>devbanban</td>
                <td>Programmer</td>
                <td>28</td>
            </tr>
            <tr>
            	<td align="center">14</td>
                <td>พิศิษฐ์14</td>
                <td>devbanban</td>
                <td>Programmer</td>
                <td>28</td>
            </tr>
            <tr>
            	<td align="center">15</td>
                <td>พิศิษฐ์15</td>
                <td>devbanban</td>
                <td>Programmer</td>
                <td>28</td>
            </tr>
      </tbody>

    </table>

    <!-- <script src="js/jquery-3.3.1.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

 <!--
  reference : https://datatables.net/examples/basic_init/zero_configuration.html

  -->

<?php
    include('connectdb.php');
    $sql = "SELECT * FROM tbl_book";
    // $result = mysqli_query($dbcon, $sql);
              if (isset($_GET['type'])) {
                $p = $_GET['type'];
                $sql = "SELECT * FROM tbl_book WHERE type_id LIKE '$p'";
              }
              elseif (isset($_POST['pro_search']))
              {
                $pro_search = $_POST['pro_search'];
                $p = '%'.$pro_search.'%';
                $sql = "SELECT * FROM tbl_book WHERE b_name LIKE '$p'";
              }
          $result = mysqli_query($dbcon, $sql);
          $Num_Rows = mysqli_num_rows($result);

            $Per_Page = 3;   // Per Page
             if (isset($_GET["Page"])) {
               $Page = $_GET["Page"];
             }
             if(!isset($_GET["Page"]))
             {
               $Page=1;
             }
             $Prev_Page = $Page-1;
             $Next_Page = $Page+1;
             $Page_Start = (($Per_Page*$Page)-$Per_Page);
             if($Num_Rows<=$Per_Page)
             {
               $Num_Pages =1;
             }
             else if(($Num_Rows % $Per_Page)==0)
             {
               $Num_Pages =($Num_Rows/$Per_Page) ;
             }
             else
             {
               $Num_Pages =($Num_Rows/$Per_Page)+1;
               $Num_Pages = (int)$Num_Pages;
             }
             $sql.=" order  by id desc LIMIT $Page_Start , $Per_Page";
             // $queryCat  = mysqli_query($conn,$sqlCat);
             echo"<table>";
             $intRows = 0;

              $result = mysqli_query($dbcon, $sql);

           ?>
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
             body {
                 background-color: lightblue;
             }
           </style>
             <div class="panel panel-info">
               <div class="panel-heading">
                 <div class="form-group text-right">
                   <form class="" action="index.php" method="post">
                     <label>ค้นหาหนังสือ :</label>
                     <input type="text" name="pro_search" value="" autocomplete="off">
                     <input type="submit" name="submit" class="btn btn-info btn-xs" value="ค้นหา">
                   </form>
                 </div>
               </div>
             </div>

              <div>
                   <?php
                   if ($result->num_rows > 0) {
                   while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                     $intRows++;
                    ?>
                   <tr>
                     <div class="col-sm-4" align="center">
                     <div align="center">
                       <div class="thumbnail">
                         <a href="detail_book.php?id=<?php echo $row['id']; ?>">
                           <img src="image/01/<?php echo $row['b_img1']; ?>" width="80%" style="padding-bottom:20px" class="img-thumbnail"/>
                         </a>
                         <div class="caption">
                           <p>
                           <?php
                             for($i = 1;$i<=$row['rating'];$i++){ ?>
                           <span class="fa fa-star checked"></span>
                           <?php }
                             $dropRating = 5-$row['rating'];
                             for($i = 1;$i<=$dropRating;$i++){ ?>
                           <span class="fa fa-star"></span>
                           <?php } ?>
                           <br>
                         </p>

                             <p><?php echo $row['b_name']; ?></p>
                         </div>
                         <p>
                           <a href="detail_book.php?id=<?php echo $row['id']; ?>&<?php echo $row['b_name']; ?>" id="detail" class=" form-control btn btn-info btn-xs"><span class="glyphicon glyphicon-search"></span> ดูรายละเอียด</a>
                         </p>
                         </div>
                       </div>
                     <!-- Go to www.addthis.com/dashboard to customize your tools -->
                     <!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b117b1a825c097f"></script> -->
                   </div>
                   <!-- </tr> -->
                 <?php }
                 if(($intRows)%3==0)
                  {
                    echo"</tr>";
                  }
                  echo"</tr></table>";

                     }else {
                       echo "
                       <div align='center'>
                        <h2>  ไม่มีข้อมูล </h2>
                       </div>
                       </div>";
                     }
              echo "</div>";
                     echo "<br>";
                     echo "<br>";
                     echo "<br>";
                     echo "<div align='center'>";

          if($Prev_Page)
          {
            echo "";
            echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page' title='กลับ'><< Back</a> ";
          }
          for($i=1; $i<=$Num_Pages; $i++){
            if($i != $Page)
            {
                echo "";
              echo "[<a href='$_SERVER[SCRIPT_NAME]?Page=$i' >$i</a>]";
            }
            else
            {
                echo "";
              echo "<b> หน้า $i </b>";
            }
          }
          if($Page!=$Num_Pages)
          {
            echo "";
            echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page' title='ถัดไป'>Next>></a> ";
          }
          echo "</div>";
          ?>

             <!-- </table> -->
          <!-- </div> -->
        <!-- </div> -->

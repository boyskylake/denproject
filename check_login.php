<?php require_once('Connections/condb.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);

  $logoutGoTo = "login_member.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "1,2";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) {
  // For security, start by assuming the visitor is NOT authorized.
  $isValid = False;

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username.
  // Therefore, we know that a user is NOT logged in if that Session variable is blank.
  if (!empty($UserName)) {
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login.
    // Parse the strings into arrays.
    $arrUsers = Explode(",", $strUsers);
    $arrGroups = Explode(",", $strGroups);
    if (in_array($UserName, $arrUsers)) {
      $isValid = true;
    }
    // Or, you may restrict access to only certain users based on their username.
    if (in_array($UserGroup, $arrGroups)) {
      $isValid = true;
    }
    if (($strUsers == "") && false) {
      $isValid = true;
    }
  }
  return $isValid;
}

$MM_restrictGoTo = "login_member.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0)
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo);
  exit;
}
?>
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

$colname_showmember = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_showmember = $_SESSION['MM_Username'];
}
mysql_select_db($database_condb, $condb);
$query_showmember = sprintf("SELECT * FROM member WHERE username = %s", GetSQLValueString($colname_showmember, "text"));
$showmember = mysql_query($query_showmember, $condb) or die(mysql_error());
$row_showmember = mysql_fetch_assoc($showmember);
$totalRows_showmember = mysql_num_rows($showmember);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>check</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


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
    </style>

  </head>
<body>
  <div class="container">
    <div class="row">
        <?php include('banner.php');?>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php include('navbar_check.php');?>
      </div>
    </div>
  </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h4>ยินดีต้อนรับ คุณ : <?php echo $row_showmember['name']; ?></h4>
              <hr>
            </div>
          </div>
          <div class="container">
          	<div class="row">
            	<div class="col-md-3">
                <?php
					$level = $row_showmember['m_level'];
					if($level == 1){ ?>
                   	<div class="list-group">
                      <a href="#" class="list-group-item active">Admin</a>
                      <a href="admin_member.php" class="list-group-item">จัดการ admin และ บรรณารักษ์</a>
                      <a href="member.php" class="list-group-item">จัดการข้อมูลสมาชิก</a>
                      <a href="#" class="list-group-item">จัดการสถิติสมาชิกที่มารีวิว</a>
                      <a href="<?php echo $logoutAction ?>" class="list-group-item">ออกจากระบบ</a>
                    </div>

					<?php }elseif($level == 2) { ?>
                    <div class="list-group">
                      <a href="#" class="list-group-item active">สำหรับบรรณารักษ์</a>
                      <a href="show_book_2.php" class="list-group-item">จัดการข้อมูลหนังสือ</a>
                      <a href="show_rating.php" class="list-group-item">ดูข้อมูล Rating</a>
                      <a href="#" class="list-group-item">แจ้งเตือนสมาชิก</a>
                      <a href="<?php echo $logoutAction ?>" class="list-group-item">ออกจากระบบ</a>
                    </div>
                  <?php }else{}  ?>

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
<?php
mysql_free_result($showmember);
?>

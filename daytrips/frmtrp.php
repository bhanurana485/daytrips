<?php
session_start();
include_once 'buslogic.php';
if(isset($_REQUEST["ccod"]))
{
    $_SESSION["ccod"]=$_REQUEST["ccod"];
}
if(isset($_POST["btnsub"]))
{
    $obj=new clstrp();
    $obj->trptit=$_POST["txttit"];
    $obj->trpregcod=$_SESSION["cod"];
    $obj->trpmanpiccod=0;
    $obj->trploccod=$_POST["drploc"];
    $obj->trplik=0;
    $obj->trpdsc=$_POST["txtdsc"];
    $obj->trpdat=date('y-m-d');
    $obj->trpcst=$_POST["txtcst"];
    $obj->save_rec();
    header("location:frmmytrp.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title> Day Trip </title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Oswald:300,400,700' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>
document.createElement("article");
document.createElement("aside");
document.createElement("audio");
document.createElement("canvas");
document.createElement("command");
document.createElement("datalist");
document.createElement("details");
document.createElement("embed");
document.createElement("figcaption");
document.createElement("figure");
document.createElement("footer");
document.createElement("header");
document.createElement("hgroup");
document.createElement("keygen");
document.createElement("mark");
document.createElement("meter");
document.createElement("nav");
document.createElement("output");
document.createElement("progress");
document.createElement("rp");
document.createElement("rt");
document.createElement("ruby");
document.createElement("section");
document.createElement("source");
document.createElement("summary");
document.createElement("time");
document.createElement("video");
</script>
<script language="javascript">
    function abc(a)
    {
        window.location="frmtrp.php?ccod="+a;
    }
    function xyz()
    {
        
     var a=document.getElementById('txttit').value;
    var b=document.getElementById('txtcst').value;
     var c=document.getElementById('txtdesc').value;
     
     if (a=='')
     {
       alert ("please enter Title ");
       return false;
   }
   else if(b=='')
   {
   alert("please enter cost");
   return false;
   }
   else if(c=='')
   {
   alert("please enter description");
   return false;
   }
  
    }
</script>
</head>
<body>
<!-- wrapper start -->
<div id="wrapper">
<header>
<div id="wrapper">
<header>
<div class="topbar">
<div class="container">
<div class="row">
<div class="col-sm-6">


</div>
<div class="col-sm-6 pull-right">

</div>
</div>
</div>
</div>
<div class="menus-bar">
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="images/logo.png" alt=""></a>
    </div>


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active">
      <a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="frmsrctrp.php">Search Trips</a></li>
         <?php    
        if(isset($_SESSION["cod"]))
        {
            echo "<li><a href=frmtrp.php >Add New Trip</a></li>";
            echo "<li><a href=frmmytrp.php >My Trips</a></li>";
            echo "<li><a href=index.php?sts=s >Logout</a></li>";
        }
        else
        {
           echo "<li><a href=frmreg.php >Register</a></li>"; 
           echo "<li><a href=frmlog.php >Login</a></li>";
        }
        ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</div>
</header>
<div class="mid-container">
    <div class="container">
    <form name="frmtrp" method="Post" action="frmtrp.php" onsubmit="return xyz()" >
    <h3>Trip Details</h3>
    <table width="100%">
        <tr>
            <td>Select City</td>
            <td>
                <select name="drpcty" onchange="abc(this.value);">
     <?php
     $obj=new clscty();
     $arr=$obj->disp_rec();
     for($i=0;$i<count($arr);$i++)
     {
 if(isset($_SESSION["ccod"]) && $_SESSION["ccod"]==$arr[$i][0])
   echo "<option value=".$arr[$i][0]." selected />".$arr[$i][1]; 
 else
  echo "<option value=".$arr[$i][0]." />".$arr[$i][1];
     }
     ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Select Location</td>
            <td>
                <select name="drploc">
        <?php
          if(isset($_SESSION["ccod"]))   
          {
              $obj=new clsloc();
              $arr=$obj->disp_rec($_SESSION["ccod"]);
              for($i=0;$i<count($arr);$i++)
              {
    echo "<option value=".$arr[$i][0]." />".$arr[$i][1];
              }
          }
        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Trip Title</td>
            <td>
                <input type="text" name="txttit" id="txttit" />
            </td>
        </tr>
        <tr>
            <td>Trip Cost</td>
            <td>
                <input type="text" name="txtcst" id="txtcst" />
            </td>
        </tr>
        <tr>
            <td>Trip Description</td>
            <td>
                <textarea name="txtdsc" rows="7" cols="70" id="txtdesc" ></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="Submit" name="btnsub" value="Submit"  />
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input type="reset" name="btncan" value="Cancel"/>
            </td>
        </tr>
    </table>
</form>
    </div>
<footer>

  <div class="footer-bottom">
    <div class="container">
      <div class="copy-right">
        <p>Copyright &copy; 2015-2016 day trip Inc. All Rights Reserved </p>
      </div>
    </div>
  </div>
</footer>
</div>
</div>
<!-- wrapper closed -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

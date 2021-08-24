<?php
session_start();
include_once 'buslogic.php';
if(isset($_REQUEST["pcod"]))
{
    $obj=new clstrppic();
    $obj->trppiccod=$_REQUEST["pcod"];
    $obj->delete_rec();
}
if(isset($_REQUEST["qcod"]))
{
    $obj=new clstrp();
    $obj->updtrpmanpic($_SESSION["tcod"], $_REQUEST["qcod"]);
    header("location:frmmytrp.php");
}
if(isset($_REQUEST["tcod"]))
{
    $_SESSION["tcod"]=$_REQUEST["tcod"];
}
if(isset($_POST["btnsub"]))
{
    $obj=new clstrppic();
    $obj->trppicdsc=$_POST["txtdsc"];
    $obj->trppictrpcod=$_SESSION["tcod"];
    $obj->trppicfil=$_FILES["filupl"]["name"];
    $obj->save_rec();
    move_uploaded_file($_FILES["filupl"]["tmp_name"],
         "trppic/".$_FILES["filupl"]["name"]);
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
<script>
   function abc()
   {
         var c=document.getElementById('txtdesc').value;
    if(c=='')
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
      <a href="index.php">Home </a></li>
        
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


<div class="cboth-padd">
  <div class="price-section app-sec">
    <div class="Contact">
        <h1>
            <?php
       if(isset($_SESSION["tcod"]))
       {
           $obj=new clstrp();
           $obj->find_rec($_SESSION["tcod"]);
           echo $obj->trptit;
       }
            ?>
        </h1>
        <div class='container'>
        <form class="form-signin uplodform" name="frmuplpic" method="Post" action="frmuplpic.php" enctype="multipart/form-data" onsubmit="return abc()">
            <table width="100%">
                <tr>
                <td>Browse Picture</td>
                <td>
                    <input type="file" name="filupl"/>
                </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="txtdsc" id="txtdesc" rows="4" cols="50"></textarea>                    
</td>
                </tr>
                <tr>
                    <td></td>
                    <td>
        <input type="Submit" name="btnsub" value="Submit"/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" name="btncan" value="Cancel"/>
                    </td>
                </tr>
            </table>
 <?php
   if(isset($_SESSION["tcod"]))         
   {
       $obj1=new clstrppic();
       $arr1=$obj1->disp_rec($_SESSION["tcod"]);
       echo "<table class=upload1 width=100% >";
       for($i=0;$i<count($arr1);$i++)
       {
           if($i==0 || $i%3==0)
               echo "<tr>";
           echo "<td><img src=trppic/".$arr1[$i][2]." height=150px width=150px />";
           echo "<br>".$arr1[$i][3]."</br> </br>";
           echo "<a class=upload href=frmuplpic.php?pcod=".$arr1[$i][0]." >Delete</a>  ";
           echo "<a class=upload href=frmuplpic.php?qcod=".$arr1[$i][0]." >Set as main picture</a></td>";
           
           if($i!=0 && $i%2==0)
               echo "</tr>";
       }
       echo "</table>";
   }
 ?>
      </form>
      
         </div>
      
      
    </div>
   
  </div>
</div>










<footer>
  <div class="container both-padd">
    <div class="row modules">
      <section class="block blockcms_footer col-sm-2">
        <h4 class="toggle">Information<i class="icon-plus-sign"></i></h4>
        <ul class="list-footer toggle_content clearfix">
          <li class="item"><a href="contact.html" title="Contact us">Contact us</a></li>
        </ul>
      </section>
      <section class="block blockmyaccountfooter col-sm-4">
        <h4>About US<i class="icon-plus-sign"></i></h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aut dignissimos ea est, impedit incidunt, laboriosam maxime molestias numquam odio officiis, possimus quo rem. </p>
      </section>
      <section class="block blocksocial col-sm-3">
        <h4>Follow us<i class="icon-plus-sign"></i></h4>
        <ul class="toggle_content">
          <li class="facebook"><a href="#"><i class="fa fa-facebook-square"></i> Facebook</a></li>
          <li class="twitter"><a href="#"><i class="fa fa-twitter-square"></i> Twitter</a></li>
          <li class="rss"><a href="#"><i class="fa fa-rss-square"></i> RSS </a></li>
        </ul>
      </section>
      <section id="newsletter_block_left" class="block products_block column_box col-sm-3">
        <h4> <span> Newsletter</span><i class="column_icon_toggle icon-plus-sign"></i></h4>
        <div class="block_content toggle_content">
          <form action="" method="post">
            <div class="input-group">
              <input type="email" class="inputNew form-control form-group" id="newsletter-input" name="email" size="18" value="Your email address">
              <span class="input-group-btn">
              <button type="submit" class="btn btn-default" name="submitNewsletter">ok</button>
              </span>
              <input type="hidden" name="action" value="0">
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
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

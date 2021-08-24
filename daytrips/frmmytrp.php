<?php
session_start();
include_once 'buslogic.php';

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
<div class="my-trip-cont">

<div class="cboth-padd">
    
  <div class="price-section app-sec">
       <div class="container">
    <div class="Contact tworows">
      <h1>My Trips</h1>
      <form class="" name="frmmytrp" method="Post" action="frmmytrp.php">
     <?php
      if(isset($_SESSION["cod"]))    
      {
          $obj=new clstrp();
          $arr=$obj->dspmytrp($_SESSION["cod"]);
          //trpcod,trpdat,trplik,locnam,ctynam,trpcst,trptit,pic 
       if(count($arr)>0)
           echo "<table class=trip-tbl  width=100% ><thead><tr><th>".count($arr)." Trips</th> <th> </th></tr></thead>";
      // $j=1;
      for($i=0;$i<count($arr);$i++)
      {
          //$j++;
          //if($j==2)
          //{
              echo "<tr>";
            //  $j=0;
          //}
         echo "<td>";
         if($arr[$i][7]==NULL)
  echo "<img src=images/nopic.png height=150px width=150px />";
         else
  echo "<img src=trppic/".$arr[$i][7]." height=150px width=150px />";
         echo "</td><td><h4>".$arr[$i][6]."</h4>";
         echo "<b><i>".$arr[$i][3]."/".$arr[$i][4]."</i></b><br>";
         echo $arr[$i][2]." likes<br>";
         echo "Cost :".$arr[$i][5]."<br>";
         echo $arr[$i][8];
         echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
         echo "<a class=upload href=frmuplpic.php?tcod=".$arr[$i][0]." >Upload Pictures</a></td>";
         //if($j==1)
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


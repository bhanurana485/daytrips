<?php
session_start();
include_once 'buslogic.php';
if(isset($_REQUEST["tcod"]))
{
    $obj=new clstrp();
    $obj->updlik($_REQUEST["tcod"]);
}
if(isset($_REQUEST["ccod"]))
{
    $_SESSION["ccod"]=$_REQUEST["ccod"];
}
if(isset($_REQUEST["lcod"]))
{
    $_SESSION["lcod"]=$_REQUEST["lcod"];
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
        window.location="frmsrctrp.php?ccod="+a;
    }
    function xyz(a)
    {
        window.location="frmsrctrp.php?lcod="+a;
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
      <div class="searchtrip">
    <div class="container">
      
    <form name="frmsrctrp" method="Post" action="frmsrctrp.php">
    <h2>Search Trips</h2>
    <table width="100%" class="searchform">
        <tr>
            <td>Select City</td>
            <td>
                <select name="drpcty" class="form-control" onchange="abc(this.value);">
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
                <select name="drploc" class="form-control" onchange="xyz(this.value);">
        <?php
          if(isset($_SESSION["ccod"]))   
          {
              $obj=new clsloc();
              $arr=$obj->disp_rec($_SESSION["ccod"]);
              for($i=0;$i<count($arr);$i++)
              {
    if(isset($_SESSION["lcod"]) && $_SESSION["lcod"]==$arr[$i][0])
    echo "<option value=".$arr[$i][0]." selected />".$arr[$i][1];    
    else
    echo "<option value=".$arr[$i][0]." />".$arr[$i][1];
              }
          }
        ?>
                </select>
            </td>
        </tr>    
    </table>
    
    <?php
      if(isset($_SESSION["lcod"]))    
      {
          $obj=new clstrp();
          $arr=$obj->srctrp($_SESSION["lcod"]);
          //trpcod,trpdat,trplik,locnam,ctynam,trpcst,trptit,pic 
       if(count($arr)>0)
           echo "<table class=srch-trip width=100% ><thead><tr><th>".count($arr)." Trips</th> <th></th> </tr></thead>";
       
      for($i=0;$i<count($arr);$i++)
      {
       // $j++;
       // if($j==2)
        //{
            echo "<tr>";
            //$j=0;
       // }
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
         echo "<a class=upload href=frmpic.php?tcod=".$arr[$i][0]." >View Pictures</a>";
         echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
         echo "<a href=frmsrctrp.php?tcod=".$arr[$i][0]."><img src=images/like.jpg height=40px width=60px /></a>";
         echo "</td>";
        // if($j==1)
        // {
             echo "</tr>";
         //}
        // echo "<tr><td colspan=2><hr/></td></tr>";
      }
       echo "</table>";
      }   
    ?>
    
</form>    </div></div>
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

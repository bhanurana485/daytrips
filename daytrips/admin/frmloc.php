<?php
session_start();
include_once '../buslogic.php';
if(isset($_POST["btnupd"]))
{
    $obj=new clsloc();
    $obj->locnam=$_POST["txtlocnam"];
    $obj->locctycod=$_POST["drpcty"];
    $obj->loccod=$_SESSION["lcod"];
    $obj->update_rec();
    unset($_SESSION["lcod"]);
}
if(isset($_REQUEST["lcod"]))
{
    if($_REQUEST["mode"]=='D')
    {
        $obj=new clsloc();
        $obj->loccod=$_REQUEST["lcod"];
        $obj->delete_rec();
    }
    if($_REQUEST["mode"]=='E')
    {
        $obj=new clsloc();
        $obj->find_rec($_REQUEST["lcod"]);
        $nam=$obj->locnam;
        $_SESSION["lcod"]=$obj->loccod;
    }
}
if(isset($_REQUEST["ccod"]))
{
    $_SESSION["ccod"]=$_REQUEST["ccod"];
}
if(isset($_POST["btnsub"]))
{
    $obj=new clsloc();
    $obj->locctycod=$_POST["drpcty"];
    $obj->locnam=$_POST["txtlocnam"];
    $obj->save_rec();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title> Day Trip </title>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<link href="../css/responsive.css" rel="stylesheet" type="text/css">
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
    window.location="frmloc.php?ccod="+a;
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
      <a class="navbar-brand" href="#"><img src="../images/logo.png" alt=""></a>
    </div>


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>
            <a href="frmcty.php">City 
                <span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="frmloc.php">Location</a></li>
            <li><a href="../index.php?sts=s">Logout</a></li> 
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</div>
</header>
<div class="mid-container">
    <section class="services admin">
<div class="container">
    <form name="frmloc" method="Post" action="frmloc.php">
<div class="dd1"> Locations</div>
        <table width="50%" class=t1>
            <tr><td>Select City</td>
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
            <tr><td>Location</td>
                <td>
                    <input type="text" name="txtlocnam" required=""
           value="<?php if(isset($nam)) echo $nam;  ?>"/>
                </td>   
            </tr>
            <tr>
                <td></td>
                <td>
                    <?php
    if(isset($_SESSION["lcod"]))
    echo "<input type=Submit name=btnupd value=Update />";
    else
    echo "<input type=Submit name=btnsub value=Submit />";
            ?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="Reset" name="btncan" value="Cancel" />
                </td>
            </tr>
        </table>
        <?php
        if(isset($_SESSION["ccod"]))
        {
            $obj=new clsloc();
            $arr=$obj->disp_rec($_SESSION["ccod"]);
            if(count($arr)>0)
    echo "<table width=50% class=t1 ><tr><th>Location</th></tr>";
        for($i=0;$i<count($arr);$i++)
        {
            echo "<tr><td>".$arr[$i][1]."</td>";
 echo "<td><a class=anc href=frmloc.php?lcod=".$arr[$i][0]."&mode=E >Edit</a>";
 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
 echo "<a class=anc href=frmloc.php?lcod=".$arr[$i][0]."&mode=D >Delete</a>";
 echo "</td></tr>";
 echo "<tr><td colspan=2><hr /></td></tr>";
 }
    echo "</table>";
        }
        ?>
    </form>
    </div>
    </section>
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



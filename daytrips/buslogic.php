<?php
include_once 'config.php';
class clscty 
{
    public $ctycod,$ctynam;
    public function save_rec() 
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call inscty('$this->ctynam')";
        $res=  mysqli_query($link, $qry)or die(mysqli_error($link));
      if(mysqli_affected_rows($link)==1)
      {
       $con->db_close();
       return TRUE;
      }
 else {
      $con->db_close();
      return FALSE;
      }
        
    }
    public function update_rec()
    {
        
    $con=new clscon();
        $link=$con->db_connect();
        $qry="call updcty($this->ctycod,'$this->ctynam')";
        $res=  mysqli_query($link, $qry)or die(mysqli_error($link));
      if(mysqli_affected_rows($link)==1)
      {
       $con->db_close();
       return TRUE;
      }
 else {
      $con->db_close();
      return FALSE;
      }

}
public function find_rec($ccod)
{
      $con=new clscon();  
      $link=$con->db_connect();
      $qry="call findcty($ccod)";
      $res=  mysqli_query($link, $qry);
      if(mysqli_num_rows($res)>0)
      {
       $r=  mysqli_fetch_row($res);
       $this->ctycod=$r[0];
       $this->ctynam=$r[1];
       
      }
}

public function disp_rec()
{
 $con=new clscon();
        $link=$con->db_connect();
        $qry="call dispct"
                . "y()";
        $res=  mysqli_query($link,$qry)or die(mysqli_error($link));
        $i=0;
        $ar=array();
        while($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;   
}

 public function delete_rec()
    {
            $con=new clscon();
    $link=$con->db_connect();
    $qry="call delcty($this->ctycod)";
    $res=  mysqli_query($link, $qry);
    if(mysqli_affected_rows($link)==1)
    {
        $con->db_close();
        return TRUE;
    }
 else {
    $con->db_close();
    return FALSE;
    }
    }

}
class clsloc
{
    public $loccod,$locnam,$locctycod;
    public function save_rec()
    {
         $con=new clscon();  
      $link=$con->db_connect();
      $qry="call insloc('$this->locnam','$this->locctycod')";
      $res=  mysqli_query($link, $qry)or die(mysqli_error($link));
      if(mysqli_affected_rows($link)==1)
      {
       $con->db_close();
       return TRUE;
      }
 else {
      $con->db_close();
      return FALSE;
      }
    }
    public function update_rec()
    {
        $con=new clscon();  
      $link=$con->db_connect();
      $qry="call updloc($this->loccod,'$this->locnam','$this->locctycod')";
      $res=  mysqli_query($link, $qry)or die(mysqli_error($link));
      if(mysqli_affected_rows($link)==1)
      {
       $con->db_close();
       return TRUE;
      }
 else {
      $con->db_close();
      return FALSE;
      }  
    }
    public function find_rec($lcod)
    {
         $con=new clscon();  
      $link=$con->db_connect();
      $qry="call findloc($lcod)";
      $res=  mysqli_query($link, $qry);
      if(mysqli_num_rows($res)>0)
      {
       $r=  mysqli_fetch_row($res);
       $this->loccod=$r[0];
       $this->locnam=$r[1];
       $this->locctycod=$r[2];
       
      }
    }
    public function disp_rec($ccod)
       {
          $con=new clscon();
        $link=$con->db_connect();
        $qry="call disploc('$ccod')";
        $res=  mysqli_query($link,$qry);
        $i=0;
        $ar=array();
        while($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;
    }
    public function delete_rec()
   {
            $con=new clscon();
    $link=$con->db_connect();
    $qry="call delloc($this->loccod)";
    $res=  mysqli_query($link, $qry);
    if(mysqli_affected_rows($link)==1)
    {
        $con->db_close();
        return TRUE;
    }
 else {
    $con->db_close();
    return FALSE;
    }
    }
}
class clsreg
{
    public $regcod,$regeml,$regpwd,$regdat;
    
    public function logincheck($eml,$pwd)
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call logincheck('$eml','$pwd',@cod)";
        $res=  mysqli_query($link, $qry);
        $res1=  mysqli_query($link,"select @cod");
        $r=  mysqli_fetch_row($res1);
        $con->db_close();
        return $r[0];
    }
    
    
    public function save_rec()
   {
         $con=new clscon();  
      $link=$con->db_connect();
      $qry="call insreg('$this->regeml','$this->regpwd','$this->regdat')";
      $res=  mysqli_query($link, $qry)or die(mysqli_error($link));
      if(mysqli_affected_rows($link)==1)
      {
       $con->db_close();
       return TRUE;
      }
 else {
      $con->db_close();
      return FALSE;
      }
    }
    public function update_rec()
   {
         $con=new clscon();  
      $link=$con->db_connect();
      $qry="call updreg($this->regcod,'$this->regeml','$this->regpwd','$this->regdat')";
      $res=  mysqli_query($link, $qry)or die(mysqli_error($link));
      if(mysqli_affected_rows($link)==1)
      {
       $con->db_close();
       return TRUE;
      }
 else {
      $con->db_close();
      return FALSE;
      }
    }
    public function find_rec($lcod)
    {
         $con=new clscon();  
      $link=$con->db_connect();
      $qry="call findreg($lcod)";
      $res=  mysqli_query($link, $qry);
      if(mysqli_num_rows($res)>0)
      {
       $r=  mysqli_fetch_row($res);
       $this->regcod=$r[0];
       $this->regeml=$r[1];
       $this->regpwd=$r[2];
       $this->regdat=$r[3];
       
      }
    }
    public function disp_rec()
       {
          $con=new clscon();
        $link=$con->db_connect();
        $qry="call dispreg()";
        $res=  mysqli_query($link,$qry);
        $ar=array();
        $i=0;
        while($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        //print_r($ar);
        return $ar;
    } 
     public function delete_rec()
   {
            $con=new clscon();
    $link=$con->db_connect();
    $qry="call delreg($this->regcod)";
    $res=  mysqli_query($link, $qry);
    if(mysqli_affected_rows($link)==1)
    {
        $con->db_close();
        return TRUE;
    }
 else {
    $con->db_close();
    return FALSE;
    }
    }
}
class clstrp
{
    public $trpcod,$trploccod,$trpregcod,$trptit,$trpdsc,$trpcst,$trpdat,$trplik,$trpmanpiccod;

    public function updlik($tcod)
    {
        $con=new clscon();
        $link=$con->db_connect();
        $res=  mysqli_query($link,"call updlik('$tcod')");
        $con->db_close();
    }
    
    public function updtrpmanpic($tcod,$pcod)
    {
        $con=new clscon();
        $link=$con->db_connect();
        $res=  mysqli_query($link,"call updtrpmanpic('$tcod','$pcod')");
        $con->db_close();
    }
    public function save_rec()
    {
         $con=new clscon();  
      $link=$con->db_connect();
      $qry="call instrp('$this->trploccod','$this->trpregcod','$this->trptit','$this->trpdsc','$this->trpcst','$this->trpdat','$this->trplik','$this->trpmanpiccod')";
      $res=  mysqli_query($link, $qry)or die(mysqli_error($link));
      if(mysqli_affected_rows($link)==1)
      {
       $con->db_close();
       return TRUE;
      }
 else {
      $con->db_close();
      return FALSE;
      }
    }
      public function update_rec()
    {
         $con=new clscon();  
      $link=$con->db_connect();
      $qry="call updtrp($this->trpcod,'$this->trploccod','$this->trpregcod','$this->trptit','$this->trpdsc','$this->trpcst','$this->trpdat','$this->trplik','$this->trpmanpiccod')";
      $res=  mysqli_query($link, $qry)or die(mysqli_error($link));
      if(mysqli_affected_rows($link)==1)
      {
       $con->db_close();
       return TRUE;
      }
 else {
      $con->db_close();
      return FALSE;
      }
    }
    public function find_rec($tcod)
    {
         $con=new clscon();  
      $link=$con->db_connect();
      $qry="call findtrp($tcod)";
      $res=  mysqli_query($link, $qry);
      if(mysqli_num_rows($res)>0)
      {
       $r=  mysqli_fetch_row($res);
       $this->trpcod=$r[0];
       $this->trploccod=$r[1];
       $this->trpregcod=$r[2];
       $this->trptit=$r[3];
       $this->trpdsc=$r[4];
       $this->trpcst=$r[5];
       $this->trpdat=$r[6];
       $this->trplik=$r[7];
       $this->trpmanpiccod=$r[8];
       
       
      }
    }
    
    
        public function srctrp($lcod)
       {
          $con=new clscon();
        $link=$con->db_connect();
        $qry="call srctrp('$lcod')";
        $res=  mysqli_query($link,$qry);
        $i=0;
        $ar=array();
        while($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;
    }
      public function dspmytrp($rcod)
       {
          $con=new clscon();
        $link=$con->db_connect();
        $qry="call dspmytrp('$rcod')";
        $res=  mysqli_query($link,$qry);
        $i=0;
        $ar=array();
        while($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;
    } 
    public function delete_rec()
   {
            $con=new clscon();
    $link=$con->db_connect();
    $qry="call deltrp($this->trpcod)";
    $res=  mysqli_query($link, $qry);
    if(mysqli_affected_rows($link)==1)
    {
        $con->db_close();
        return TRUE;
    }
 else {
    $con->db_close();
    return FALSE;
    }
    }
    
}
class clstrppic
{
    public  $trppiccod,$trppictrpcod,$trppicfil,$trppicdsc;
    public function save_rec()
    {
         $con=new clscon();  
      $link=$con->db_connect();
      $qry="call instrppic('$this->trppictrpcod','$this->trppicfil','$this->trppicdsc')";
      $res=  mysqli_query($link, $qry)or die(mysqli_error($link));
      if(mysqli_affected_rows($link)==1)
      {
       $con->db_close();
       return TRUE;
      }
 else {
      $con->db_close();
      return FALSE;
      }
    }
    public function update_rec()
    {
         $con=new clscon();  
      $link=$con->db_connect();
      $qry="call updtrppic('$this->trppiccod','$this->trppictrpcod','$this->trppicfil','$this->trppicdsc')";
     
      $res=  mysqli_query($link, $qry)or die(mysqli_error($link));
      if(mysqli_affected_rows($link)==1)
      {
       $con->db_close();
       return TRUE;
      }
 else {
      $con->db_close();
      return FALSE;
      }
    }
      public function find_rec($tpcod)
    {
         $con=new clscon();  
      $link=$con->db_connect();
      $qry="call findtrppic($tpcod)";
      $res=  mysqli_query($link, $qry);
      if(mysqli_num_rows($res)>0)
      {
       $r=  mysqli_fetch_row($res);
       $this->trppiccod=$r[0];
       $this->trppictrpcod=$r[1];
       $this->trppicfil=$r[2];
       $this->trppicdsc=$r[3];
       
       
       
      }
    }
     public function delete_rec()
    {
         $con=new clscon();  
      $link=$con->db_connect();
      $qry="call deltrppic($this->trppiccod)";
      $res=  mysqli_query($link, $qry)or die(mysqli_error($link));
      if(mysqli_affected_rows($link)==1)
      {
       $con->db_close();
       return TRUE;
      }
 else {
      $con->db_close();
      return FALSE;
      }
    }
       public function disp_rec($tcod)
       {
          $con=new clscon();
        $link=$con->db_connect();
        $qry="call disptrppic('$tcod')";
        $res=  mysqli_query($link,$qry);
        $i=0;
        $ar=array();
        while($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;
    }
    
     
}




?>
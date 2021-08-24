<?php

class clscon
{
    private $link;
    public function db_connect()
    {
        $this->link= mysqli_connect("localhost","root","","d");
        return $this->link ;
    }
    public function db_close()
    {
        mysqli_close($this->link);
    }
    
    
    
    
}

?>
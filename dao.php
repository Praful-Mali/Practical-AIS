<?php

include "interface2.php";

class Dao implements interface2{
    
	public $conn;
    function __construct() { // object are created that time automatically call constructor
        include "dbconnect.php";		
        $d= new Dbconnect();
        $this->conn=$d->connect();      
    }
    //Insert data in database
    function insert($table, $value) {
       $field = "";
        $val = "";
        $i = 0;

        foreach ($value as $k => $v) {
            if ($i == 0) {
                $field.=$k;
                $val.="'".$v."'";
                
            } else {
                $field.=",".$k;
                $val.=",'".$v."'";
            }
            $i++;
        }
		
        return mysqli_query($this->conn,"insert into $table($field) values($val)");
    }
    
    // select data in database using select function
     public function select($table, $where='') {
        if ($where != '') {
            $where = ' where ' .$where;
        }
     
        $query = mysqli_query($this->conn,"select * from $table $where");

        return $query;
    }
    //delete recored in database
    function delete($table, $where='') {
          if($where != '')
        {
            $where= 'where '.$where;
        }
         return mysqli_query($this->conn,"delete from $table $where");
    }
   //update recored 
    function update($table, $value, $where='') {
             
         if($where != ''){
         $where= 'where '.$where;}
        $val='';
        $i=0;
        foreach ($value as $k => $v){
        if($i == 0)       
            $val.=$k."='".$v."'";
        else
            $val.=",".$k."='".$v."'";
        $i++;
        }
        return mysqli_query($this->conn,"update $table set $val $where");
    }
    
}

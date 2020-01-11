<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function select_item($tablename,$col_name,$id)
        {
           
            if(isset($tablename)&&isset($col_name)&&isset($id))
            {
                $con=mysqli_connect('localhost','root','','usci')or die("cannot connect to the database server");
            $query="SELECT $col_name FROM $tablename WHERE id= '$id' ";
            $sql=mysqli_query($con,$query)or die("error query");
            $row=  mysqli_fetch_array($sql);
            $result= mysqli_affected_rows($con);
            if($result==1)
            {
                return $row["$col_name"];
            }
            }
        }
function select_gitem($tablename,$col_name,$id)
        {
           
            if(isset($tablename)&&isset($col_name)&&isset($id))
            {
            $con=mysqli_connect('localhost','root','','usci')or die("cannot connect to the database server");
            $query="SELECT $col_name FROM $tablename WHERE groupid= '$id' ";
            $sql=mysqli_query($con,$query)or die("error query");
            $row=  mysqli_fetch_array($sql);
            $result= mysqli_affected_rows($con);
            if($result==1)
            {
                return $row["$col_name"];
            }
            }
        }
function insert ($tablename,$data_array)
        {
            if(isset($tablename)&&isset($data_array))
                    {
                        $con=mysqli_connect('localhost','root','','usci')or die("cannot connect to the database server");
                        $col_name=array();
                        $data=array();
                        foreach ($data_array as $key => $value) 
                            {
                                $col_name[]=$key;
                                $data[]=$value;
                            }
                        $query="INSERT INTO ".$tablename." (".implode(",",$col_name).") VALUES ('".implode("','", $data)."')" ;
                        $sql=mysqli_query($con,$query) or die ("insert erroe");
                        $result=  mysqli_affected_rows($con);
                        return $result;
            }
        }
        
function select ($tablename , $id='fulse')
        {
            if(isset($tablename))
            {
                if($id=='fulse')
                {
                    $con=mysqli_connect('localhost','root','','usci')or die("cannot connect to the database server");
                    $query="SELECT * FROM ".$tablename." ";
                    $sql=mysqli_query($con,$query)or die("error query ");
                    $result= mysqli_affected_rows($con);
                    return$result;
                }
                else
                {
                    $con=mysqli_connect('localhost','root','','usci')or die("cannot connect to the database server");
                    $query="SELECT * FROM ".$tablename." WHERE "." id= '$id' ";
                    $sql=mysqli_query($con,$query)or die("error query");
                    $result= mysqli_affected_rows($con);
                    return $result;
                }

        } 
        }


function delet ($tablename,$id)
        {
            if(isset($tablename)&&isset($id))
                    {
                        $con=mysqli_connect('localhost','root','','usci')or die("cannot connect to the database server");
                        $query="DELETE FROM $tablename WHERE "." id= '$id'";
                        $sql=mysqli_query($con,$query)or die("error query");
                        $result= mysqli_affected_rows($con);
                        return $result;
                    }
        }
 function update ($tablename,$col,$data,$id)
        {
            if(isset($tablename)&&isset($col)&&isset($data)&&isset($id))
                    {
                        $con=mysqli_connect('localhost','root','','usci')or die("cannot connect to the database server");
                        $query="UPDATE $tablename SET $col='$data' WHERE id='$id'";
                        $sql=mysqli_query($con,$query) or die('error query');
                        $result=  mysqli_affected_rows($con);
                        return $result;
            }
        }
        
function isLogged($for = FALSE) {
        if ($for != FALSE) {
            return (isset($_SESSION["$for"])) ? TRUE : FALSE;
        } else {
            return (isset($_SESSION["usci"])) ? TRUE : FALSE;
        }
    }
    function perm ($type) {
        if($type == $_SESSION['usci']['user_data']['type']) {  return TRUE ;}
        else {
            exit('you donot have permision '.'<a href="'.  base_url().'index.php/log'.'">Back to home</a>');
            
        } 
    }



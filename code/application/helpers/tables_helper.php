<?php

if ( ! function_exists('openTable'))
{
	function openTable($id=NULL , $class=NULL )
	{
            $re = "<table ";
            if($class){
                $re .="class = $class";
            }
            if($id){
               $re .="id = $id"; 
            }
            if(!$class && !$id){
                $re .= "border = '1px'";
            }
            $re .= " >"   ;
            return $re;
		
	}
}
if ( ! function_exists('openRow')){
    function openRow($id=NULL , $class=NULL )
	{
            $re = "<tr ";
            if($class){
                $re .="class = $class";
            }
            if($id){
               $re .="id = $id"; 
            }
            $re .= " >"   ;
            return $re;
		
	}
}
if ( ! function_exists('closeRow')){
    function closeRow( )
	{
            $re = "</tr ";
            $re .= " >"   ;
            return $re;	
	}
}
if ( ! function_exists('cell')){
    function cell($data,$id=NULL , $class=NULL )
	{
            $re = "<td ";
            if($class){
                $re .="class = $class";
            }
            if($id){
               $re .="id = $id"; 
            }
            $re .= " > $data </td>"   ;
            
            return $re;
		
	}
}
if ( ! function_exists('head')){
    function head($data_array , $class=NULL )
	{
        $re= "";
        foreach ($array as $value) {
           $re .= "<th ";
            if($class){
                $re .="class = $class";
            }
            $re .= " > $value </th>"   ;
            
        }
	return $re; 	
	}
}

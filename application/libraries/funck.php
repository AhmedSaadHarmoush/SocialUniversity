<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class  funck {
     function password($str) {
    return md5($str);
}


function img($url , $id = FALSE , $class = FALSE) {
    $ret =  " <img src='$url'" ;
    if( $id ){
       $ret .= "id = '$id' "; 
    }
    if( $class ){
        $ret .= "class = '$class' "; 
    }
    $ret .= " />";
}

//just a test funck
        function msg($str){
            echo "<center> <h5> $str </h5> </center>";
        }
        public function cell($string) {
            return"<td> $string </td>";
        }
 };

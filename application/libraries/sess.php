<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



/**
 * Description of sesstion helper
 *
 * @author mimo
 */
class sess {
    public function __construct() {
        session_start();
    }
    function set_sess($data){
        $_SESSION['usci']= $data ;
    }
    function dest_sess(){
        session_destroy();
    }
}

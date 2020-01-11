<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of db_connect
 *
 * @author mimo
 */
class db_connect extends CI_Model {

    private $link;

    public function connect() {
        try {
            $this->link = mysqli_connect('127.0.0.1','root','','usci');
            return $this->link;
        } catch (Exception $exc) {
            return $exc-> mysqli_connect_errno ();
        }
    }

}

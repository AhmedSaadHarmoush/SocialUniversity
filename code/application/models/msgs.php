<?php

/**
 * Description of msg
 *
 * @author mimo
 */
class msgs extends CI_Model {

    protected $link;

    function __construct() {
        $this->load->model("db_connect");
        $this->link = $this->db_connect->connect();
    }

    // sending a msg and returns it`s id .
    public function send($msg, $from_id, $to_id) {
        try {
            $link = $this->link;
            $sql = mysqli_query($link, "INSERT INTO msgs (msg,from_id,to_id) VALUES('$msg','$from_id','$to_id')");
            return mysqli_insert_id($link);
        } catch (Exception $exc) {
            return $exc->mysqli_errno($link);
        }
    }

    // getting the msg data 
    public function msg_fetch_array($id) {
        $link = $this->link;
        $sql = mysqli_query($link, "SELECT * FROM msgs WHERE id=$id");
        $n = mysqli_affected_rows($link);
        for ($i = 0; $i < $n; $i++) {
            $row = mysqli_fetch_array($sql);
        }
        return $row;
    }
    
    public function msgs_fetch_array($user_id , $fd_id) {
        $link = $this->link;
        $sql = mysqli_query($link, "SELECT * FROM msgs WHERE (from_id=$user_id  && to_id=$fd_id) || (from_id=$fd_id  && to_id=$user_id) ORDER BY sent ASC ");
        $n = mysqli_affected_rows($link);
        for ($i = 0; $i < $n; $i++) {
            $row[$i] = mysqli_fetch_array($sql);
        }
        return $row;
    }

    // updating the msg as seen .
    public function seen($id) {
        $link = $this->link;
        $timenow = timenow();
        try {
            $data = "UPDATE msgs SET seen=1 seendt='$timenow' WHERE id=$id";
            $sql = mysqli_query($link, $data);
            return (mysqli_affected_rows($link) > 0) ? TRUE : FALSE;
        } catch (Exception $exc) {
            return $exc->mysqli_errno($link);
        }
    }

}

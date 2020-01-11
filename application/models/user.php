<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of users
 *
 * @author mimo
 */
class user  extends CI_Model {

    protected $link;

    function __construct() {
        $this->load->model("db_connect");
        $this->link = $this->db_connect->connect();
    }

    //check if user is exists .
    public function user_exist($username) {
        try {
            $link = $this->link;
            $sql = mysqli_query($link, "SELECT id FROM users WHERE username='$username'");
            return(mysqli_affected_rows($link) == 1) ? TRUE : FALSE;
        } catch (Exception $exc) {
            return $exc->mysqli_erron();
        }
    }

    //ckeck if the email  is exist .
    public function email_exist($email) {
        try {
            $link = $this->link;
            $sql = mysqli_query($link, "SELECT id FROM users WHERE email='$email'");
            return(mysqli_affected_rows($link) == 1) ? TRUE : FALSE;
        } catch (Exception $exc) {
            return $exc->mysqli_erron();
        }
    }

    //loging in a user .
    public function login($username, $password) {
        $link = $this->link;
        $fpassword = $this->funck->password($password);
        mysqli_query($link,"SELECT id FROM users WHERE"
                . " (username='$username'||email='$username') && password='$fpassword'");
        return(mysqli_affected_rows($link) == 1) ? TRUE : FALSE;
    }
    //select all doctors 
    public function select_docs() {
       $link = $this->link;
        $sql = mysqli_query($link,"SELECT * FROM users  WHERE type = 2");
        if(mysqli_affected_rows($link)){
            return mysqli_fetch_array($sql);  
            
        }  else {
            return FALSE;
        }
        
    }
    //returns user id from his username .
    public function user_id($username) {
        try {
            $link = $this->link;
            $sql = mysqli_query($link, "SELECT id FROM users WHERE username='$username'");
            if (mysqli_affected_rows($link) == 1) {
                $row = mysqli_fetch_array($sql);
                return $row['id'];
            } else {
                return FALSE;
            }
        } catch (Exception $exc) {
            return $exc->mysqli_erron();
        }
    }

    //returns user type from his username .
    public function user_type($username) {
        try {
            $link = $this->link;
            $sql = mysqli_query($link, "SELECT type FROM users WHERE (username='$username'||id='$username')");
            if (mysqli_affected_rows($link) == 1) {
                $row = mysqli_fetch_array($sql);
                return $row['type'];
            } else {
                return FALSE;
            }
        } catch (Exception $exc) {
            return $exc->mysqli_erron();
        }
    }

    //check if user is logged in or not 
    public function logged($for = FALSE) {
        if ($for != FALSE) {
            return (isset($_SESSION["$for"])) ? TRUE : FALSE;
        } else {
            return (isset($_SESSION["user_id"])) ? TRUE : FALSE;
        }
    }

    /*//loging out a user
    public function logout() {
        session_destroy();
        header("Location : " . $_SERVER['PHP_SELF'] . "/index.php");
        exit();
    }*/

    // checking if user is active or not .
    public function activeation($username) {
        try {
            $link = $this->link;
            $sql = mysqli_query($link, "SELECT activation FROM users WHERE (username='$username' || id='$username')");
            return(mysqli_affected_rows($link) == 1) ? TRUE : FALSE;
        } catch (Exception $exc) {
            return $exc->mysqli_erron();
        }
    }

    // returns a user item as string .

    public function item($item, $id) {
        try {
            $link = $this->link;
            $sql = mysqli_query($link, "SELECT $item FROM users WHERE id =$id ");
            if (mysqli_affected_rows($link) == 1) {
                $row = mysqli_fetch_array($sql);
                return $row[$item];
            } else {
                return FALSE;
            }
        } catch (Exception $exc) {
            return $exc->mysqli_erron();
        }
    }

    // returns a mda with all user data ready to use .
    public function user_fetch_array($id) {
        $link = $this->link;
        $sql = mysqli_query($link, "SELECT * FROM users WHERE id=$id");
        if(mysqli_affected_rows($link)){
            $row = mysqli_fetch_array($sql);
        return $row;
        }else {
            return FALSE;
        }
    }

    // adding a new user .
    public function add($data_array) {
        $link = $this->link;
        $k = implode(',', array_keys($data_array));
        $v = "'" . implode("','", array_values($data_array)) . "'";
        try {
            $data = "INSERT INTO users ($k) VALUES($v)";
            $sql = mysqli_query($link, $data);
            return (mysqli_affected_rows($link) > 0) ? TRUE : FALSE;
        } catch (Exception $exc) {
            return $exc->mysqli_errno($link);
        }
    }

    //blocking a user .
    public function block($id) {
        $link = $this->link;
        try {
            $data = "UPDATE users SET activation=0 WHERE id=$id";
            $sql = mysqli_query($link, $data);
            return (mysqli_affected_rows($link) > 0) ? TRUE : FALSE;
        } catch (Exception $exc) {
            return $exc->mysqli_errno($link);
        }
    }

    //reactive a bloced user a user .
    public function active($id) {
        $link = $this->link;
        try {
            $data = "UPDATE users SET activation=1 WHERE id=$id";
            $sql = mysqli_query($link, $data);
            return (mysqli_affected_rows($link) > 0) ? TRUE : FALSE;
        } catch (Exception $exc) {
            return $exc->mysqli_errno($link);
        }
    }

    //just a update helper .
    private function callupdate($data_array) {
        $k = array_keys($data_array);
        $v = array_values($data_array);
        $n = count($data_array);
        $u = array();
        for ($i = 0; $i < $n; $i++) {
            $u[$i] = "$k[$i]='$v[$i]'";
        }
        $result = implode(" ", $u);
        return $result;
    }

    // updateing a uesr data .
    public function update($data_array, $id) {
        $link = $this->link;
        try {
            $up = $this->callupdate($data_array);
            $data = "UPDATE users SET $up WHERE id=$id";
            $sql = mysqli_query($link, $data);
            return (mysqli_affected_rows($link) > 0) ? TRUE : FALSE;
        } catch (Exception $exc) {
            return $exc->mysqli_errno($link);
        }
    }

    // chaining user password (spcial hatch update) .
    public function change_password($password, $id) {
        $link = $this->link;
        try {
            $fpassword = $this->funck->password($password);
            $data = "UPDATE users SET passwoed='$fpassword' WHERE id=$id";
            $sql = mysqli_query($link, $data);
            return (mysqli_affected_rows($link) > 0) ? TRUE : FALSE;
        } catch (Exception $exc) {
            return $exc->mysqli_errno($link);
        }
    }


    //deleting a user .
    public function delete($id) {
        $link = $this->link;
        try {
            $data = "DELETE FROM users WHERE id=$id";
            $sql = mysqli_query($link, $data);
            return (mysqli_affected_rows($link) > 0) ? TRUE : FALSE;
        } catch (Exception $exc) {
            return $exc->mysqli_errno($link);
        }
    }
    

}

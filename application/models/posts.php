<?php

class posts extends Model {

	function addPost($array){
		$k=  implode(",",  array_keys($array));
        $v= "'".  implode("'".","."'", array_values($array))."'";
    	$q = $this->db->query("INSERT INTO posts ($k) VALUES ($v)");
        $num=  mysqli_affected_rows($con);
        return $num;
	}
	

	function deletePost($id){
		$q = $this->db->query("DELETE FROM posts WHERE id=$id");
	}
	
	
	function updatePost($array, $id ){
        foreach ($array as $key => $value) {
	        $q = $this->db->query("UPDATE posts SET $key='$value' WHERE id=$id");
        }
	}
	

	function viewPost($id){
		$q = $this->db->query("SELECT * FROM posts WHERE id=$id");
		$num = mysqli_affected_rows($con);
        if ($num > 0) {
            
                $row = mysqli_fetch_array($sql);
            
            return $row;
        }
        else
            return $num;
	}

	function searchByTitle($title){
		$q = $this->db->query("SELECT * FROM posts WHERE title LIKE '%$title%' ORDER BY ID DESC");
		$num = mysqli_affected_rows($con);
        if ($num > 0) {
            
                $row = mysqli_fetch_array($sql);
            
            return $row;
        }
        else
            return $num;
	}

}
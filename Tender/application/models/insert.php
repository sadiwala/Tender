<?php
	class Insert extends CI_Model
	{
		function post($n,$d,$p,$c,$ts,$te)
		{
			$a_id=$this->session->userdata('a_id');
			return $this->db->insert('posts',['name'=>$n,'detail'=>$d,'cat'=>$c,'pdf'=>$p,'st_time'=>$ts,'end_time'=>$te,'a_id'=>$a_id]);
		}
		function post_edit($name,$detail,$cat,$id)
		{
			return $this->db->update('posts',['name'=>$name,'detail'=>$detail,'cat'=>$cat],['id'=>$id]);
		}
	}
?>
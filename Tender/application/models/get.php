<?php
class Get extends CI_Model
{
	function all_post()
	{
		$post=$this->db->get('posts');
		$post=$post->result_array();
		return $post;
	}
	function all_post_a_e()
	{
		$post=$this->db->query("SELECT * FROM `posts` ORDER BY `end_time` ASC");
		$post=$post->result_array();
		return $post;
	}
	function all_post_d_e()
	{
		$post=$this->db->query("SELECT * FROM `posts` ORDER BY `end_time` DESC");
		$post=$post->result_array();
		return $post;
	}
	function all_post_a_s()
	{
		$post=$this->db->query("SELECT * FROM `posts` ORDER BY `st_time` ASC");
		$post=$post->result_array();
		return $post;
	}
	function all_post_d_s()
	{
		$post=$this->db->query("SELECT * FROM `posts` ORDER BY `st_time` DESC");
		$post=$post->result_array();
		return $post;
	}
	function post_id($id)
	{
		$id_post=$this->db->where(['id'=>$id])
						  ->get('posts');
		$id_post=$id_post->result_array();
		return $id_post;	
	}
}
?>
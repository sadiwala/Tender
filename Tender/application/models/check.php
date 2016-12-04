<?php
	class Check extends CI_Model
	{
		function exist($c_name,$pass)
		{
			$n=$this->db->where(['c_name'=>$c_name,'pass'=>$pass])
					 ->get('com');
			if($n->num_rows())
			{
				$n=$n->result_array();
				return $n[0]['id'];
			}
			return FALSE;
		}
		function exist_a($u_name,$pass)
		{
			$n=$this->db->where(['u_name'=>$u_name,'pass'=>$pass])
					 ->get('admin');
			if($n->num_rows())
			{
				$n=$n->result_array();
				return $n[0];
			}
			return FALSE;
		}
		function try_user($u_name)
		{
			$n=$this->db->where(['u_name'=>$u_name])
						->get('admin');
			if($n->num_rows()==0)
			{
				return TRUE;
			}
			else
			{
				$n=$n->result_array();
				if($n[0]['try']>5)
				{
					return FALSE;
				}
				else
				{
					return TRUE;
				}
			}
		}
		function a_name($a_id)
		{
			$n=$this->db->where(['id'=>$a_id])
						->get('admin');
			if($n->num_rows())
			{
				$n=$n->result_array();
				return $n[0]['name'];
			}
			return FALSE;
		}
		function a_post($a_id)
		{
			$n=$this->db->where(['a_id'=>$a_id])
						->get('posts');
			$n=$n->result_array();
			return $n;
		}
		function c_name($id)
		{
			$n=$this->db->where(['id'=>$id])
						->get('com');
			$n=$n->result_array();
			return $n[0]['c_name'];
		}
		function all_post()
		{
			$n=$this->db->get('posts');
			$n=$n->result_array();
			return $n;
		}
		function all_ans($u_id)
		{
			$n=$this->db->where(['u_id'=>$u_id])
						->get('ans');
			$n=$n->result_array();
			return $n;
		}
		function ans()
		{
			$n=$this->db->get('ans');
			$n=$n->result_array();
			return $n;
		}
		function exist_uname($u_name)
		{
			$user=$this->db->where(['u_name'=>$u_name])
					 ->get('admin');
			if($user->num_rows()!=0)
			{
				$user=$user->result_array();
				$try=$user[0]['try'];
				$try=$try+1;
				$this->db->update('admin',['try'=>$try],['u_name'=>$u_name]);
			}
			//$this->db->update('admin',)
		}
		function try0($u_name,$pass)
		{
			$this->db->update('admin',['try'=>0],['u_name'=>$u_name,'pass'=>$pass]);
		}
	}
?>
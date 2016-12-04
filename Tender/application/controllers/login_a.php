<?php
	class Login_a extends CI_Controller
	{
		function index()
		{
			if($this->session->userdata('a_id'))
			{
				//echo "a_id";
				return redirect('admin');
			}
			$this->load->view('login_admin');
		}
		function sucesful()
		{
			if ($this->session->userdata('a_id'))
			{
				//$this->session->unset_userdata('a_id');
				return redirect('admin');
			}
			$this->form_validation->set_rules('u_name','User Name','required');
			$this->form_validation->set_rules('pass','Password','required');
			if($this->form_validation->run())
			{
				$u_name=$this->input->post('u_name');
				$pass=$this->input->post('pass');
				$this->load->model('check');
				$a=$this->check->exist_a($u_name,$pass);
				$abc=$this->check->try_user($u_name);
				if($abc==TRUE)
				{
					if($a==FALSE)
					{
						$this->check->exist_uname($u_name);
						$this->session->set_flashdata('login_failed_a','Please Enter Correct User Name Or Password');
						$this->load->view('login_admin');
					}
					elseif($a['try']<=5)
					{
						$this->check->try0($u_name,$pass);
						$this->session->set_userdata('a_id',$a['id']);
						return redirect('admin');
					}
					elseif($a['try']>5)
					{
						echo "maximum try exceed";
					}
				}
				else
				{
					echo "maximum try exceed";
				}
				
			}
			else
			{
				$this->load->view('login_admin');
			}
		}
		function logout()
		{
			$this->session->unset_userdata('a_id');
			return redirect('login_a');
		}
	}
?>
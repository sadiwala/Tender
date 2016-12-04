<?php
	class Admin extends CI_Controller
	{
		function index()
		{
			if(!$this->session->userdata('a_id'))
			{
				//echo "a_id";
				return redirect('login_a');
			}
			$this->load->view('admin_home');
		}
		function sucesful()
		{
			if(!$this->session->userdata('a_id'))
			{
				//echo "a_id";
				return redirect('login_a');
			}
			$this->form_validation->set_rules('name','Tender Name','required');
			$this->form_validation->set_rules('cat','Tender Category','required');
			$this->form_validation->set_rules('detail','Breif Detail About Tender','required');
			$this->form_validation->set_rules('date','Last Date And Time','required');
			//$this->form_validation->set_rules('pdf','PDF File','required');
			$config=[
				'upload_path' => './pdf',
				'allowed_types'=> '*'
			];
			$this->load->library('upload',$config);
			if($this->form_validation->run()&&$this->upload->do_upload())
			{
				$data=$this->upload->data();
				//print_r($data);
				$img_full="pdf/".$data['raw_name'].$data['file_ext'];
				$image_path=base_url("$img_full");
				//echo $image_path;
				//exit;
				$name=$this->input->post('name');
				$detail=$this->input->post('detail');
				$date=$this->input->post('date');
				//$pdf=$this->input->post('pdf');
				$cat=$this->input->post('cat');
				$d = new DateTime($date, new DateTimeZone('Asia/Kolkata'));
				$time=($d->getTimestamp()); // 1457690400
				$now=time();//604850
				$times=$now;
				$timee=$time;
				$time=$time-$now;
				//echo $pdf;
				if($time<604850)
				{
					echo "<script>alert('Tender must close at atleast one week later of strat date');</script>";
					$this->load->view('admin_home');
				}
				else
				{
					$this->load->model('insert');
					if($this->insert->post($name,$detail,$image_path,$cat,$times,$timee))
					{
						return redirect('admin/t_view');
					}
					else
					{
						echo "connection to databse failed...";
					}
				}
			}
			else
			{
				$upload_error=$this->upload->display_errors();
				$this->load->view('admin_home',compact('upload_error'));
			}
		}
		function a_e()
		{
			
			$this->load->model('get');
			$post=$this->get->all_post_a_e();
			$this->load->view('tender_view',['all'=>$post]);
		}
		function d_e()
		{
			
			$this->load->model('get');
			$post=$this->get->all_post_d_e();
			$this->load->view('tender_view',['all'=>$post]);
		}
		function a_s()
		{
			
			$this->load->model('get');
			$post=$this->get->all_post_a_s();
			$this->load->view('tender_view',['all'=>$post]);
		}
		function d_s()
		{
			
			$this->load->model('get');
			$post=$this->get->all_post_d_s();
			$this->load->view('tender_view',['all'=>$post]);
		}
		function t_view()
		{
			
			$this->load->model('get');
			$post=$this->get->all_post();
			$this->load->view('tender_view',['all'=>$post]);
		}
		function edit($id)
		{
			if(!$this->session->userdata('a_id'))
			{
				return redirect('login_a');
			}
			$this->load->model('get');
			$id_post=$this->get->post_id($id);
			$id_post=$id_post[0];
			$this->load->view('edit_it',['p'=>$id_post]);
		}
		function edit_suc($id)
		{
			if(!$this->session->userdata('a_id'))
			{
				return redirect('login_a');
			}
			$this->form_validation->set_rules('name','Tender Name','required');
			$this->form_validation->set_rules('cat','Tender Category','required');
			$this->form_validation->set_rules('detail','Breif Detail About Tender','required');
			if($this->form_validation->run())
			{
				//$data=$this->upload->data();
				//print_r($data);
				//$img_full="pdf/".$data['raw_name'].$data['file_ext'];
				//$image_path=base_url("$img_full");
				//echo $image_path;
				//exit;
				$name=$this->input->post('name');
				$detail=$this->input->post('detail');
				//$date=$this->input->post('date');
				//$pdf=$this->input->post('pdf');
				$cat=$this->input->post('cat');
				//$d = new DateTime($date, new DateTimeZone('Asia/Kolkata'));
				//$time=($d->getTimestamp()); // 1457690400
				//$now=time();//604850
				//$times=$now;
				//$timee=$time;
				//$time=$time-$now;
				//echo $pdf;
				/*if($time<604850)
				{
					echo "<script>alert('Tender must close at atleast one week later of strat date');</script>";
					$this->load->view('admin_home');
				}*/
				$this->load->model('insert');
				if($this->insert->post_edit($name,$detail,$cat,$id))
				{
					return redirect('admin/t_view');
				}
				else
				{
					echo "connection to databse failed...";
				}
			}
			else
			{
				$this->load->model('get');
				$id_post=$this->get->post_id($id);
				$id_post=$id_post[0];
				$this->load->view('edit_it',['p'=>$id_post]);
			}
		}
	}
?>
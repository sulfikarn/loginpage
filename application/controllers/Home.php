<?php
class Home extends CI_Controller {
	var $data	=	array();
	function Home(){
		parent::__construct();
		
		$this->load->model('Register_model');
		$this->load->library('form_validation');
	}
	function index()
	{
	if($this->input->post('Submit')){
		//echo 9876; exit();
		$config = array(
						   array('field'   => 'name', 'label'   => 'Name', 'rules'   => 'required'),
						   array('field'   => 'mobile', 'label'   => 'Mobile', 'rules'   => 'required'),
						   array('field'   => 'email', 'label'   => 'Email', 'rules'   => 'required'),
						   array(	'field'   => 'password','label'   => 'Password', 
						   			'rules'   => 'trim|required|matches[retype]'
								),
						   array('field'   => 'retype','label'   => 'Password Confirmation', 'rules'   => 'required'), 
						);
						$this->form_validation->set_rules($config);
						if ($this->form_validation->run() == FALSE)
							{
								//echo "123"; exit();
							$this->load->view('registration', $this->data);
							} else{

								if($this->Register_model->email_exists($this->input->post('email'))){
									$this->data['alert'] = " <div class='alert alert-warning'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									<strong>Email already exists</strong>.
									</div>";
									$this->load->view('registration',$this->data);
								} else {
								//echo 2345;  exit();
								$this->Register_model->save();
								//$this->load->view('login',$this->data);
								redirect('home/login');
							
										} 
									} 
								} else{ 
									$this->load->view('registration');
		
							} }

			function login(){

				if($this->input->post('Submit')){

					//echo "slfikar"; exit;

					$this->form_validation->set_rules('username', 'username', 'required');
					$this->form_validation->set_rules('password', 'Password', 'required');
					if ($this->form_validation->run() == FALSE)
					{
						//echo abcd; exit();
						$this->load->view('login', $this->data);
					} 
					else
					{
							if($this->authentication->login($this->input->post('username'), $this->input->post('password')))
							{
								redirect('home/userarea');
							} else{
								$this->data['alert'] = " <div class='alert alert-warning'>
   								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
   								<strong>Incorrect email or password!</strong>.
  								</div>";
									$this->load->view('login',$this->data);

							}
					}
				}
				
				$this->load->view('login');
			}

			function userarea()	{

				$this->data['author']=$this->Register_model->get_user_details();
				$this->data['totalcount']=$this->Register_model->total_user();

				if($this->session->userdata('user_id')==''){
					redirect('/home/login');
			}

				$this->load->view('dashboard',$this->data);
			}

			function user_profile()	{

				$this->data['author']=$this->Register_model->get_user_details();

				if($this->session->userdata('user_id')==''){
					redirect('/home/login');
				}

				$this->load->view('user_profile',$this->data);
			}

			function list_user()	{

				$data['author']=$this->Register_model->get_user_details();
				$result=  $this->Register_model->list_alluser();
				$data['details']=$result;

				if($this->session->userdata('user_id')==''){
					redirect('/home/login');
				}

				$this->load->view('list_user',$data);
			}

			function logout(){
				$this->authentication->user_logout();
				redirect('home/login');
			}
		
		}
?>

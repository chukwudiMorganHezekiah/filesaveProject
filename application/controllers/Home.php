<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	 public function __construct(){
		 parent::__construct();
		 $this->load->helper("form");
		 $this->load->library(["form_validation"]);
		 
	 }
	public function index()
	{
		if($this->session->has_userdata("auth_user")){

			$this->load->model('file');
			$data['files']=$this->file->selectAllUserData($this->session->auth_user);
		$this->load->view('home',$data);
		}else{
			$this->login();
		}
	}


	public function addfile(){
		

		if($this->session->has_userdata("auth_user")){
			$this->load->view("addfile");
		}else{
			$this->login();
		}
	




	}

	public function addnewfile(){

if($this->session->has_userdata("auth_user")){
			
		

	$this->load->library("form_validation");


	$rules=[
		[
			'field'=>"filename",
			"label"=>"File name",
			"rules"=>"required|min_length[2]|callback_isFileNameUnique"
		]
	];

	$this->form_validation->set_rules($rules);

	if($this->form_validation->run() == FALSE){
		$this->addfile();

	}else {
		$config['upload_path']  = './uploads/';
		$config['allowed_types']  = 'mp3|jpg|jpeg|mp4';


		$this->load->library('upload', $config);

		if($this->upload->do_upload("filefile")){
			$data=[];
			
			

			$data['filefile']=$this->upload->data("file_name");
			$data['filename']=$this->input->post("filename");
			$data['user_id']=$this->session->auth_user;
			$this->load->model("file");

			if($this->file->insertFile($data)){

				$this->session->set_flashdata("success","File Created Successfully");
				redirect("/");
			


			}else{
				echo "file was not inserted,please try again";
			}

		}else{
			echo $this->upload->display_errors();
		}
	}
}else{
	$this->login();
}
	} 



	public function isFileNameUnique($value){

if($this->session->has_userdata("auth_user")){
	$this->load->model("file");
	$isFileNameUnique=$this->file->isFileNameUnique($value);

	if(count($isFileNameUnique) > 0){

		$this->form_validation->set_message("isFileNameUnique","This file name has already been used by youu");
		return false;

	}else{
		return true;
	}
}else{
	$this->login();
}
	}


	//login controller for view

	public function login(){
		$this->load->view("login");

	}

	//login controller for the user login

	public function loginUser(){

		$rules=[
			[
				'field'=>"email",
				"label"=>"E-mail",
				"rules"=>"required"
			],
			[
				'field'=>"password",
				"label"=>"Password",
				"rules"=>"required"
			],
		];

		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() ==FALSE ){
			$this->login();

		}else{
			$email=$this->input->post("email");
			$password=$this->input->post("password");
			

			$this->load->model("file");
			count($this->file->selectUserName($email));
			if($this->file->selectUserName($email)){
				foreach($this->file->selectUserName($email) as $data){
					$id=$data['id'];
					if(password_verify($password,$data['password'])){
						$this->session->set_userdata("auth_user",$id);
						redirect ("/");

					} else{
						echo "false";
					}
				}
				

			}else{
				$this->form_validation->set_message("This E-mail was not found in the database");
				$this->login();
			}
		}

	}

	//Register controller for view

	public function Register(){
		$this->load->view("Register");

	}

	//Register controller for the user Register

	public function RegisterUser(){

		$this->load->library("form_validation");

		$rules=[
			[
				"field"=>"name",
				"label"=>"Name",
				"rules"=>"required"
			],
			[
				"field"=>"Email",
				"label"=>"Email",
				"rules"=>"required|valid_email|callback_isEmailUnique"
			],
			[
				"field"=>"Phone",
				"label"=>"Phone.no",
				"rules"=>"required|callback_isNumber"
			],
			[
				"field"=>"password",
				"label"=>"",
				"rules"=>"required"
			]
		];
		

		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			$this->Register();
			

		}else{
			$data=[];
			$data['name']=trim($this->input->post("name"));
			$data['email']=trim($this->input->post("Email"));
			$data['phone']=trim($this->input->post("Phone"));
			$data['password']=password_hash($this->input->post("password"),PASSWORD_DEFAULT);
			
			$this->load->model("file");
			if($this->file->insertUser($data)){
				$data=trim($this->input->post("Email"));
				if($this->file->selectUser($data)){
					$this->session->set_userdata("auth_user",$this->file->selectUser($data)['id']);
					$this->index();
				}

			}

		}

	}


	//checking if the number is a number
	public function isNumber($value){
		if(preg_match('/^[0-9]+$/',$value)){

			return TRUE;

		}else{
			$this->form_validation->set_message("isNumber","The number should be only numbers");
			return FALSE;
		}
	}

	//checking if the email is unique

	public function isEmailUnique($value){

		$this->load->model("file");
		if(count($this->file->isEmailUnique($value) )> 0){
			$this->form_validation->set_message("isEmailUnique","This email is already in use");
			return FALSE;

		}else{
			return TRUE;
		}
	}

	public function viewfile($id){
		if($this->session->auth_user){
			$this->load->model("file");
			$foundFileForUser=$this->file->isFileAUsers($id);
			if(count($foundFileForUser)> 0){
				$this->load->model("file");
				$data=[];
				$data['files']=$foundFileForUser;
				$this->load->view("singlefile",$data);
			}else{
				$this->index();
			}

		}else{
			$this->login();

		}
	}

	public function deleteFile($id){
		if($this->session->auth_user){
			$this->load->model("file");
			$foundFileForUser=$this->file->isFileAUsers($id);
			if(count($foundFileForUser)> 0){

				if($this->file->deleteFile($id)){


					$this->session->set_flashdata("success","file moved to recycle bin");


					redirect("/");
				}
			}else{
				$this->index();
			}
		}else{
			$this->login();

		}
	}

	public function recycledfiles(){
		if($this->session->auth_user){
			$this->load->model("file");
		$data['files']=	$this->file->recycledfiles();
		$this->load->view("recycles",$data);

		}else{
			$this->login();

		}
	}

	//view a recycled file 
	public function viewrecycledfile($id){
		
		if($this->session->auth_user){
		$this->load->model("file");
		$file['files']=$this->file->viewrecycledfile($id);
		if(count($file) >0){
			$this->load->view("viewrecycledfile",$file);

		}else{
			$this->login();

		}
	}else{
			$this->login();

		}
	}


	//retieve a recycled file 
	public function retrievefile($id){
		if($this->session->auth_user){
		$this->load->model("file");
		if($this->file->retrievefile($id)){
			$this->session->set_flashdata("success","file successfully recycled");
			redirect("/");
		}
			

		}else{
			$this->login();

		}

	}

	//deleting file permanently

	public function deleteFilePermanently($id){
		if($this->session->auth_user){
			$this->load->model("file");
			if($this->file->deleteFilePermanently($id)){
				$this->session->set_flashdata("success","file successfully deleted permanently ");
				redirect("/");
			}
		
		}else{
			$this->login();

		}
	}
	public function logout(){
		$this->session->unset_userdata("auth_user");
		echo $this->session->auth_user;
		redirect("/login");
	}

	//search the file for a user

	public function searchfiles(){
		if($this->session->auth_user){

			$rules=[
				[
					"field"=>"search_files",
					"label"=>"Search",
					"rules"=>"required"
				]
			];
			$this->form_validation->set_rules($rules);
           if($this->form_validation->run() ==FALSE){
			   $this->index();

		   }else{
			   $searchinput=$this->input->post("search_files");
			   $this->load->model("file");
			 
			  
			  $data['search_results']= $this->file->search_file($searchinput);
		     $this->load->view('searchresults',$data);
			  
					 

				  
				  

			  
		   }


		}else{
			$this->login();
		}
	}
	
}

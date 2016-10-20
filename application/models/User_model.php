<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

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

	public function __construct()
    {
              parent::__construct();
    }

    public function getUsers()
    {
        $users = $this->db->get('users');
        return $users->result();
    }

    public function getUser($id)
    {
        $user = $this->db->get_where('users',array("id"=>$id));
        return $user->row();
    }

	public function saveUser()
	{
			
		$dataArray=array(
			'firstname'=>$this->input->post('firstname'),
			'lastname'=>$this->input->post('lastname'),
			'email'=>$this->input->post('email'),
			'password'=>md5($this->input->post('password')),
			'phone'=>$this->input->post('phone'),
			'address'=>$this->input->post('address'),
			'dob'=>date("Y-m-d",strtotime($this->input->post('dob'))),
			'gender'=>$this->input->post('gender'),
			'marital_status'=>$this->input->post('marital_status'),
			'education'=>$this->input->post('education'),
			'hobbies'=>implode(",",$this->input->post('hobbies')),				
			'profile'=>$this->imageUpload('profile'),
			'created_date' => date("Y-m-d H:i:s")
		);	
				
		$this->db->insert('users',$dataArray);

	}

	public function updateUser($id)
	{
			
		$dataArray=array(
			'firstname'=>$this->input->post('firstname'),
			'lastname'=>$this->input->post('lastname'),
			'email'=>$this->input->post('email'),
			'password'=>md5($this->input->post('password')),
			'phone'=>$this->input->post('phone'),
			'address'=>$this->input->post('address'),
			'dob'=>date("Y-m-d",strtotime($this->input->post('dob'))),
			'gender'=>$this->input->post('gender'),
			'marital_status'=>$this->input->post('marital_status'),
			'education'=>$this->input->post('education'),
			'hobbies'=>implode(",",$this->input->post('hobbies'))
		);	

		if(!empty($_FILES['profile']['name'])){
			$user = $this->db->get_where("users",array("id"=>$id))->row();
			unlink(base_url().'uploads/'.$user->profile);
            $dataArray['profile'] = $this->imageUpload('profile');
        }
			
		$this->db->where("id",$id);	
		$this->db->update('users',$dataArray);

	}

	public function imageUpload($imageName){

		$config['upload_path']='./uploads/';
		$config['allowed_types']='*';

		//load upload class library
        $this->load->library('upload');
        $this->upload->initialize($config);

        if(!$this->upload->do_upload($imageName))
        {
            //In case failure case
            $upload_error=array('error'=>$this->upload->display_errors());
            print_r($upload_error);
        }
        else{

            //In case of Success
            $upload_data=$this->upload->data();
            return $upload_data['file_name'];
        }
	}
}
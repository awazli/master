<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
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
        $this->load->model('user_model');
    }

    public function index()
    {
        $data['users'] = $this->user_model->getUsers();
        $this->load->view('users', $data);
    }

    public function addUser()
    {
        $this->load->view('adduser');
    }

    public function login()
    {
        $this->load->view('login');
    }

    /*multiple image upload*/
    public function save()
    {
        $dataArray = array(
            'firstname' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'phone' => $this->input->post('contact'),
        );
        $this->db->insert("users", $dataArray);
        $user_id = $this->db->insert_id();
        $file = $this->doupload();
        $dataArray = array();
        for ($i = 0; $i < count($file); $i++) {
            $image = "";
            $image = $file[$i];
            $dataArray[] = array(
                'filename' => $image,
                'user_id' => $user_id,
            );
        }

        $this->db->insert_batch("user_files", $dataArray);
        echo "success";
    }

    function doupload()
    {
        $name_array = array();
        $count = count($_FILES['newFiles']['size']);
//        echo $count;echo "count";
        foreach ($_FILES as $key => $value)
            for ($s = 0; $s <= $count - 1; $s++) {

                $_FILES['newFiles']['name'] = $value['name'][$s];
                $_FILES['newFiles']['type'] = $value['type'][$s];
                $_FILES['newFiles']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['newFiles']['error'] = $value['error'][$s];
                $_FILES['newFiles']['size'] = $value['size'][$s];
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
//                $config['max_size']    = '100';
//                $config['max_width']  = '1024';
//                $config['max_height']  = '768';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('newFiles');
                $data = $this->upload->data();
                $name_array[] = $data['file_name'];
            }
        return $name_array;
    }

    public function duplicate()
    {
        $this->load->view("new");
    }

    public function category()
    {
        $query = $this->db->get_where("categories", array('parent_id' => 0))->result();
        $data = array();
        foreach ($query as $row) {
            $row->subcategory = $this->subcategory($row->id);
            $data[] = $row;
        }
        $this->Data['category'] = $data;
        $this->load->view("category", $this->Data);
    }

    public function subcategory($id)
    {
        $subcategory = array();
        $category = array();
            $categoryList = $this->db->get_where("categories", array('parent_id' => $id))->result();

            if (count($categoryList) > 0) {
                foreach ($categoryList as $query) {
                    $category[] = array(
                        'id' => $query->id,
                        'name' => $query->name,
                        'parent_id' => $query->parent_id,
                        'subcategory' => $this->subcategory($query->id),
                        );
                }
            }
        return $category;
    }

    public function saveCategory()
    {
        if ($this->input->post('category') == "") {
            $dataArray = array(
                'name' => $this->input->post('name'),
                'parent_id' => 0,
            );
            $this->db->insert("categories", $dataArray);
        } else {
            $dataArray = array(
                'name' => $this->input->post('name'),
                'parent_id' => $this->input->post('category'),
            );
            $this->db->insert("categories", $dataArray);
        }
        redirect('user/category');
    }

    public function saveUser()
    {
        //Load form_validation library for fire validation
        $this->load->library('form_validation');

        //validation rules
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confrim Password', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('dob', 'Birthday', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('marital_status', 'Marital Status', 'required');
        $this->form_validation->set_rules('education', 'Education', 'required');
        $this->form_validation->set_rules('hobbies[]', 'Hobbies', 'required');

        //if validation is not true then show the save form view
        if ($this->form_validation->run() == FALSE) {
            redirect('user/addUser');
        } //else save the form in database
        else {

            $this->user_model->saveUser();
            redirect('user');
        }

    }

    public function editUser($id)
    {
        $data['user'] = $this->user_model->getUser($id);
        $this->load->view('edituser', $data);
    }

    public function updateUser($id)
    {
        //Load form_validation library for fire validation
        $this->load->library('form_validation');

        //validation rules
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('dob', 'Birthday', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('marital_status', 'Marital Status', 'required');
        $this->form_validation->set_rules('education', 'Education', 'required');
        $this->form_validation->set_rules('hobbies[]', 'Hobbies', 'required');

        //if validation is not true then show the save form view
        if ($this->form_validation->run() == FALSE) {
            redirect('user/editUser/' . $id);
        } //else save the form in database
        else {
            $this->user_model->updateUser($id);
            redirect('user');
        }

    }

    public function deleteUser()
    {
        $id = $this->input->post("id");
        $this->db->where("id", $id);
        $result = $this->db->delete("users");
        if ($result) {
            echo "success";
        }
    }
}

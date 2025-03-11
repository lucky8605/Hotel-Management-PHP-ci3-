<?php
class Login extends CI_Controller
{
    public function __construct()
	{
       parent ::__construct();
       $this->load->model('My_model');
	}

    public function index()
    {
        $this->load->view("login");
    }
    public function process_login()
    {
        if(isset($_POST['email']) && (isset($_POST['password'])))
        {
            $conn['admin_email'] = $_POST['email'];
            $conn['admin_password'] = $_POST['password'];
            $data= $this->My_model->select_where('admin_tbl',$conn);
            if(isset($data[0]['admin_tbl_id']))
            {
                $_SESSION['admin_tbl_id'] = $data[0]['admin_tbl_id'];
                redirect(base_url('hotel'));    
            }
            else
            {
                echo "<script>alert('Login Failed');
                    window.location.href = '" . base_url('login') . "';
                </script>";
            exit; 
            }
        }
    }
}
?>
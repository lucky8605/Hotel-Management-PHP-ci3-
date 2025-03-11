<?php
date_default_timezone_set("Asia/Kolkata");

class Hotel extends CI_Controller
{
   public function __construct()
   {
    parent :: __construct();
    $this->load->model('My_model');

    if(!isset($_SESSION['admin_tbl_id']))
    {
        redirect(base_url('login'));
        exit;
    }
   }
   public function navbar() 
	{
		$this->load->view('hotel/navbar');
	}
	public function footer()
	{
		$this->load->view('hotel/footer');
	}
	public function ov($page,$data="")
	{
        $this->navbar();
        $this->load->view("hotel/" . $page, $data);
        $this->footer();
	}
    public function index()
	{
        $dates = [];
        $amount =[];
        for($i=0;$i<7;$i++)
        {
            $d = date('Y-m-d',strtotime("-$i day"));
            $dates[]=$d;

            $sql="SELECT sum((SELECT sum(total) FROM order_product_tbl WHERE order_tbl.order_tbl_id=order_product_tbl.order_tbl_id))as ttl
             FROM order_tbl WHERE order_date = '$d'";

            $date_amo=$this->db->query($sql)->result_array(); 
            $amount[]=(int)$date_amo[0]['ttl'];
        }
        $data['x_axis']= $dates;
        $data['y_axis']= $amount;
		$this->ov('index',$data);
	}
    public function orders()
    {
        $data['table']=$this->My_model->select("table_tbl");
        $this->ov('orders',$data);
    }
    public function manage_table()
    {
        $conn=['admin_tbl_id'=>$_SESSION['admin_tbl_id']]; // Condition Of only fetch data of admin id
        $data['table']=$this->My_model->select_where("table_tbl",$conn);
        $this->ov('manage_table',$data);
    }
    public function save_table()
    {
        $_POST['admin_tbl_id']=$_SESSION['admin_tbl_id'];
        $this->My_model->insert("table_tbl",$_POST);
        redirect("hotel/manage_table");
    }
    public function edit_table($id)
    {
        $conn=['table_tbl_id'=>$id];
        $data['table']=$this->My_model->select_where("table_tbl",$conn)[0];
        $this->ov('edit_table',$data);
    }
    public function update_table()
    {
        $conn=['table_tbl_id'=>$_POST['table_tbl_id']];
        $this->My_model->update("table_tbl",$conn,$_POST);
        redirect('hotel/manage_table','refresh');
    }
    public function delete_table($id)
	{
		$conn=['table_tbl_id'=>$id];
		$this->My_model->delete("table_tbl",$conn);
		redirect('hotel/manage_table','refresh');
	}
    public function category()
    {
        $data['category']=$this->My_model->select_where('category_tbl',['admin_tbl_id'=>$_SESSION['admin_tbl_id']]); // Second Example of fetch data of condition 
        $this->ov('category',$data);
    }
    public function save_category()
    {
        $_POST['admin_tbl_id']=$_SESSION['admin_tbl_id'];
        $this->My_model->insert("category_tbl",$_POST);
        redirect('hotel/category','refresh');
    }
    public function edit_category($id)
    {
       $conn=['category_tbl_id'=>$id];
       $data['category']=$this->My_model->select_where("category_tbl",$conn)[0];
       $this->ov('edit_category',$data);

    }
    public function update_category()
    {
        $conn=['category_tbl_id'=>$_POST['category_tbl_id']];
        $this->My_model->update("category_tbl",$conn,$_POST);
        redirect('hotel/category','refresh');
    }
    public function delete_category($id)
    {
        $conn=['category_tbl_id'=>$id];
        $this->My_model->delete('category_tbl',$conn);
        redirect('hotel/category','refresh');
    }
    public function product()
    {
        $data['category']=$this->My_model->select_where('category_tbl',['admin_tbl_id'=>$_SESSION['admin_tbl_id']]); // Second Example of fetch data of condition 
        $this->ov('product',$data);
    }
    public function save_product()
    {
        $_POST['admin_tbl_id']=$_SESSION['admin_tbl_id'];
        $_POST['product_img']=$img_name=time().$_FILES['product_img']['name'];
        move_uploaded_file($_FILES['product_img']['tmp_name'],"uploads/$img_name");
        $this->My_model->insert("product_tbl",$_POST);
        redirect('hotel/product','refresh');

    }
    public function product_list()
    {
        // print_r($_GET);
        if(isset ($_GET['search']))
        {
          $data['product']=$this->My_model->search_product($_GET['search']);
        }
        else
        {
            $data['product']=$this->My_model->get_product();
        }
        $this->ov('product_list',$data);
        // print_r($data);

    }
    public function edit_product($id)
    {
        $conn=['product_tbl_id'=>$id];
        $data['category']=$this->My_model->select_where('category_tbl',['admin_tbl_id'=>$_SESSION['admin_tbl_id']]); // Second Example of fetch data of condition 
        $data['product']=$this->My_model->select_where('product_tbl',$conn)[0];
        $this->ov('edit_product',$data);
    }

    public function order_details($id)
    {
        $conn=['order_tbl_id'=>$id];
        $data['order_info']=$this->My_model->select_where("order_tbl",$conn)[0];
        // $data['order_product']=$this->My_model->select_where("order_product_tbl",$conn) ;
        $sql="SELECT * FROM product_tbl, order_product_tbl WHERE order_tbl_id= '$id' AND product_tbl.product_tbl_id = order_product_tbl.product_tbl_id";
        $data['order_product']=$this->db->query($sql)->result_array();
        $this->ov('order_details',$data);
    }

    public function print_bill($id)
    {
        $conn=['order_tbl_id'=>$id];
        $data=['order_status'=>'complete'];
        $this->My_model->update("order_tbl",$conn,$data);
        redirect('hotel/order_details/'. $id,'refresh');

    }
   
    
}
?>

<?php
date_default_timezone_set("Asia/Kolkata");
class User extends CI_Controller
{
    public function __construct()
   {
    parent :: __construct();
    $this->load->model('My_model');
   }

    public function navbar() 
	{
		$this->load->view('user/navbar');
	}
	public function footer()
	{
		$this->load->view('user/footer');
	}
	public function ov($page,$data="")
	{
        $this->navbar();
        $this->load->view("user/" . $page, $data);
        $this->footer();
	}
    public function index()
    {
        $_SESSION['table_id']=$_GET['table_no'];
        $data['category']=$this->My_model->select_where('category_tbl',['admin_tbl_id'=>$_SESSION['admin_tbl_id']]); // Second Example of fetch data of condition 
        $data['products']=$this->My_model->get_product();
        $this->ov('product',$data);
    }

    public function add_product_in_session()
    {

        $_SESSION['cart'][$_GET['product_tbl_id']]=$_GET['qty'];
        if($_GET['qty']==0){
            unset($_SESSION['cart'][$_GET['product_tbl_id']]);
        }
        echo json_encode(["status"=>"success"]);
    }

    public function send_kitchen()
    {
        $order=[
            "order_date"=>date('Y-m-d'),
            "table_tbl_id"=>$_SESSION['table_id'],
            "order_time"=>date('H:i'),
            "order_status"=>"active"
        ];
        $table_tbl_id=$_SESSION['table_id'];
        $sql= "SELECT * FROM order_tbl WHERE table_tbl_id='$table_tbl_id' AND order_status='active'";
        $data=$this->db->query($sql)->result_array();
        if(count($data) > 0)
        {
            $order_id = $data[0]['order_tbl_id'];
        }
        else
        {
            $order_id=$this->My_model->insert("order_tbl",$order);
        }


        foreach($_SESSION['cart'] as $product_tbl_id=>$qty)
        {
            $product=$this->My_model->select_where("product_tbl",["product_tbl_id"=>$product_tbl_id]);
            $product_price=$product[0]['product_price'];
            $total=$product_price*$qty;

            $order_product=[
                "order_tbl_id"=>$order_id,
                "product_tbl_id"=>$product_tbl_id,
                "qty"=>$qty,
                "product_price"=>$product_price,
                "total"=>$total
            ];

            $this->My_model->insert("order_product_tbl",$order_product);
        }
        redirect("user/thank_you");



    }

    public function thank_you()
    {
        $_SESSION['cart']=[];
        $this->ov('thank_you');
    }
}
?>



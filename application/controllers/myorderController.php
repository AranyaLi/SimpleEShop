<?
class MyorderController extends CI_Controller{

	public function index(){
		if(!$this->session->userdata('userid')){
			redirect(base_url().'index.php/loginController');
		}
		$this->load->model("ordermodel");
		$userid=$this->session->userdata("userid");
	
		if($this->input->post("makeorder")){
			//print_r($this->cart->contents());

			$this->load->model("customermodel");
			$this->load->model("orderdetailmodel");

			$user=$this->customermodel->get_customer_by_id($userid);
			$date=date('Y-m-d',time());                 
			$total=0;
			foreach($this->cart->contents() as $row){
				$total+=$row['subtotal'];
			}
			$order=array(
					"CustomerID"=>$userid,
					"OrderDate"=>$date,
					"TotalCost"=>$total,
					"ShippingAddress"=>$user['Address'],
					"BillingAddress"=>$user['Address']
				    );

			$this->db->trans_start();
			$this->ordermodel->insert($order);
			$last_id=$this->db->insert_id();

			foreach($this->cart->contents() as $row){
				$orderdetail=array(
						"OrderID"=>$last_id,
						"ProductID"=>$row['id'],
						"ProductQty"=>$row['qty'],
						"ProductPrice"=>$row['price']
						);
				$this->orderdetailmodel->insert($orderdetail);
				$this->db->trans_complete();		

			}

		}
		$data['orders']=$this->ordermodel->get_order_by_customerid($userid);
               	$this->load->view("myorderView", $data);

	}

	public function seedetail(){
		if(!$this->session->userdata('userid')){
			redirect(base_url().'index.php/loginController');
		}
		$orderid=$this->input->post("showorderid");
		$this->load->model("orderdetailmodel");
		$data['products']=$this->orderdetailmodel->get_order_by_orderid($orderid);
                //print_r($data);
		$this->load->view("orderdetail", $data);
	
	}


}


?>

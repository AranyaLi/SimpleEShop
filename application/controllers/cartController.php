<?
class CartController extends CI_Controller{

        public function index(){

		$this->load->view("cartView");
	}


	public function addtoCart($pid){

		$this->load->model("productmodel", "model");
		$product=$this->model->get_product_by_id($pid);
		//print_r($product);

		if($find=$this->productExists($pid)==-1){
			$data=array(
					'id'=>$product['ProductID'],
					'qty'=>1,
					"price"=>$product['ProductPrice'],
					"name"=>$product['ProductName'],
					"discount"=>$product['Discount']

				   );

			if($data['discount']<0.99){
				$data['price']=$data['price']*$data['discount'];

				$data['subtotal']=$data['price']*$data['discount']*$data['qty'];
			}
			else{
				$data['subtotal']=$data['price']*$data['qty'];	

			}
			$this->cart->insert($data);
		}
		$this->load->view("cartView");

	}

	public function productExists($pid){

		$find=-1;
		foreach($this->cart->contents()as $row){

			if($row['id']===$pid){
				$qty=$row['qty']+1;
				$data=array('rowid'=>$row['rowid'], 'qty'=>$qty);
				$this->cart->update($data);
				$find=$pid;
				break;
			}
		}
		return $find;

	}

	public function cartOPs(){

		$command=$this->input->post("command");
		$removepid=$this->input->post("removepid");

		if($command=="remove"){
			foreach($this->cart->contents()as $row){

				if($row['id']===$removepid){
					$data=array('rowid'=>$row['rowid'], 'qty'=>0);
					$this->cart->update($data);
					break;
				}
			}

		}


		if($command=="update"){
			foreach($this->cart->contents()as $row){

				$pid=$row['id'];
				if($this->input->post('item_qty'.$pid))
					$qty=$this->input->post('item_qty'.$pid);
				if(is_numeric($qty)&& $qty>0){
					$data=array('rowid'=>$row['rowid'], 'qty'=>$qty);
					$this->cart->update($data);
				}else{
					echo'<script> alert ("Enter Valid Quantity");</script>';	

				}

			}
		}

		if($this->input->post('clear')=='Clear'){

			foreach($this->cart->contents()as $row){

				$data=array('rowid'=>$row['rowid'], 'qty'=>0);
				$this->cart->update($data);
			}



		}

		if($command=="checkout"){
			if($this->session->userdata('userid')){
				redirect(base_url().'index.php/checkoutController');

			}else{
                                redirect(base_url().'index.php/loginController');
			}

		}

		$this->load->view("cartView");
	}



}

?>

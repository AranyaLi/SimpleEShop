<?

class CheckoutController extends CI_Controller{

public function index(){
if(!$this->session->userdata('userid')){
			redirect(base_url().'index.php/loginController');
		}

$userid=$this->session->userdata('userid');
$this->load->model("customermodel", "model");
$data['user']=$this->model->get_customer_by_id($userid);
//print_r($data);
$this->load->view("checkoutView", $data);
}


}



?>

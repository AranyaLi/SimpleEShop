<?
class HomepageController extends CI_Controller{

public function index(){
$this->load->database();
$this->load->helper('url');
$this->load->model("productmodel", "model");

$data['product']=$this->model->get_product();
$this->load->view("homepageView.php", $data);

}


}



?>

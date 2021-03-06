<?

class MyaccountController extends CI_Controller{

	public function index(){

		if(!$this->session->userdata('userid')){
			redirect(base_url().'index.php/loginController');
		}
		$userid=$this->session->userdata('userid');
		$this->load->model("customermodel","model");
		$data['row']=$this->model->get_customer_by_id($userid);
		$this->load->view("myaccountView", $data);

		if($this->input->post("updateaccount")){
			$firstname=$this->input->post("firstname");

			$lastname=$this->input->post("lastname");
			if (!preg_match("/^[a-zA-Z ]*$/",$firstname) || !preg_match("/^[a-zA-Z ]*$/",$lastname)) {
				echo "<script>alert('Enter Valid Name!');</script>";
				return;
			}

			$password=$this->input->post("password");
			if (!preg_match("/^[a-zA-Z0-9]{5,15}$/",$password) ) {
				echo "<script>alert('Password is 5-15 characters long, character and digit only');</script>";
				return;
			}
			$email=$this->input->post("email");
			if (!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/",$email)) {
				echo "<script>alert('Enter Valid Email');</script>";
				return;
			}
			$country=$this->input->post("address5");
			$gender=$this->input->post("gender");
			if(!is_numeric($this->input->post("address4"))){
				echo "<script>alert('Enter Valid Postal Number');</script>";
				return;
			}
			if (!preg_match("/^[a-zA-Z0-9, -]*$/",$this->input->post("address1")) ||!preg_match("/^[a-zA-Z0-9, -]*$/",$this->input->post("address2"))||!preg_match("/^[a-zA-Z0-9, -]*$/",$this->input->post("address3"))||!preg_match("/^[a-zA-Z0-9, -]*$/",$this->input->post("address4")) ) {
				echo "<script>alert('Enter Valid Address!');</script>";
				return;
			}

			$addr=$this->input->post("address1").','.$this->input->post("address2").','.$this->input->post("address3").','.$this->input->post("address4").','.$country;
			if(is_numeric($this->input->post("phone")))
				$phone=$this->input->post("phone");
			else{
				echo "<script>alert('Enter Valid Phone Number');</script>";
				return;
			}
			$data=array("FirstName"=>$firstname,"LastName"=>$lastname,
					"Address"=>$addr, "Gender"=>$gender, "PhoneNo"=>$phone, "Email"=>$email, "Password"=>$password,
				   );

			$this->model->update_by_id($userid, $data);

			redirect($this->uri->uri_string());
			//print_r( $data);
			//echo $userid;
		}


	}



}


?>

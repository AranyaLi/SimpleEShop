<?

class Customermodel extends CI_Model{


public function __construct(){
		parent::__construct();
	}

public function get_customer_by_id($cid){

	$this->db->where("CustomerID", $cid);
	$query=$this->db->get("Customer");
	$data=$query->result_array();
	if($query->num_rows()>0)
	return $data[0];
        else
        return false;

}

public function get_customer_by_login($pwd, $email){

	$this->db->where("Password", $pwd);
        $this->db->where("Email", $email);
	$query=$this->db->get("Customer");
	$data=$query->result_array();
        if($query->num_rows()>0)
	return $data[0];
        else
        return false;

}

public function insert_by_signup($pwd, $email){
	$data=array("Password"=>$pwd, "Email"=>$email);
	$this->db->insert("Customer", $data);
}

public function update_by_id($cid,$data){
	$this->db->where("CustomerID", $cid);
	$this->db->update("Customer", $data);
}


}

?>

<?

class Productmodel extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function get_product(){
		$query=$this->db->get("Product");
		$data=array();
		
		return $data=$query->result_array();

	}
	public function get_product_by_id($pid){
		$this->db->where("ProductID", $pid);
		$query=$this->db->get("Product");
		$data=$query->result_array();
		return $data[0];

	}

	public function get_sales_product_by_cate($cid){
		$this->db->select('*');
		$this->db->from("Product");
		$this->db->join('ProdCategory', "ProdCategory.ProductID=Product.ProductID and ProdCategory.CategoryID='$cid' and Product.Discount<0.99");
                $query=$this->db->get();
		$data=$query->result_array();
		if($query->num_rows()>0)
			return $data;
        	else
        		return false;

	}

	public function get_normal_product_by_cate($cid){
		$this->db->select('*');
		$this->db->from("Product");
		$this->db->join('ProdCategory', "ProdCategory.ProductID=Product.ProductID and ProdCategory.CategoryID='$cid' and Product.Discount=0.99");
                $query=$this->db->get();
		$data=$query->result_array();
		if($query->num_rows()>0)
			return $data;
        	else
        		return false;
		
	}




}
?>

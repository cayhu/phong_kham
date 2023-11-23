<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Madmin extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function get_data_table($table){
		$sql=$this->db->get($table);
		return $sql->result_array(); 
	}
	public function log($str){
		$this->db->where($str);
		$sql=$this->db->get('tbl_admin')->result_array();
		if(count($sql)>0){
			return true;
		}
		return false;
	}
	public function menu_parent(){
		$this->db->order_by('id','asc');
		$sql=$this->db->get('tbl_loaixe');
		return $sql->result_array(); 
	}
	public function sub_menu($parent){
		$this->db->where('id',$parent);
		$sql=$this->db->get('tbl_menu');
		return $sql->result_array(); 
	}
    public function get_data_where($table,$where){
        $this->db->order_by('id','desc');
    	$this->db->where($where);
    	$sql=$this->db->get($table);
		return $sql->result_array(); 
    }
    public function get_data($table){
    	$this->db->order_by('id','desc');
    	$sql=$this->db->get($table);
		return $sql->result_array(); 
    }
	//insert data
	public function insert_data($table,$str){
		return $this->db->insert($table,$str);
	}
	public  function delete_image($table,$where,$folder){
        $this->db->where($where);
        $sql=$this->db->get($table)->result_array();
        foreach ($sql as $key) {
        	if(file_exists("public/".$folder."/".$key['img'])){
        		return unlink("public/".$folder."/".$key['img']);
        	}	
        }
	}
    public  function delete_image_img3d($table,$where,$folder){
        $this->db->where($where);
        $sql=$this->db->get($table)->result_array();
        foreach ($sql as $key) {
            if(file_exists("public/".$folder."/".$key['avata'])){
                return unlink("public/".$folder."/".$key['avata']);
            }   
        }
    }
	public  function delete_image_product($table,$where,$folder){
        $this->db->where($where);
        $sql=$this->db->get($table)->result_array();
        foreach ($sql as $key) {
        	if(file_exists("public/".$folder."/".$key['img'])){
        		return unlink("public/".$folder."/".$key['img']);
        	}	
        }
	}
	public  function delete_image_thuvienanh($table,$where){
        $this->db->where($where);
        $sql=$this->db->get($table)->result_array();
        foreach ($sql as $key) {
        	$a=$key['imgs'];
        }
        	$tam=explode(",",$a);
        	for ($i=0; $i <count($tam) ; $i++) {
        	 	if(file_exists("public/images/".$tam[$i])){
        		 unlink("public/images/".$tam[$i]);
        	    }
            }
        
	}
	public  function delete_image_anh3d($where){
        $this->db->where($where);
        $sql=$this->db->get("tbl_anh3d")->result_array();
        foreach ($sql as $key) {
        	$a=$key['img'];
        }
        	$tam=explode(",",$a);
        	for ($i=0; $i <count($tam) ; $i++) {
        	 	if(file_exists("public/xe/".$tam[$i])){
        		 unlink("public/xe/".$tam[$i]);
        	    }
            }
        
	}
	public function delete_data($table,$where){
		$this->db->where($where);
		return $this->db->delete($table);
	}
	public function get_update_data($table,$where,$str){
		$this->db->where($where);
		return $this->db->update($table,$str);
	}
	public function menu($id){
		$this->db->where('id',$id);
        $sql=$this->db->get('tbl_menu')->result_array();
		foreach ($sql as $key) {
			return $key['title'];
		}
	}
	public function check_login($arr){
        $this->db->where($arr);
        $data=$this->db->get("tbl_admin");
        $sql=$data->result_array();
        if(count($sql)>0){
            return true;
        }else{
            return false;
        }

    }
    public function changepass($str){
      return $this->db->update('tbl_admin',$str);
    }
    public function get_cart($bill){
 		 $this->db->where("tbl_bill.bill",$bill);
 		 $this->db->group_by("tbl_bill.bill");
 		 $this->db->select('*');
 		 $this->db->select_sum('tbl_bill_detail.total');
 		 $this->db->from("tbl_bill_detail");
 		 $this->db->join("tbl_bill","tbl_bill_detail.bill=tbl_bill.bill");
 		 return $this->db->get()->result_array();
 	}
 	public function list_cart($status){
 		 $this->db->where("tbl_bill_detail.status",$status);
 		 $this->db->group_by("tbl_bill.bill");
 		 $this->db->select('*');
 		 $this->db->from("tbl_bill_detail");
 		 $this->db->join("tbl_bill","tbl_bill_detail.bill=tbl_bill.bill");
 		 return $this->db->get()->result_array();
 	}
 	public function get_count_tbl($tbl){
 		return $this->db->count_all($tbl);
 	}
}
<?php
class Phongkham extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function getdata($tbl){
		$db=$this->db->get($tbl);
		return $db->result_array();
	}
	public function get_slide($tbl){
		$this->db->order_by('id','desc');
		$db=$this->db->get($tbl);
		return $db->result_array();
	}
	public function get_menu($where){
		$this->db->where($where);
		$db=$this->db->get("tbl_menu");
		return $db->result_array();
	}
	public function get_news_view_more(){
		$this->db->limit(5,0);
		$this->db->order_by('view','desc');
		$db=$this->db->get("tbl_news");
		return $db->result_array();
	}
	public function get_quession(){
		$this->db->limit(10,0);
		$this->db->order_by('view','desc');
		$db=$this->db->get("tbl_quession");
		return $db->result_array();
	}
	public function get_quession2(){
		$this->db->order_by('id','desc');
		$db=$this->db->get("tbl_quession");
		return $db->result_array();
	}
	public function get_1_data_new($where){
		$this->db->where($where);
		$this->db->limit(1,0);
		$this->db->order_by('id','desc');
		$db=$this->db->get("tbl_post");
		return $db->result_array();
	}
	public function get_order_data_new($where){
		$this->db->where($where);
		$this->db->limit(5,0);
		$this->db->order_by('id','desc');
		$db=$this->db->get("tbl_post");
		return $db->result_array();
	}
	public function get_menu_where($where){
		$this->db->where($where);
		$db=$this->db->get("tbl_menu");
		return $db->result_array();
	}
	public function get_data_where($tbl,$where){
		$this->db->where($where);
		$db=$this->db->get($tbl);
		return $db->result_array();
	}
	public function get_insert_data($tbl,$str){
		return $this->db->insert($tbl,$str);
	}
	public function get_update_view($tbl,$id){
		$this->db->where('id',$id);
	    $sql=$this->db->get($tbl)->result_array();
	    foreach ($sql as $key) {
	      $view=$key['view'];
	    }
	    $this->db->where('id',$id);
	    return $this->db->update($tbl,array('view'=>$view+1));
	}
	public function get_news(){
		$this->db->order_by("id","desc");
		$db=$this->db->get("tbl_news");
		return $db->result_array();
	}
	public function get_quesstion(){
		$this->db->order_by("id","desc");
		$db=$this->db->get("tbl_quession");
		return $db->result_array();
	}
}

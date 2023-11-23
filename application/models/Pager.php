<?php 
class Pager extends CI_Model{
      public function __construct(){
      	 parent::__construct();
      	 $this->load->database();
      }
      //Ham lay tong so may tin theo tung loai
      public function count_all($id){
      	$this->db->where($id);
		return $this->db->count_all_results('tbl_post');
	  }
	  //Tinh so trang
      public function sotrang($numrow,$limit){
        $numpage=(($numrow%$limit)==0)?$numrow/$limit: floor($numrow/$limit)+1;
        return $numpage;
      }
      //Tim vi tri bat dau
	 public function start($limit)
	 {

	   $s="";
	   if(!isset($_GET['page']) || $_GET['page']==1)
	   {
	     $s=0;
		 $page=1;
	   }
	   else
	   {
	     $s=($_GET['page']-1) * $limit;
	   }
	   return $s;
	 }
	 //Lay tin theo vi tri phan trang
    public function list_all($limit,$start,$id){
    	$this->db->where($id);
    	$this->db->order_by("id","desc");
    	$this->db->limit($limit,$start);
		$sql=$this->db->get('tbl_post');
		return $sql->result_array();
	}
} 
?>
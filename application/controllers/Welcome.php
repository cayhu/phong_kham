<?php
class Welcome extends CI_Controller {
	public $title="BSCKI NGÔ HOÀNG HƠN - Chuyên khoa ngoại tổng quát";
	public function __construct(){
		parent::__construct();
		$this->load->model('phongkham');
	}
	public function index(){
		$data['title']=$this->title;
		$data['pview']="frontend/home";
		$this->load->view('layout',$data);
	}
	public function about(){
		$data['title']="Về chúng tôi - ".$this->title;
		$data['pview']="frontend/about";
		$this->load->view('layout',$data);
	}
	public function contact(){
		$data['title']="Liên hệ với chúng tôi - ".$this->title;
		$data['pview']="frontend/contact";
		$this->load->view('layout',$data);
	}
	public function book(){
		$data['title']="Đặt lịch hẹn - ".$this->title;
		$data['pview']="frontend/book";
		$this->load->view('layout',$data);
	}
	public function booking(){
		$name=$this->input->post('name');
		$phone=$this->input->post('phone');
		$content=$this->input->post('content');
		$str=array(
			'name'=>$name,
			'phone'=>$phone,
			'content'=>$content,
			'status'=>0
		);
		if($this->phongkham->get_insert_data("tbl_book",$str)){
		  redirect(base_url()."dat-lich-hen.htm?success");	
		}else{
		redirect(base_url()."dat-lich-hen.htm?error");	
		}
	}
	public function uudai(){
		$data['title']="Ưu đãi - ".$this->title;
		$data['pview']="frontend/uu-dai";
		$this->load->view('layout',$data);
	}
	public function parent($id){
		foreach ($this->phongkham->get_menu_where(array('id'=>$id)) as $key) {
			$data['title']=$key['title']." - ".$this->title;
			$data['menu']=$key['title'];
		}
		$data['pview']="frontend/parent";
		//////////////////////////////////////////////////////
    	$this->load->model('pager');
    	$limit=24;
    	$numrow=$this->pager->count_all(array('parent'=>$id));
    	$numpage=$this->pager->sotrang($numrow,$limit);
    	$start=$this->pager->start($limit);
    	$data['data']=$this->pager->list_all($limit,$start,array('parent'=>$id));
    	$data['npage']=$numpage;
		//////////////////////////////////////////////////////
		$this->load->view('layout',$data);
	}
	public function child($id){
		foreach ($this->phongkham->get_menu_where(array('id'=>$id)) as $key) {
			$data['title']=$key['title']." - ".$this->title;
			$data['menu']=$key['title'];
			$parent=$key['parent'];
		}
		foreach ($this->phongkham->get_menu_where(array('id'=>$parent)) as $key2) {
            $data['menuparent']=$key2['title'];
            $data['menuparentid']=$key2['id'];
		}
		$data['pview']="frontend/child";
		//////////////////////////////////////////////////////
    	$this->load->model('pager');
    	$limit=24;
    	$numrow=$this->pager->count_all(array('child'=>$id));
    	$numpage=$this->pager->sotrang($numrow,$limit);
    	$start=$this->pager->start($limit);
    	$data['data']=$this->pager->list_all($limit,$start,array('child'=>$id));
    	$data['npage']=$numpage;
		//////////////////////////////////////////////////////
		$this->load->view('layout',$data);
	}
	public function detail($id){
		foreach ($this->phongkham->get_data_where("tbl_post",array('id'=>$id)) as $key) {
			$data['title']=$key['title']." - ".$this->title;
		}
		$this->phongkham->get_update_view("tbl_post",$id);
		$data['data']=$this->phongkham->get_data_where("tbl_post",array('id'=>$id));
		$data['pview']="frontend/detail-post";
		$this->load->view('layout',$data);
	}
	public function news(){
		$data['title']="Tin tức - ".$this->title;
		$data['data']=$this->phongkham->get_news();
		$data['pview']="frontend/news";
		$this->load->view('layout',$data);
	}
	public function detailnews($id){
		foreach ($this->phongkham->get_data_where('tbl_news',array('id'=>$id)) as $key) {
			$data['title']=$key['title']." - ".$this->title;
		}
		$this->phongkham->get_update_view("tbl_news",$id);
		$data['data']=$this->phongkham->get_data_where('tbl_news',array('id'=>$id));
		$data['pview']="frontend/detail-news";
		$this->load->view('layout',$data);
	}
	public function quesstion(){
		$data['title']="Câu hỏi thường gặp - ".$this->title;
		$data['data']=$this->phongkham->get_quession2();
		$data['pview']="frontend/quesstion";
		$this->load->view('layout',$data);
	}
	public function detailquess($id){
		foreach ($this->phongkham->get_data_where('tbl_quession',array('id'=>$id)) as $key) {
			$data['title']=$key['title']." - ".$this->title;
		}
		$this->phongkham->get_update_view("tbl_quession",$id);
		$data['data']=$this->phongkham->get_data_where('tbl_quession',array('id'=>$id));
		$data['pview']="frontend/detail-quess";
		$this->load->view('layout',$data);
	}
}

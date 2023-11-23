<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cadmin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->Model('madmin');
	}
	public function index(){
			$this->load->view('backend/login');
	}
    //dang nhap
	public function login(){
		$username=$this->input->post('username');
		$password=substr(md5($this->input->post('password')),0,32);
		$str=array('username'=>$username,"password"=>$password);
		if($this->madmin->log($str)==true){
               $this->session->set_userdata(array('admin_log'=>$username));
               redirect(base_url()."admin?success");
		}else{
			redirect(base_url()."admin?err=1");
		}
	}
    public function changepass(){
    $data['title']="Đổi mật khẩu quản trị - Hệ thống quản trị website";
    $data['phome']="backend/changepass";
    $this->load->view('backend/dashboard',$data);
    }
    public function action_change_password(){
        $user=$this->input->post('id');
        $pass=$this->input->post('password');
        $passnew=$this->input->post('passnew');
        $repassnew=$this->input->post('repassnew');
        $p=substr(md5($pass),0,32);
        $pn=substr(md5($passnew),0,32);
        $arr=array('username'=>$user,'password'=>$p);
        $str=array('username'=>$user,'password'=>$pn);
        if($this->madmin->check_login($arr)==true){
            if($this->madmin->changepass($str)){
                 redirect(base_url()."cadmin/changepass?err=0");
            }else{
                redirect(base_url()."cadmin/changepass?err=1");
            }
           
        }else{
              echo "<meta charset='utf-8'>";
              echo "<script>alert('Sai mật khẩu');</script>";
              echo "<script>window.location='".base_url()."cadmin/changepass';</script>";
        }
    }
    
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url()."admin");
	}
    public function dashboard(){
    	$data['title']="Hệ thống quản trị website";
    	$data['phome']="backend/home";
    	$this->load->view('backend/dashboard',$data);
    }
    public function listmenu(){
        $data['title']="Danh sách danh mục - Hệ thống quản trị website";
        $data['phome']="backend/list-menu";
        $this->load->view('backend/dashboard',$data);
    }
    public function editmenu($id){
        $data['id']=$id;
        $data['title']="Cập nhật danh mục - Hệ thống quản trị website";
        $data['phome']="backend/edit-menu";
        $data['data']=$this->madmin->get_data_where("tbl_menu",array('id'=>$id));
        $this->load->view('backend/dashboard',$data);
    }
    public function prosess_update_menu($id){
        $table="tbl_menu";
        $title=$this->input->post('title');
        $where=array('id'=>$id);
        $str=array('title'=>$title);
        if($this->madmin->get_update_data($table,$where,$str)){
            redirect(base_url()."cadmin/listmenu?err=0");
        }else{
         redirect(base_url()."cadmin/listmenu?err=1");
        }
     }
     public function prosess_add_menu(){
        $table="tbl_menu";
        $title=$this->input->post('title');
        $parent=$this->input->post('parent');
        if($parent=="yes"){
             $str=array('title'=>$title,'parent'=>0,'level'=>1);
               
        }else{
            $str=array('title'=>$title,'parent'=>$parent,'level'=>2);
        }
      
        if($this->madmin->insert_data($table,$str)){
            redirect(base_url()."cadmin/addmenu?err=0");
        }else{
            redirect(base_url()."cadmin/addmenu?err=1");
        }
    }
    public function deletemenu($id){
        $table="tbl_menu";
        $where=array('id'=>$id);
        if($this->madmin->delete_data($table,$where)){
            redirect(base_url()."cadmin/listmenu?err=0");
        }else{
            redirect(base_url()."cadmin/listmenu?err=1");
        }
    }
    public function addslide(){
        $data['title']="Thêm slide ảnh - Hệ thống quản trị website";
        $data['phome']="backend/add-slide";
        $this->load->view('backend/dashboard',$data);
    }
    public function prosess_add_slide(){
        $config['upload_path'] = './public/slide/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
            $data=$this->upload->data();
            $img=$data['file_name'];       
        }
    
        $str=array('img'=>$img,'src'=>$this->input->post('url'));
        $table="tbl_slide";
        if($this->madmin->insert_data($table,$str)){
            redirect(base_url()."cadmin/addslide?err=0");
        }
        redirect(base_url()."cadmin/addslide?err=1");
    }
    public function updateslide($id){
        $data['title']="Cập nhật banner - Hệ thống quản trị website";
        $data['phome']="backend/update-slide";
        $data['id']=$id;
        $data['data']=$this->madmin->get_data_where('tbl_slide',array('id'=>$id));
        $this->load->view('backend/dashboard',$data);
    }
    public function prosess_update_ads($id){
        if(isset($_FILES['img']['name']) && $_FILES['img']['name']!=null){
            $avata=$this->input->post('anh');
            if(file_exists("public/slide/".$avata)){
                unlink("public/slide/".$avata);
            }
            $config['upload_path'] = './public/slide/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            if($this->upload->do_upload('img')){
                    $data=$this->upload->data();
                    $img=$data['file_name'];
                
            }
        }else{
            $img=$this->input->post('anh');
        }
        $link=$this->input->post('link');
        $str=array('img'=>$img,'url'=>$link);
        $table="tbl_slide";
        $where=array('id'=>$id);
        if($this->madmin->get_update_data($table,$where,$str)){
            redirect(base_url()."cadmin/listslide?err=0");
        }else{
            redirect(base_url()."cadmin/listslide?err=1");
        }
    }
    public function deleteslide($id){
        $where=array('id'=>$id);
        $table="tbl_slide";
        $folder="slide";
        $this->madmin->delete_image($table,$where,$folder);
        if($this->madmin->delete_data($table,$where)){
             redirect(base_url()."cadmin/listslide?err=0");
        }redirect(base_url()."cadmin/listslide?err=1");
    }
    
    public function listslide(){
        $data['title']="Danh sách slide - Hệ thống quản trị website";
        $data['phome']="backend/list-slide";
        $data['data']=$this->madmin->get_data('tbl_slide');
        $this->load->view('backend/dashboard',$data);
    }
    
    public function addpost(){
        $data['title']="Thêm bài viết - Hệ thống quản trị website";
        $data['phome']="backend/add-post";
        $this->load->view('backend/dashboard',$data);
    }
    public function prosess_add_post(){
        /////////////////////////////////////////
        $config['upload_path'] = './public/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        //////////////////////////////////////////
        if($this->upload->do_upload('img')){
                $data=$this->upload->data();
                $img=$data['file_name'];
            
         }
        $title=$this->input->post('title');
        $cate=$this->input->post('cate');
        $arr=explode("/",$cate);
        $parent=$arr[0];
        $child=$arr[1];
        $content=$this->input->post('editor1');
        $str=array(
            'title'=>$title,
            'img'=>$img,
            'parent'=>$parent,
            'child'=> $child,
            'content'=>$content,
            'view'=>0,
            'date'=>$this->datetime()
            );
         $table="tbl_post";
         if($this->madmin->insert_data($table,$str)){
                redirect(base_url()."cadmin/addpost?err=0");
         }else{
             redirect(base_url()."cadmin/addpost?err=1");
         }

    }
    public function listpost(){
        $data['title']="Danh sách tin - Hệ thống quản trị website";
        $data['phome']="backend/list-post";
        
        if(isset($_GET['cate'])){
            $where=array('child'=>$_GET['cate']);
        }else{
            $where=array();
        }
        $data['data']=$this->madmin->get_data_where('tbl_post',$where);
        $this->load->view('backend/dashboard',$data);
    }
    public function deletebds($id){
        $table="tbl_tin_bds";
        $where=array('id'=>$id);
        $folder="images";
        $this->madmin->delete_image_product($table,$where,$folder);
        $this->madmin->delete_image_thuvienanh($table,$where);
       if($this->madmin->delete_data($table,$where)){
           redirect(base_url()."cadmin/listbds?err=0");
        } redirect(base_url()."cadmin/listbds?err=1"); 
    }
    public function updatepost($id){
        $data['id']=$id;
        $data['title']="Cập nhật sản phẩm - Hệ thống quản trị website";
        $data['phome']="backend/edit-post";
        $data['data']=$this->madmin->get_data_where('tbl_post',array('id'=>$id));
        $this->load->view('backend/dashboard',$data);
    }
    public function prosess_update_post($id){
        $table="tbl_post";
        $where=array('id'=>$id);
        $config['upload_path'] = './public/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        ////////////////////////////////////////////////////////////////
        if(isset($_FILES['img']['name']) && $_FILES['img']['name']!=null){
            $avata=$this->input->post('ava');
            if(file_exists("public/images/".$avata)){
                unlink("public/images/".$avata);
            }
            
            if($this->upload->do_upload('img')){
                    $data=$this->upload->data();
                    $img=$data['file_name'];
                
            }
        }else{
            $img=$this->input->post('ava');
        }
        ////////////////////////////////////////////////////////////////
        $title=$this->input->post('title');
        $cate=$this->input->post('cate');
        $arr=explode("/",$cate);
        $parent=$arr[0];
        $child=$arr[1];
        $content=$this->input->post('editor1');
        $str=array(
            'title'=>$title,
            'img'=>$img,
            'parent'=>$parent,
            'child'=> $child,
            'content'=>$content,
            'date'=>$this->datetime()
            );
        $where=array('id'=>$id);
        if($this->madmin->get_update_data($table,$where,$str)){
            redirect(base_url()."cadmin/listpost?err=0");
        }
        redirect(base_url()."cadmin/listpost?err=1");
    }
    public function addtour(){
        $data['title']="Thêm tour- Hệ thống quản trị website";
        $data['phome']="backend/add-tour";
        $this->load->view('backend/dashboard',$data);
    }
    public function prosess_add_tour(){
        /////////////////////////////////////////
        $config['upload_path'] = './public/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        //////////////////////////////////////////
        if($this->upload->do_upload('img')){
                $data=$this->upload->data();
                $img=$data['file_name'];
            
         }
         //////////////////////////////////////////
        $file=$_FILES['imgs'];
        if(isset($file['name'])){
            $str_img="";
                for ($i=0; $i < count($file['name']) ; $i++) { 
                    $_FILES['userfile']['name']= $file['name'][$i];  
                    $_FILES['userfile']['type']= $file['type'][$i]; 
                    $_FILES['userfile']['tmp_name']= $file['tmp_name'][$i];
                    $_FILES['userfile']['error']= $file['error'][$i]; 
                    $_FILES['userfile']['size']= $file['size'][$i]; 
                   if($this->upload->do_upload()){
                        $data=$this->upload->data();
                        $str_img.=$data['file_name'].",";
                   }
                }
            $imgs=substr($str_img,0, strlen($str_img)-1); 
        }
        $title_vi=$this->input->post('title_vi');
        $title_en=$this->input->post('title_en');
        $gia=$this->input->post('gia');
        $gia_sale=$this->input->post('gia_sale');
        $note_vi=$this->input->post('note_vi');
        $note_en=$this->input->post('note_en');
        $cate=$this->input->post('cate');
        $content_vi=$this->input->post('editor1');
        $content_en=$this->input->post('editor2');
        $str=array(
            'title_vi'=>$title_vi,
            'title_en'=>$title_en,
            'img'=>$img,
            'imgs'=>$imgs,
            'type'=>$cate,
            'price_sale'=>$gia_sale,
            'price'=>$gia,
            'note_vi'=>$note_vi,
            'note_en'=>$note_en,
            'content_vi'=>$content_vi,
            'content_en'=>$content_en,
            'view'=>0
            );
         $table="tbl_tour";
         if($this->madmin->insert_data($table,$str)){
                redirect(base_url()."cadmin/addtour?err=0");
         }else{
             redirect(base_url()."cadmin/addtour?err=1");
         }

       }
       public function listtour(){
        $data['title']="Danh sách tour - Hệ thống quản trị website";
        $data['phome']="backend/list-tour";
        
        if(isset($_GET['cate'])){
            $where=array('type'=>$_GET['cate']);
        }else{
            $where=array();
        }
        $data['data']=$this->madmin->get_data_where('tbl_tour',$where);
        $this->load->view('backend/dashboard',$data);
    }
    public function deletetour($id){
        $table="tbl_tour";
        $where=array('id'=>$id);
        $folder="images";
        $this->madmin->delete_image_product($table,$where,$folder);
        $this->madmin->delete_image_thuvienanh($table,$where);
       if($this->madmin->delete_data($table,$where)){
           redirect(base_url()."cadmin/listtour?err=0");
        } redirect(base_url()."cadmin/listtour?err=1"); 
    }
    public function updatetour($id){
        $data['id']=$id;
        $data['title']="Cập nhật sản phẩm - Hệ thống quản trị website";
        $data['phome']="backend/edit-tour";
        $data['data']=$this->madmin->get_data_where('tbl_tour',array('id'=>$id));
        $this->load->view('backend/dashboard',$data);
    }
    public function prosess_update_tour($id){
        $table="tbl_tour";
        $where=array('id'=>$id);
        $config['upload_path'] = './public/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        ////////////////////////////////////////////////////////////////
        if(isset($_FILES['img']['name']) && $_FILES['img']['name']!=null){
            $avata=$this->input->post('ava');
            if(file_exists("public/images/".$avata)){
                unlink("public/images/".$avata);
            }
            
            if($this->upload->do_upload('img')){
                    $data=$this->upload->data();
                    $img=$data['file_name'];
                
            }
        }else{
            $img=$this->input->post('ava');
        }
        ////////////////////////////////////////////////////////////////
        $file=$_FILES['imgs'];
        if(count($file['name'])>1){
            $this->madmin->delete_image_thuvienanh($table,$where);
            $str_img="";
            for ($i=0; $i < count($file['name']) ; $i++) { 
                $_FILES['userfile']['name']= $file['name'][$i];  
                $_FILES['userfile']['type']= $file['type'][$i]; 
                $_FILES['userfile']['tmp_name']= $file['tmp_name'][$i];
                $_FILES['userfile']['error']= $file['error'][$i]; 
                $_FILES['userfile']['size']= $file['size'][$i]; 
               if($this->upload->do_upload()){
                    $data=$this->upload->data();
                    $str_img.=$data['file_name'].",";

               }
            }
            $imgs=substr($str_img,0, strlen($str_img)-1);
        }else{
            echo $imgs=$this->input->post('limgs');
        }
       
        ////////////////////////////////////////////////////////////////
        $title_vi=$this->input->post('title_vi');
        $title_en=$this->input->post('title_en');
        $gia=$this->input->post('gia');
        $gia_sale=$this->input->post('gia_sale');
        $note_vi=$this->input->post('note_vi');
        $note_en=$this->input->post('note_en');
        $cate=$this->input->post('cate');
        $content_vi=$this->input->post('editor1');
        $content_en=$this->input->post('editor2');
        $str=array(
            'title_vi'=>$title_vi,
            'title_en'=>$title_en,
            'img'=>$img,
            'imgs'=>$imgs,
            'type'=>$cate,
            'price_sale'=>$gia_sale,
            'price'=>$gia,
            'note_vi'=>$note_vi,
            'note_en'=>$note_en,
            'content_vi'=>$content_vi,
            'content_en'=>$content_en
            );
         if($this->madmin->get_update_data($table,$where,$str)){
            redirect(base_url()."cadmin/listtour?err=0");
        }
        redirect(base_url()."cadmin/listtour?err=1");
    }
    public function addhotel(){
        $data['title']="Thêm khách sạn- Hệ thống quản trị website";
        $data['phome']="backend/add-hotel";
        $this->load->view('backend/dashboard',$data);
    }
    public function prosess_add_hotel(){
        /////////////////////////////////////////
        $config['upload_path'] = './public/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        //////////////////////////////////////////
        if($this->upload->do_upload('img')){
                $data=$this->upload->data();
                $img=$data['file_name'];
            
         }
         //////////////////////////////////////////
        $file=$_FILES['imgs'];
        if(isset($file['name'])){
            $str_img="";
                for ($i=0; $i < count($file['name']) ; $i++) { 
                    $_FILES['userfile']['name']= $file['name'][$i];  
                    $_FILES['userfile']['type']= $file['type'][$i]; 
                    $_FILES['userfile']['tmp_name']= $file['tmp_name'][$i];
                    $_FILES['userfile']['error']= $file['error'][$i]; 
                    $_FILES['userfile']['size']= $file['size'][$i]; 
                   if($this->upload->do_upload()){
                        $data=$this->upload->data();
                        $str_img.=$data['file_name'].",";
                   }
                }
            $imgs=substr($str_img,0, strlen($str_img)-1); 
        }
        $title_vi=$this->input->post('title_vi');
        $title_en=$this->input->post('title_en');
        $gia=$this->input->post('gia');
        $address=$this->input->post('address');
        $cate=$this->input->post('cate');
        $content_vi=$this->input->post('editor1');
        $content_en=$this->input->post('editor2');
        $str=array(
            'title_vi'=>$title_vi,
            'title_en'=>$title_en,
            'img'=>$img,
            'imgs'=>$imgs,
            'type'=>$cate,
            'address'=>$address,
            'price'=>$gia,
            'content_vi'=>$content_vi,
            'content_en'=>$content_en,
            'view'=>0
            );
         $table="tbl_hotel";
         if($this->madmin->insert_data($table,$str)){
                redirect(base_url()."cadmin/addhotel?err=0");
         }else{
             redirect(base_url()."cadmin/addhotel?err=1");
         }

    }
    public function listhotel(){
        $data['title']="Danh sách khách sạn - Hệ thống quản trị website";
        $data['phome']="backend/list-hotel";
        
        if(isset($_GET['cate'])){
            $where=array('type'=>$_GET['cate']);
        }else{
            $where=array();
        }
        $data['data']=$this->madmin->get_data_where('tbl_hotel',$where);
        $this->load->view('backend/dashboard',$data);
    }
    public function deletehotel($id){
        $table="tbl_hotel";
        $where=array('id'=>$id);
        $folder="images";
        $this->madmin->delete_image_product($table,$where,$folder);
        $this->madmin->delete_image_thuvienanh($table,$where);
       if($this->madmin->delete_data($table,$where)){
           redirect(base_url()."cadmin/listhotel?err=0");
        } redirect(base_url()."cadmin/listhotel?err=1"); 
    }
    public function updatehotel($id){
        $data['id']=$id;
        $data['title']="Cập nhật thông tin - Hệ thống quản trị website";
        $data['phome']="backend/edit-hotel";
        $data['data']=$this->madmin->get_data_where('tbl_hotel',array('id'=>$id));
        $this->load->view('backend/dashboard',$data);
    }
    public function prosess_update_hotel($id){
        $table="tbl_hotel";
        $where=array('id'=>$id);
        $config['upload_path'] = './public/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        ////////////////////////////////////////////////////////////////
        if(isset($_FILES['img']['name']) && $_FILES['img']['name']!=null){
            $avata=$this->input->post('ava');
            if(file_exists("public/images/".$avata)){
                unlink("public/images/".$avata);
            }
            
            if($this->upload->do_upload('img')){
                    $data=$this->upload->data();
                    $img=$data['file_name'];
                
            }
        }else{
            $img=$this->input->post('ava');
        }
        ////////////////////////////////////////////////////////////////
        $file=$_FILES['imgs'];
        if(count($file['name'])>1){
            $this->madmin->delete_image_thuvienanh($table,$where);
            $str_img="";
            for ($i=0; $i < count($file['name']) ; $i++) { 
                $_FILES['userfile']['name']= $file['name'][$i];  
                $_FILES['userfile']['type']= $file['type'][$i]; 
                $_FILES['userfile']['tmp_name']= $file['tmp_name'][$i];
                $_FILES['userfile']['error']= $file['error'][$i]; 
                $_FILES['userfile']['size']= $file['size'][$i]; 
               if($this->upload->do_upload()){
                    $data=$this->upload->data();
                    $str_img.=$data['file_name'].",";

               }
            }
            $imgs=substr($str_img,0, strlen($str_img)-1);
        }else{
            echo $imgs=$this->input->post('limgs');
        }
       
        ////////////////////////////////////////////////////////////////
        $title_vi=$this->input->post('title_vi');
        $title_en=$this->input->post('title_en');
        $gia=$this->input->post('gia');
        $address=$this->input->post('address');
        $cate=$this->input->post('cate');
        $content_vi=$this->input->post('editor1');
        $content_en=$this->input->post('editor2');
        $str=array(
            'title_vi'=>$title_vi,
            'title_en'=>$title_en,
            'img'=>$img,
            'imgs'=>$imgs,
            'type'=>$cate,
            'address'=>$address,
            'price'=>$gia,
            'content_vi'=>$content_vi,
            'content_en'=>$content_en
            );
         if($this->madmin->get_update_data($table,$where,$str)){
            redirect(base_url()."cadmin/listtour?err=0");
        }
        redirect(base_url()."cadmin/listtour?err=1");
    }
    public function addroom($id){
        $data['title']="Thêm phòng - Hệ thống quản trị website";
        $data['phome']="backend/add-room";
        $data['idhotel']=$id;
        $this->load->view('backend/dashboard',$data); 
    }
    public function prosess_add_room(){
        $idhotel=$this->input->post('idhotel');
        /////////////////////////////////////////
        $config['upload_path'] = './public/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        //////////////////////////////////////////
        if($this->upload->do_upload('img')){
                $data=$this->upload->data();
                $img=$data['file_name'];
            
         }
         //////////////////////////////////////////
        $file=$_FILES['imgs'];
        if(isset($file['name'])){
            $str_img="";
                for ($i=0; $i < count($file['name']) ; $i++) { 
                    $_FILES['userfile']['name']= $file['name'][$i];  
                    $_FILES['userfile']['type']= $file['type'][$i]; 
                    $_FILES['userfile']['tmp_name']= $file['tmp_name'][$i];
                    $_FILES['userfile']['error']= $file['error'][$i]; 
                    $_FILES['userfile']['size']= $file['size'][$i]; 
                   if($this->upload->do_upload()){
                        $data=$this->upload->data();
                        $str_img.=$data['file_name'].",";
                   }
                }
            $imgs=substr($str_img,0, strlen($str_img)-1); 
        }
        $title=$this->input->post('title');
        $gia=$this->input->post('gia');
        $content_vi=$this->input->post('editor1');
        $content_en=$this->input->post('editor2');
        $str=array(
            'title'=>$title,
            'img'=>$img,
            'imgs'=>$imgs,
            'idhotel'=>$idhotel,
            'price'=>$gia,
            'content_vi'=>$content_vi,
            'content_en'=>$content_en
            );
         $table="tbl_room";
         if($this->madmin->insert_data($table,$str)){
                redirect(base_url()."cadmin/addroom/$idhotel?err=0");
         }else{
             redirect(base_url()."cadmin/addroom/$idhotel?err=1");
         }

    }

    public function listroom($id){
        $data['title']="Danh sách phòng - Hệ thống quản trị website";
        $data['phome']="backend/list-room";
        $data['idhotel']=$id;
        $data['data']=$this->madmin->get_data_where('tbl_room',array('idhotel'=>$id));
        $this->load->view('backend/dashboard',$data);
    }
    public function deleteroom($id,$idhotel){
        $table="tbl_room";
        $where=array('id'=>$id);
        $folder="images";
        $this->madmin->delete_image_product($table,$where,$folder);
        $this->madmin->delete_image_thuvienanh($table,$where);
       if($this->madmin->delete_data($table,$where)){
           redirect(base_url()."cadmin/listroom/$idhotel?err=0");
        } redirect(base_url()."cadmin/listroom/$idhotel?err=1"); 
    } 
    public function updateroom($id,$hotel){
        $data['id']=$id;
        $data['hotel']=$hotel;
        $data['title']="Cập nhật thông tin - Hệ thống quản trị website";
        $data['phome']="backend/edit-room";
        $data['data']=$this->madmin->get_data_where('tbl_room',array('id'=>$id));
        $this->load->view('backend/dashboard',$data);
    }
    public function prosess_update_room($id){
       $table="tbl_room";
        $where=array('id'=>$id);
        $config['upload_path'] = './public/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        ////////////////////////////////////////////////////////////////
        if(isset($_FILES['img']['name']) && $_FILES['img']['name']!=null){
            $avata=$this->input->post('ava');
            if(file_exists("public/images/".$avata)){
                unlink("public/images/".$avata);
            }
            
            if($this->upload->do_upload('img')){
                    $data=$this->upload->data();
                    $img=$data['file_name'];
                
            }
        }else{
            $img=$this->input->post('ava');
        }
        ////////////////////////////////////////////////////////////////
        $file=$_FILES['imgs'];
        if(count($file['name'])>1){
            $this->madmin->delete_image_thuvienanh($table,$where);
            $str_img="";
            for ($i=0; $i < count($file['name']) ; $i++) { 
                $_FILES['userfile']['name']= $file['name'][$i];  
                $_FILES['userfile']['type']= $file['type'][$i]; 
                $_FILES['userfile']['tmp_name']= $file['tmp_name'][$i];
                $_FILES['userfile']['error']= $file['error'][$i]; 
                $_FILES['userfile']['size']= $file['size'][$i]; 
               if($this->upload->do_upload()){
                    $data=$this->upload->data();
                    $str_img.=$data['file_name'].",";

               }
            }
            $imgs=substr($str_img,0, strlen($str_img)-1);
        }else{
            echo $imgs=$this->input->post('limgs');
        }
       
        ////////////////////////////////////////////////////////////////
        $title=$this->input->post('title');
        $hotel=$this->input->post('hotel');
        $gia=$this->input->post('gia');
        $content_vi=$this->input->post('editor1');
        $content_en=$this->input->post('editor2');
        $str=array(
            'title'=>$title,
            'img'=>$img,
            'imgs'=>$imgs,
            'price'=>$gia,
            'content_vi'=>$content_vi,
            'content_en'=>$content_en
            );
         if($this->madmin->get_update_data($table,$where,$str)){
                redirect(base_url()."cadmin/listroom/".$hotel."?err=0");
         }else{
             redirect(base_url()."cadmin/listroom/".$hotel."?err=1");
         }

    }   
    public function config(){
    $data['title']="Thông tin hệ thống - Hệ thống quản trị website";
    $data['phome']="backend/config";
    $data['data']=$this->madmin->get_data_where('tbl_info',array('id'=>1));
    $this->load->view('backend/dashboard',$data);
    }
    public function prosess_update_config(){
        ////////////////////////////////////////////
        $where=array('id'=>1);
        $table="tbl_info";
        $str=array(
            'name'=>$this->input->post('company'),
            'address'=>$this->input->post('address'),
            'phone'=>$this->input->post('hotline'),
            'facebook'=>$this->input->post('facebook'),
            'map'=>$this->input->post('google')
        );
        if($this->madmin->get_update_data($table,$where,$str)){
        redirect(base_url()."cadmin/config?err=0");
        }redirect(base_url()."cadmin/config?err=0");
    }
    public function listbooktour(){
        $data['title']="Danh sách đặt tour - Hệ thống quản trị website";
        $data['phome']="backend/list-book-tour";
        if(isset($_GET['status'])){
            $arr=array('status'=>$_GET['status']);
        }else{
            $arr=array();
        }
        $data['data']=$this->madmin->get_data_where('tbl_book_tour',$arr);
        $this->load->view('backend/dashboard',$data);
    }
    public function update_status_cart($status,$bill){
      $table="tbl_book_tour";
      $where=array('id'=>$bill);
      $str=array('status'=>$status);
     if($this->madmin->get_update_data($table,$where,$str)){

           redirect(base_url()."cadmin/listbooktour");
     }
    }
     public function deletecart($id){
        $table="tbl_book_tour";
        $where=array('id'=>$id);
       if($this->madmin->delete_data($table,$where)){
           redirect(base_url()."cadmin/listbooktour?err=0");
        } redirect(base_url()."cadmin/listbooktour?err=1");
    }
     public function viewcart($bill){
        $data['bill']=$bill;
        $data['title']="Chi tiết đơn hàng - Hệ thống quản trị website";
        $data['phome']="backend/view-cart";
        $data['data']=$this->madmin->get_data_where("tbl_book_tour",array('id'=>$bill));
        $this->load->view('backend/dashboard',$data);
    }
    public function listbookroom(){
        $data['title']="Danh sách đặt phòng - Hệ thống quản trị website";
        $data['phome']="backend/list-book-room";
        if(isset($_GET['status'])){
            $arr=array('status'=>$_GET['status']);
        }else{
            $arr=array();
        }
        $data['data']=$this->madmin->get_data_where('tbl_booking',$arr);
        $this->load->view('backend/dashboard',$data);
    }
    public function deletebookroom($id){
        $table="tbl_booking";
        $where=array('id'=>$id);
       if($this->madmin->delete_data($table,$where)){
           redirect(base_url()."cadmin/listbookroom?err=0");
        } redirect(base_url()."cadmin/listbookroom?err=1");
    }
     public function update_status_book($status,$bill){
      $table="tbl_booking";
      $where=array('id'=>$bill);
      $str=array('status'=>$status);
     if($this->madmin->get_update_data($table,$where,$str)){

           redirect(base_url()."cadmin/listbookroom");
     }
    }
    public function viewroom($bill){
        $data['bill']=$bill;
        $data['title']="Chi tiết đơn hàng - Hệ thống quản trị website";
        $data['phome']="backend/view-booking";
        $data['data']=$this->madmin->get_data_where("tbl_booking",array('id'=>$bill));
        $this->load->view('backend/dashboard',$data);
    }
    public function intro(){
        $data['title']="Giới thiệu - Hệ thống quản trị website";
        $data['phome']="backend/intro";
        $data['data']=$this->madmin->get_data_where('tbl_intro',array('id'=>1));
        $this->load->view('backend/dashboard',$data);
    }
    public function prosess_intro($id){
        $content=$this->input->post('editor1');
        $str=array('content'=>addslashes($content));
        $table="tbl_intro";
        $where=array('id'=>$id);
        if($this->madmin->get_update_data($table,$where,$str)){
                redirect(base_url()."cadmin/intro?err=0");
        }redirect(base_url()."cadmin/intro?err=1");
    }
    public function addnews(){
    $data['title']="Thêm tin tức - Hệ thống quản trị website";
    $data['phome']="backend/add-news";
    $this->load->view('backend/dashboard',$data);
    }
    public function prosess_add_news(){
        $config['upload_path'] = './public/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
            $data=$this->upload->data();
            $img=$data['file_name'];       
        }
        $title=$this->input->post('title');
        $content=$this->input->post('editor1');
        $str=array(
            'img'=>$img,
            'title'=>$title,
            'date'=>$this->datetime(),
            'view'=>0,
            'content'=>$content
        );
        $table="tbl_news";
        if($this->madmin->insert_data($table,$str)){
            redirect(base_url()."cadmin/addnews?err=0");
        }
        redirect(base_url()."cadmin/addnews?err=1");
    }
    public function listnews(){
        $data['title']="Danh sách tin tức- Hệ thống quản trị website";
        $data['phome']="backend/list-news";
        $data['data']=$this->madmin->get_data('tbl_news');
        $this->load->view('backend/dashboard',$data);
    }
    public function deletenews($id){
        $where=array('id'=>$id);
        $table="tbl_news";
        $folder="images";
        $this->madmin->delete_image($table,$where,$folder);
        if($this->madmin->delete_data($table,$where)){
             redirect(base_url()."cadmin/listnews?err=0");
        }redirect(base_url()."cadmin/listnews?err=1");
    }
    public function updatenews($id){
        $data['id']=$id;
        $data['title']="Cập nhật tin tức - Hệ thống quản trị website";
        $data['phome']="backend/update-news";
        $data['data']=$this->madmin->get_data_where('tbl_news',array('id'=>$id));
        $this->load->view('backend/dashboard',$data);
    }
    public function prosess_update_news($id){
        if(isset($_FILES['img']['name']) && $_FILES['img']['name']!=null){
            $avata=$this->input->post('ava');
            if(file_exists("public/images/".$avata)){
                unlink("public/images/".$avata);
            }
            $config['upload_path'] = './public/images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            if($this->upload->do_upload('img')){
                    $data=$this->upload->data();
                    $img=$data['file_name'];
                
            }
        }else{
            $img=$this->input->post('ava');
        }
        $title=$this->input->post('title');
        $content=$this->input->post('editor1');
        $str=array(
            'img'=>$img,
            'title'=>$title,
            'date'=>$this->datetime(),
            'content'=>$content
        );
        $table="tbl_news";
        $where=array('id'=>$id);
         if($this->madmin->get_update_data($table,$where,$str)){
            redirect(base_url()."cadmin/listnews?err=0");
        }
        redirect(base_url()."cadmin/listnews?err=1");
    }
    public function addquesstion(){
    $data['title']="Thêm câu hỏi thường gặp - Hệ thống quản trị website";
    $data['phome']="backend/add-quesstion";
    $this->load->view('backend/dashboard',$data);
    }
    public function prosess_add_quesstion(){
        $config['upload_path'] = './public/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
            $data=$this->upload->data();
            $img=$data['file_name'];       
        }
        $title=$this->input->post('title');
        $content=$this->input->post('editor1');
        $str=array(
            'img'=>$img,
            'title'=>$title,
            'view'=>0,
            'content'=>$content
        );
        $table="tbl_quession";
        if($this->madmin->insert_data($table,$str)){
            redirect(base_url()."cadmin/addquesstion?err=0");
        }
        redirect(base_url()."cadmin/addquesstion?err=1");
    }
    public function listquesstion(){
        $data['title']="Danh sách tin tức- Hệ thống quản trị website";
        $data['phome']="backend/list-quession";
        $data['data']=$this->madmin->get_data('tbl_quession');
        $this->load->view('backend/dashboard',$data);
    }
    public function deletequession($id){
        $where=array('id'=>$id);
        $table="tbl_quession";
        $folder="images";
        $this->madmin->delete_image($table,$where,$folder);
        if($this->madmin->delete_data($table,$where)){
             redirect(base_url()."cadmin/listquesstion?err=0");
        }redirect(base_url()."cadmin/listquesstion?err=1");
    }
    public function updatequession($id){
        $data['id']=$id;
        $data['title']="Cập nhật câu hỏi thường gặp - Hệ thống quản trị website";
        $data['phome']="backend/update-quession";
        $data['data']=$this->madmin->get_data_where('tbl_quession',array('id'=>$id));
        $this->load->view('backend/dashboard',$data);
    }
    public function prosess_update_quesstion($id){
        if(isset($_FILES['img']['name']) && $_FILES['img']['name']!=null){
            $avata=$this->input->post('ava');
            if(file_exists("public/images/".$avata)){
                unlink("public/images/".$avata);
            }
            $config['upload_path'] = './public/images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            if($this->upload->do_upload('img')){
                    $data=$this->upload->data();
                    $img=$data['file_name'];
                
            }
        }else{
            $img=$this->input->post('ava');
        }
        $title=$this->input->post('title');
        $content=$this->input->post('editor1');
        $str=array(
            'img'=>$img,
            'title'=>$title,
            'content'=>$content
        );
        $table="tbl_quession";
        $where=array('id'=>$id);
         if($this->madmin->get_update_data($table,$where,$str)){
            redirect(base_url()."cadmin/listquesstion?err=0");
        }
        redirect(base_url()."cadmin/listquesstion?err=1");
    }
    public function sale(){
        $data['title']="Ưu đãi - Hệ thống quản trị website";
        $data['phome']="backend/sale";
        $data['data']=$this->madmin->get_data_where('tbl_uudai',array('id'=>1));
        $this->load->view('backend/dashboard',$data);
    }
    public function prosess_sale($id){
        $content=$this->input->post('editor1');
        $str=array('content'=>addslashes($content));
        $table="tbl_uudai";
        $where=array('id'=>$id);
        if($this->madmin->get_update_data($table,$where,$str)){
                redirect(base_url()."cadmin/sale?err=0");
        }redirect(base_url()."cadmin/sale?err=1");
    }
    public function contact(){
        $data['title']="Danh sách hẹn - Hệ thống quản trị website";
        $data['phome']="backend/contact";
        $data['data']=$this->madmin->get_data_where('tbl_book',array('id'=>1));
        $this->load->view('backend/dashboard',$data);
    }
    public function deletecontact($id){
        $where=array('id'=>$id);
        $table="tbl_book";
        if($this->madmin->delete_data($table,$where)){
             redirect(base_url()."cadmin/contact?err=0");
        }redirect(base_url()."cadmin/contact?err=1");
    }
    ////Ham tra ngay gio he thong
    public function datetime(){
     date_default_timezone_set("Asia/Ho_Chi_Minh");
    $now = getdate();
    if($now["mday"] <10){
      $ngay="0".$now["mday"] ;
    }
    else{
    $ngay=$now["mday"];
    }
    if($now["mon"]<10){
      $thang="0".$now["mon"];
    }
    else{
      $thang=$now["mon"];
    }
    return $currentDate = $ngay . "/" .$thang . "/" . $now["year"]." | " . $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"]; 
  } 
}

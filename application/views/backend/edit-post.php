<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> &nbsp;</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Cập nhật sản phẩm</li>
          </ol>
        </section>
        <!-- Main content -->
<section class="content">
<div class="row">
  <div class="col-md-12">
  <?php if(isset($_GET['err']) && $_GET['err']==1){ ?>
  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Thông báo !</h4>
                   Có lỗi trong quá trình xử lý. Vui lòng thử lại
    </div>
    <?php }if(isset($_GET['err']) && $_GET['err']==0){ ?>
      <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>  <i class="icon fa fa-check"></i> Thông báo !</h4>
                   Thêm tin thành công 
       </div>
    <?php } ?>
    <!-- -->
    <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Cập nhật sản phẩm</h3>
                </div><!-- /.box-header -->
                 <form role="form" action="<?php echo base_url(); ?>cadmin/prosess_update_post/<?php echo $id;?>" method="post" enctype="multipart/form-data">
                 <?php foreach ($data as $val) ?>
                  <div class="box-body">
                  <div class="form-group">
                 <select id="cate" name="cate" required class="form-control">
                    <option value="">Chọn danh mục chính</option>
                    <?php
                    foreach ($this->madmin->get_data_where("tbl_menu",array('level'=>1)) as $cates) {
                     ?>
                     <optgroup label="<?php echo $cates['title']; ?>">
                       <?php
                    foreach ($this->madmin->get_data_where("tbl_menu",array('parent'=>$cates['id'])) as $cate) {
                     ?>
                         <option <?php if($val['child']==$cate['id']){ echo "selected";} ?> value="<?php echo $cates['id']."/".$cate['id']; ?>"><?php echo $cate['title']; ?></option>
                    <?php } ?>
                     </optgroup>      
                    <?php } //endforeach  ?></optgroup>
                  </select>
                  </div>
                  <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tên sản phẩm</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Nhập tiêu đề" required value="<?php echo $val['title']; ?>">
                    </div>
                  </div>
                  <div class="box-body">
                  <label for="">Ảnh đại diện</label>
                  <input type="file" name="img" class="form-control">
                  <input type="hidden" name="ava" value="<?php echo $val['img']; ?>">
                  </div>
  
                   <div class="form-group">
                   <label for="">Nội dung tiếng việt</label>
                   <textarea id="editor1" name="editor1" rows="10" cols="80" placeholder="Nội dung "><?php echo addslashes($val['content']); ?></textarea>
                  </div>
                    <button type="submit" class="btn btn-info pull-right"><span class="fa fa-retweet"></span> Cập nhật </button>
                  </div>
                  </form>
    </div>
  </div>
</div>
</section>
</div>
<script>
      $(function(){
        //Initialize Select2 Elements
        $(".select2").select2();
         CKEDITOR.replace('editor1');
         ////////////////
         
      });
</script>

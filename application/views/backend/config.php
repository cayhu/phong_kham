<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> &nbsp;</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Thông tin hệ thống</li>
          </ol>
        </section>
        <!-- Main content -->
<section class="content">
<div class="row">
  <div class="col-md-12">
  <?php if(isset($_GET['err']) && $_GET['err']!=null &&  $_GET['err']==1){ ?>
     <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Thông báo !</h4>
                   Có lỗi trong quá trình xử lý. Vui lòng thử lại
    </div>
    <?php }if(isset($_GET['err']) && $_GET['err']==0){ ?>
      <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>  <i class="icon fa fa-check"></i> Thông báo !</h4>
                   Xử lý thành công ! 
      </div>
    <?php } ?>
    <!-- -->
    <div class="box box-primary">
      <div class="box-body">
                <div class="box-header with-border">
                  <h3 class="box-title">Thông tin hệ thống</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <form action="<?php echo base_url(); ?>cadmin/prosess_update_config" method="post" enctype="multipart/form-data">
                 <?php foreach ($data as $dt)  ?>
                 <div class="form-group">
                    <label for="">Tên </label>
                    <input type="text" name="company" class="form-control" value="<?php echo $dt['name']; ?>">
                  </div> 
                  <div class="form-group">
                    <label for="">Địa chỉ </label>
                    <textarea name="address" id=""  class="form-control" cols="5" rows="3"><?php echo $dt['address']; ?></textarea>
                  </div> 
                  <div class="form-group">
                    <label for="">Hotline </label>
                    <input type="text" name="hotline" class="form-control" value="<?php echo $dt['phone']; ?>">
                  </div> 
                  <div class="form-group">
                    <label for="">Facebook </label>
                    <input type="text" name="facebook" class="form-control" value="<?php echo $dt['facebook']; ?>">
                  </div>  
                   <div class="form-group">
                    <label for="">Google </label>
                    <textarea name="google" class="form-control" id="" cols="30" rows="3"><?php echo $dt['map']; ?></textarea>
                  </div>
                  <button type="submit" class="btn btn-info pull-right"> <span class="fa fa-refresh"></span> Cập nhật </button>
               </form>
               </div>
     </div><!-- /.box-body -->
    </div>
</div>
</div>
</section>
</div>
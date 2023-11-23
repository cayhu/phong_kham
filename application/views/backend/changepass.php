<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> &nbsp;</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Thêm Ads</li>
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
                  <h3 class="box-title">Thay đổi mật khẩu</h3>
                </div><!-- /.box-header -->
                <form action="<?php echo base_url(); ?>cadmin/action_change_password" method="post"><br>
                <div class="form-group">
                <input type="text" name="id" class="form-control" value="<?php echo $this->session->userdata('admin_log'); ?>" readonly>
                </div>
                <div class="form-group"><input type="password" name="password" value="" required placeholder="Mật khẩu củ" class="form-control"></div>
                <div class="form-group"><input type="password" name="passnew" class="form-control" value="" required placeholder="Mật khẩu mới"></div>
                <div class="form-group"><input type="password" name="repassnew" class="form-control" value="" required placeholder="Xác nhận mật khẩu mới"></div>
                <div class="form-group"><button type="submit" class="btn btn-primary"> <span class="fa fa-refresh"> </span> Đổi mật khẩu </button></div>
        </form>
                
     </div><!-- /.box-body -->
    </div>
</div>
</div>
</section>
</div>
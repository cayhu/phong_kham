<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> &nbsp;</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Cập nhật Slide</li>
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
                <div class="box-header with-border">
                  <h3 class="box-title">Cập nhật slide mới</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <form role="form" action="<?php echo base_url(); ?>cadmin/prosess_update_ads/<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <input type="file" class="form-control" id="exampleInputEmail1" name="img" placeholder="" >
                    </div>
                    <?php foreach ($data as $key ) { ?>
                    <div class="form-group">
                     <input type="hidden" name="anh" value="<?php echo $key['img']; ?>">
                      <input type="url" class="form-control" id="exampleInputEmail1" value="<?php echo $key['url']; ?>" name="link" placeholder="Nhập url" required>
                    </div>
                    <?php } ?>
      
                  <button type="submit" class="btn btn-info pull-right"> <span class="fa fa-play-circle"></span> Cập nhật </button>
                    </form>
                </div><!-- /.box-body -->
    </div>
</div>
</div>
</section>
</div>
<script src="<?php echo base_url();?>public/admin/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/admin/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
      $(function () {
        $("#example1").DataTable();
      });
</script>

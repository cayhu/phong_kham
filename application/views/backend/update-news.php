<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> &nbsp;</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Cập nhật tin tức</li>
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
                  <h3 class="box-title">Cập nhật tin tức</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <form action="<?php echo base_url(); ?>cadmin/prosess_update_news/<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                  <?php foreach ($data as $key) ?>
                 <div class="col-md-12 col-lg-12">
                   <div class="form-group">
                    <span>Tiêu đề </span>
                     <input type="text" name="title" class="form-control" required autocomplete="false" style="width:100%" placeholder="Tiêu đề tin" value="<?php echo $key['title']; ?>">
                   </div>  
                 </div>
                  <div class="box-body">
            
                  <div class="form-group">
                    <input type="hidden" name="ava" value="<?php echo $key['img']; ?>">
                    <input class="form-control" type="file" name="img" id="title" autocomplete="false"  style="width:100%"></div>  
                  <div class="form-group">
                    <span>Nội dung </span>
                    <textarea id="editor1" name="editor1" rows="10" cols="80" placeholder="Nội dung "><?php echo addslashes($key['content']); ?></textarea>
                  </div>  
                 
                  <button type="submit" class="btn btn-info pull-right"> <span class="fa fa-play-circle"></span> Thêm </button>
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
<script>
      $(function() {
        //Initialize Select2 Elements
        $(".select2").select2();
         CKEDITOR.replace('editor1');
      });
</script>

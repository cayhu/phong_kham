<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> &nbsp;</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Thêm Slide</li>
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
                  <h3 class="box-title">Thêm Slide</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <form role="form" action="<?php echo base_url(); ?>cadmin/prosess_add_slide1" method="post" enctype="multipart/form-data">
               
                  <div class="box-body">
                    <div class="form-group">
                      <input type="file" class="form-control" id="InputFile" onchange="return validate_file('InputFile')" name="img" placeholder="" required>
                      Vui lòng chọn file ảnh có kích thước 1940*748
                    </div>
                     <div class="form-group">
                      <input type="url" class="form-control" id="" name="url" placeholder="htpp://" required>
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
function validate_file(id){
    if(/.*\.(jpg)|(png)$/.test($("#"+id).val().toLowerCase())=== false)
    {
        $('#'+id).val('');
        alert("Vui lòng chỉ upload file định dạng sau: jpg hoặc png");        
        return false
    }
}
</script>
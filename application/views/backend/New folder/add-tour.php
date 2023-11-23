<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> &nbsp;</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Thêm tin</li>
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
                  <h3 class="box-title">Thêm sản phẩm</h3>
                </div><!-- /.box-header -->
                 <form role="form" action="<?php echo base_url(); ?>cadmin/prosess_add_tour" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                  <div class="form-group">
                  <select id="cate" name="cate" required class="form-control">
                    <option value="">Chọn danh mục chính</option>
                    <option value="1">Tour trong nước</option>
                    <option value="2">Tuor ngoài nước</option>
                  </select>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tên sản phẩm tiếng việt</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="title_vi" placeholder="Nhập tiêu đề" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tên sản phẩm 
                      tiếng anh</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="title_en" placeholder="Nhập tiêu đề" required>
                    </div>
                  </div>
                  <div class="box-body">
                  <label for="">Ảnh đại diện</label>
                  <input type="file" name="img" class="form-control" required>
                  </div> 
                  <div class="box-body">
                  <label for="">Thêm nhiều ảnh</label>
                  <input type="file" name="imgs[]" class="form-control" required multiple>
                  </div>  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Giá sản phẩm</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" name="gia" placeholder="Nhập giá sản phẩm" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Giá khuyến mãi sản phẩm</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" name="gia_sale" placeholder="Nhập giá khuyến mãi sản phẩm" required value="0">
                    </div>
                    <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Mô tả ngắn tiếng việt</label>
                      <textarea name="note_vi" id="" class="form-control" cols="" rows="4"  required placeholder="Nhập nội dung mô tả"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Mô tả ngắn tiếng việt
                      tiếng anh</label>
                       <textarea name="note_en" id="" class="form-control" cols="" rows="4"  required placeholder="Nhập nội dung mô tả"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                   <label for="">Nội dung tiếng việt</label>
                   <textarea id="editor1" name="editor1" rows="10" cols="80" placeholder="Nội dung "></textarea>
                  </div>
                   <div class="form-group">
                   <label for="">Nội dung tiếng anh</label>
                   <textarea id="editor2" name="editor2" rows="10" cols="80" placeholder="Nội dung "></textarea>
                  </div>
                    <button type="submit" class="btn btn-info pull-right"><span class="fa fa-plus"></span> Thêm tin </button>
                  </div>
                  </form>
    </div>
  </div>
</div>
</section>
</div>
<script>
$(function(){
  $('select#cate').on('change',function(){
        //val =$(this).val();
        //window.location="?cate="+val;
   });
});
      $(function(){
        //Initialize Select2 Elements
        $(".select2").select2();
         CKEDITOR.replace('editor1');
         CKEDITOR.replace('editor2');
         ////////////////
         
      });
</script>

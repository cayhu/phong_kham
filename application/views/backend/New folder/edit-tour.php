<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> &nbsp;</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Cập nhật tin</li>
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
                  <h3 class="box-title">Cập nhật</h3>
                </div><!-- /.box-header --> <?php foreach ($data as $dt)?>
                 <form role="form" action="<?php echo base_url(); ?>cadmin/prosess_update_tour/<?php echo $dt['id']; ?>" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                  <div class="form-group">
                  <select id="cate" name="cate" required class="form-control">
                    <option value="">Chọn danh mục chính</option>
                    <option value="1" <?php if($dt['type']==1){ echo "selected";} ?> >Tour trong nước</option>
                    <option value="2" <?php if($dt['type']==2){ echo "selected";} ?>>Tuor ngoài nước</option>
                  </select>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tên sản phẩm tiếng việt</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="title_vi" placeholder="Nhập tiêu đề" required value="<?php echo $dt['title_vi']; ?>">
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tên sản phẩm 
                      tiếng anh</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="title_en" placeholder="Nhập tiêu đề" required value="<?php echo $dt['title_en']; ?>">
                    </div>
                  </div>
                  <div class="box-body">
                  <label for="">Ảnh đại diện</label>
                  <input type="file" name="img" class="form-control">
                  <input type="hidden" name="ava" value="<?php echo $dt['img']; ?>">
                  </div> 
                  <div class="box-body">
                  <label for="">Thêm nhiều ảnh</label>
                  <input type="file" name="imgs[]" class="form-control" multiple>
                  <input type="hidden" name="limg" value="<?php echo $dt['imgs']; ?>">
                  </div>  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Giá sản phẩm</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" name="gia" placeholder="Nhập giá sản phẩm" required  value="<?php echo $dt['price']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Giá khuyến mãi sản phẩm</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" name="gia_sale" placeholder="Nhập giá khuyến mãi sản phẩm" value="0"  value="<?php echo $dt['price_sale']; ?>">
                    </div>
                    <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Mô tả ngắn tiếng việt</label>
                      <textarea name="note_vi" id="" class="form-control" cols="" rows="4"  required placeholder="Nhập nội dung mô tả"><?php echo $dt['note_vi']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Mô tả ngắn tiếng việt
                      tiếng anh</label>
                       <textarea name="note_en" id="" class="form-control" cols="" rows="4"  required placeholder="Nhập nội dung mô tả"><?php echo $dt['note_en']; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                   <label for="">Nội dung tiếng việt</label>
                   <textarea id="editor1" name="editor1" rows="10" cols="80" placeholder="Nội dung "><?php echo addslashes($dt['content_vi']); ?></textarea>
                  </div>
                   <div class="form-group">
                   <label for="">Nội dung tiếng anh</label>
                   <textarea id="editor2" name="editor2" rows="10" cols="80" placeholder="Nội dung "><?php echo addslashes($dt['content_vi']); ?></textarea>
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

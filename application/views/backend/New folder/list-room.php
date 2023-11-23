  <link href="<?php echo base_url();?>public/admin/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> &nbsp;</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Danh sách tin </li>
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
                   Thành công 
      </div>
    <?php } ?>
    <!-- -->
    <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Danh sách sản phẩm</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div><a class="btn btn-success btn-flat" href="<?php echo base_url(); ?>cadmin/addroom/<?php echo $idhotel; ?>"><span class="fa fa-pencil-square"></span> Thêm mới</a><hr></div>
                <br>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Tiêu đề </th>
                        <th>Giá</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; foreach ($data as $k) {
                      $i++;
                     ?>
                      <tr>
                        <td> <?php echo $i; ?> </td>
                        <td><img width="150" height="100" src="<?php echo base_url();?>public/images/<?php echo $k['img'];?>">
                        </td>
                        <td><?php echo $k['title']; ?></td>
                        <td><?php echo $k['price']; ?></td>
                        <td>
                          <a href="<?php echo base_url();?>cadmin/updateroom/<?php echo $k['id']; ?>/<?php echo $idhotel; ?>" class="btn btn-primary btn-xs"> <span class="fa fa-edit"></span> Edit</a>
                          <a href="<?php echo base_url();?>cadmin/deleteroom/<?php echo $k['id']; ?>/<?php echo $idhotel; ?>" class="btn btn-danger btn-xs"><span class='fa fa-trash'></span> Delete</a>
                        </td>
                      </tr>
                    <?php } ?>  
                    </tbody>
                  </table>
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
      $(function(){
        $('select#cate').on('change',function(){
              val =$(this).val();
              window.location="?cate="+val;
        });
      
      });
</script>


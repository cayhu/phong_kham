<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> &nbsp;</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Danh sách đặt hàng</li>
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
                  <h3 class="box-title">Danh sách đơn hàng</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                   <select name="status" id="status">
                     <option value="0">Chưa xử lý</option>
                     <option value="1">Đã xử lý</option>
                     <option value="2">Thành công </option>
                     <option value="3">Đã hủy</option>
                   </select><br>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Thông tin khách hàng </th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái</th>
                        <th>Quản lý</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; foreach ($data as $k) {
                      $i++;
                     ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td> 
                         Tên: <strong style="color: green"> <?php echo $k['fullname']; ?></strong> <br>
                        Địa chỉ: <strong style="color: red"><?php echo $k['address']; ?></strong> <br>
                        Số điện thoại: <strong style="color: red"><?php echo $k['phone']; ?></strong>
                        </td>
                        <td>
                        <strong><?php echo $k['ngaydat']; ?></strong>
                        </td>
                        <td>
                       <?php  if($k['status']==0){
              echo "<b style='color:red'>Chưa xử lý </b><br>";
              echo "<a href='".base_url()."cadmin/update_status_cart/2/".$k['id']."'>Hủy đơn hàng</a><br>";
              echo "<a href='".base_url()."cadmin/update_status_cart/1/".$k['id']."'>Chuyển sang đã xử lý</a><br>";
              }
              if($k['status']==1){
              echo "<b style='color:green'>Đã xử lý </b>";
              }
              if($k['status']==2){
              echo "<b style='color:#000'>Đã hủy </b>";
              }  ?>
                        </td>
                
                        </td>
                
                        <td>
                          <a href="<?php echo base_url();?>cadmin/viewcart/<?php echo $k['id']; ?>" class="btn btn-success btn-xs"><span class='fa fa-eye'></span> Xem </a>
                          <a href="<?php echo base_url();?>cadmin/deletecart/<?php echo $k['id']; ?>" class="btn btn-danger btn-xs"><span class='fa fa-trash'></span> Xóa</a>
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
        $('select#status').on('change',function(){
              val =$(this).val();
              window.location="?status="+val;
        });
      
      });
</script>


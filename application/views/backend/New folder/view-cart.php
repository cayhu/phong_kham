<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> &nbsp;</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?php echo base_url(); ?>cadmin/listbooktour"> Danh sách </a></li>
            <li class="active">Chi tiết đơn hàng</li>
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
        <section class="two-columns" style="padding: 6px">

        <div class="title-left-block wow fadeInUp">
          <h3 class="text-uppercase">Mã đơn hàng : #<?php echo $bill;  ?></h3>
        </div>
        <div class=" wow fadeInUp">
        <?php foreach ($data as $key ) ?>
        <br>
        <div>
          <h3>Tên : <b style='color:green'><?php echo $key['fullname']; ?></b></h3>
          <h3>Điện thoại : <b style='color:green' ><?php echo $key['phone']; ?></b></h3>
          <h3>Địa chỉ: <b style='color:green'><?php echo $key['address']; ?></b></h3>
          <h3>Ngày đặt: <b style='color:green'><?php echo $key['ngaydat']; ?></b></h3>
          <h3>Trạng thái: <b> <?php if($key['status']==0){
              echo "<b style='color:red'>Chưa xử lý </b>";
              }
              if($key['status']==1){
              echo "<b style='color:#0066ff'>Đã xử lý</b> ";
              }
              if($key['status']==2){
              echo "<b style='color:#000'>Đã hủy </b>";
              }  ?></b></h3>
        </div>
        <table id="list-cart" cellpadding="0" cellspacing="0" width="100%" border="0">
          <tr>
            <th width="10%">STT</th>
            <th>Tên tour</th>
            <th>Giá </th>
            <th>Ngày khởi hành</th>
            <th>Thành tiền</th>
          </tr>
          <tr>
            <td>#</td>
            <td><?php echo $key['title']; ?></td>
            <td><?php echo number_format($key['price'],0,",","."); ?> VNĐ</td>
            <td><?php echo $key['date']; ?></td>
            <td><?php echo number_format($key['price'],0,",","."); ?> VNĐ</td>
          </tr>
          <tr>
            <td colspan="3" align="right">Tổng tiền : </td>
            <td colspan="2"> <b style="color: red"> <?php echo number_format($key['price'],0,",","."); ?></b> VNĐ</td>
          </tr>
        </table>
        </div>
      </div>     
    </div><!-- /.box-body -->
</section>
</div>
<script src="<?php echo base_url();?>public/admin/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/admin/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
      $(function () {
        $("#example1").DataTable();
      });
</script>
<style>
  #list-cart{}
  #list-cart th{
    text-align: center;
    background: #ddd;
    padding: 6px;
  }
  #list-cart td{
    border:1px solid #ddd;
    text-align: center;
    padding: 6px;
  }
  #list-cart{}
</style>

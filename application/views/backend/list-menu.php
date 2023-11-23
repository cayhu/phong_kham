<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> &nbsp;</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Danh mục</li>
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
                   Xử lý thành công! 
      </div>
    <?php } ?>
    <!-- -->
    <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Danh sách danh mục</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <div><a class="btn btn-success btn-flat" href="<?php echo base_url(); ?>cadmin/addmenu"><span class="fa fa-pencil-square"></span> Thêm mới</a></div>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Title</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; foreach ($this->madmin->get_data_where("tbl_menu",array('level'=>1)) as $k) {
                      $i++;
                     ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                       
                          <?php  ?>
                          <span class=""> + </span> <strong><?php echo $k['title']; ?></strong>
                          <p align="right" style="margin-top:-30px"> 
                          <a href="<?php echo base_url();?>cadmin/editmenu/<?php echo $k['id']; ?>" class="btn btn-xs btn-success btn-sm"> <span class="fa fa-edit"></span> Edit</a>
                          <a href="<?php echo base_url();?>cadmin/deletemenu/<?php echo $k['id']; ?>" class="btn btn-xs btn-warning btn-sm"><span class='fa fa-trash'></span> Delete</a></p>
                          <?php foreach ($this->madmin->get_data_where("tbl_menu",array('parent'=> $k['id'])) as $key) {
                            ?>
                           - <i><?php echo $key['title']; ?> </i>
                          <p align="right" style="margin-top:-30px;padding: 3px"> <a href="<?php echo base_url();?>cadmin/editmenu/<?php echo $key['id']; ?>" class="btn btn-xs btn-success btn-sm"> <span class="fa fa-edit"></span> Edit</a>
                          <a href="<?php echo base_url();?>cadmin/deletemenu/<?php echo $key['id']; ?>" class="btn btn-warning btn btn-xs"><span class='fa fa-trash'></span> Delete</a> </p>
                          <?php } ?>
                      
                       
        
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
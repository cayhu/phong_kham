<div class="page_contact margin-top-15 section">
	<div class="container">
		<div class="breadcrumb_background">
			<section class="bread-crumb">
	<div class="containers">
		<div class="row">
			<div class="col-xs-12 a-center">
				<ul class="breadcrumb" itemscope itemtype="">					
					<li class="home">
						<a itemprop="url" href="<?php echo base_url(); ?>" ><span itemprop="title">Trang chủ</span></a>						
						<span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
					</li>
					
					<li><strong ><span itemprop="title">Liên hệ</span></strong></li>
					
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="title_full">
    <h1 class="title_page">Liên hệ</h1>
    <div><?php foreach ($this->phongkham->get_data_where("tbl_info",array()) as $map) {?>
    	<h3><strong><?php echo $map['name']; ?></strong></h3>
    	<h4>Số điện thoại : <b><?php echo $map['phone']; ?></b></h4>
    	<h4>Địa chỉ : <?php echo $map['address']; ?></h4>
    <?php } ?>
    </div>
</div>
</div>

<div class="rows">
	<div class="wrap_background_aside margin-bottom-40">
		<div class="section_maps section margin-bottom-50">
			<div class="box-maps">
				<div class="iFrameMap">
				<div class="google-map">
					<?php foreach ($this->phongkham->get_data_where("tbl_info",array()) as $map) {
						echo stripcslashes($map['map']);
					} ?>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
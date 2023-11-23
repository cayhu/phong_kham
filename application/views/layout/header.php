<header class="header">
	<div class="mid-header wid_100">
		<div class="container">
			<div class="row">
				<div class="content_header">
					<div class="header-main">
						<div class="menu-bar-h nav-mobile-button hidden-md hidden-lg">
							<a href="#nav-mobile">
								<i class="fa fa-bars"></i>
							</a>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="logo">
								<a href="<?php echo base_url(); ?>" class="logo-wrapper ">			
									<img src="<?php echo base_url(); ?>public/img/logo.png" alt="">					
								</a>
							</div>
						</div>
						<div class="col-lg-9 col-md-9 colsm_custome hidden-sm hidden-xs">
							<ul class="menunav">
								
								<li class="nav-item active">
									<a class="a-img" href="<?php echo base_url();?>"><span>Trang chủ</span></a>
								</li>
								
								<li class="nav-item ">
									<a class="a-img" href="<?php echo base_url();?>ve-chung-toi.htm"><span>Về chúng tôi</span></a>
								</li>
								
								<li class="nav-item ">
									<a class="a-img" href="<?php echo base_url();?>lien-he.htm"><span>Liên hệ</span></a>
								</li>
								
								<li class="nav-item ">
									<a class="a-img" href="<?php echo base_url();?>uu-dai.htm"><span>Ưu đãi</span></a>
								</li>
								
								<li class="nav-item ">
									<a class="a-img" href="<?php echo base_url();?>dat-lich-hen.htm"><span>Đặt lịch hẹn</span></a>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="wrap_main hidden-xs hidden-sm">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 relative">
				<div class="bg-header-nav hidden-xs hidden-sm">
					<div class= "row row-noGutter-2">
						<nav class="header-nav">
<ul class="item_big">
<!-- //////////////////////// -->	
<?php foreach ($this->phongkham->get_menu(array('level'=>1)) as $menu) {
	$url_menu=base_url().vntoen($menu['title'])."-".$menu['id'].".htm";
?>
<li class="nav-item  has-mega"><a class="a-img " href="<?php echo $url_menu; ?>"><span><?php echo $menu['title']; ?></span><i class="fa fa-angle-down"></i></a>								
<div class="mega-content">
	<div class="level0-wrapper2">
		<div class="nav-block nav-block-center row">
			<div class="col-lg-12 col-md-12">
				<div class="col-md-12 col-lg-12 parent-mega-menu">
					<ul class="level0">
						<?php foreach ($this->phongkham->get_menu(array('parent'=>$menu['id'])) as $_menu) {
						$_url_menu=base_url().vntoen($menu['title'])."/".vntoen($_menu['title'])."-".$_menu['id'].".htm";
						 ?>
						<li class="level1 parent item">
							<h2 class="h4"><a href="<?php echo $_url_menu; ?>"><span><span><?php echo $_menu['title']; ?></span></a> </h2>
						</li>
					    <?php } ?>
					</ul>
				</div>
			</div>
			
		</div>
	</div>
</div> 
</li>
<?php } ?>
<!-- //////////////////////// -->
</ul>
</nav>
</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
</header>


<!-- Menu mobile -->
<div class="menu_mobile sidenav max_991 hidden-md hidden-lg" id="mySidenav">
	
	<a href="" class="logo-wrapper-mobile">					
		<img src="<?php echo base_url(); ?>public/img/logo.png" alt="">					
	</a>
	
	<ul class="ul_collections">
		<li class="level0 level-top parent">
			<a href="<?php echo base_url(); ?>">Trang chủ</a>
		</li>
		<li class="level0 level-top parent">
			<a href="<?php echo base_url(); ?>ve-chung-toi.htm">Về chúng tôi</a>
		</li>
		<li class="level0 level-top parent">
			<a href="<?php echo base_url(); ?>lien-he.htm">Liên hệ</a>
		</li>
		<li class="level0 level-top parent">
			<a href="<?php echo base_url(); ?>uu-dai.htm">Ưu đãi</a>
		</li>
		<li class="level0 level-top parent">
			<a href="<?php echo base_url(); ?>dat-lich-hen.htm">Đặt lịch hẹn</a>	
		</li>
<?php foreach ($this->phongkham->get_menu(array('level'=>1)) as $menu3) {
	$url_menu3=base_url().vntoen($menu3['title'])."-".$menu3['id'].".htm";
?>
		<li class="level0 level-top parent">
			<a href="<?php echo $url_menu3; ?>"><?php echo $menu3['title']; ?></a>
			<i class="fa fa-angle-down"></i>
			<ul class="level0" style="display:none;">
<?php foreach ($this->phongkham->get_menu(array('parent'=>$menu3['id'])) as $_menu3) {
						$_url_menu3=base_url().vntoen($menu3['title'])."/".vntoen($_menu3['title'])."-".$_menu3['id'].".htm";
						 ?>
				<li class="level1 "> 
					<a href="<?php echo $_url_menu3; ?>"> <span><?php echo $_menu3['title']; ?></span> </a>
				</li>
<?php } ?>
			</ul>	
		</li>
<?php } ?>	
	</ul>
</div>
<!-- End -->
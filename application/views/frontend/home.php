<!-- start slide -->
<section class="section_slider owl_nav_custome2x">
	<div class="container">
		<div class="home-slider owl-carousel owl-theme owl-carousel-loop not-thuongdq"  data-dot="false" data-nav='true' data-loop='true' data-play='true' data-lg-items='1' data-md-items='1' data-sm-items='1' data-xs-items="1" data-margin='0'>
			<?php foreach ($this->phongkham->get_slide("tbl_slide") as $slide) {?>
				<div class="item"><a href="#" class="clearfix">
					<img src="<?php echo base_url(); ?>public/slide/<?php echo $slide['img']; ?>" alt=""></a>
			</div>		
			<?php } ?>
			
		</div>
	</div>
</section>
<!-- end slide -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">			
<!-- ////////////////////////////// -->	
<?php foreach ($this->phongkham->get_menu(array('level'=>1)) as $cate) {
	$url_cate=base_url().vntoen($cate['title'])."-".$cate['id'].".htm";
?>
<section class="awe-section-1">	
<section class="section_blogloop">
	<div class="containers">
		<div class="title_h2">
			<h2>
				<a href="<?php echo $url_cate; ?>" title="<?php echo $cate['title']; ?>"><?php echo $cate['title']; ?></a>
			</h2>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
			<?php foreach ($this->phongkham->get_1_data_new(array('parent'=>$cate['id'])) as $k) {
				$idone=$k['id'];
				foreach ($this->phongkham->get_menu_where(array('id'=>$k['child'])) as $tam) {
					$menu=vntoen($tam['title']);
				}
			    $url_post=base_url().vntoen($cate['title'])."/".$menu."/".vntoen($k['title'])."-".$k['id'];
			 ?>										
				<div class="itemblg large">
					<a class="image-blog-left a-center" href="<?php echo $url_post; ?>" title="<?php echo $k['title']; ?>">
						<img src="<?php echo base_url(); ?>public/images/<?php echo $k['img']; ?>" data-lazyload="<?php echo base_url(); ?>public/images/<?php echo $k['img']; ?>" title="<?php echo $k['title']; ?>" alt="<?php echo $k['title']; ?>">
					</a>
					
					<div class="content_blog">
						<h3>
							<a href="<?php echo $url_post; ?>" title="<?php echo $k['title']; ?>"><?php echo $k['title']; ?></a>
						</h3>
						<p> <?php echo substr($k['content'], 0,80); ?></p>
						<a class="more" href="<?php echo $url_post; ?>" title="Xem chi tiết">Xem chi tiết</a>
					</div>		
				</div>
			<?php } ?>
			</div>
			<div class="col-lg-6 col-md-6">
			<?php foreach ($this->phongkham->get_order_data_new(array('id !='=>$idone,'parent'=>$cate['id'])) as $_order) {
				$url_post_order=base_url().vntoen($cate['title'])."/".$menu."/".vntoen($_order['title'])."-".$_order['id'];
		    ?>		
				<div class="itemblg medium">
					<a class="image-blog-left" href="<?php echo $url_post_order; ?>" title="<?php echo $_order['title']; ?>">
						<img src="<?php echo base_url(); ?>public/images/<?php echo $_order['img']; ?>" data-lazyload="<?php echo base_url(); ?>public/images/<?php echo $_order['img']; ?>" title="<?php echo $_order['title']; ?>" alt="<?php echo $_order['title']; ?>">
					</a>
					<div class="content_blog">
						<h3>
						<a href="<?php echo $url_post_order; ?>" title="<?php echo $_order['title']; ?>"><?php echo $_order['title']; ?></a>
						</h3>
					</div>		
				</div>
			<?php } ?>		
			</div>
		</div>
	</div>
</section>
</section>
<?php } ?>
<!-- ////////////////////////////// -->					
</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<section class="section_blogloop_related">
	<div class="containers">
		<div class="title_h2">
			<h2>
				<a href="<?php echo base_url(); ?>tin-tuc.htm" title="Bài viết xem nhiều">Bài viết xem nhiều</a>
			</h2>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php foreach ($this->phongkham->get_news_view_more() as $vm) {
				$url_vm=base_url()."tin-tuc/".vntoen($vm['title'])."-".$vm['id'].".html";
		    ?>		
				<div class="itemblg medium">
					<a class="image-blog-left" href="<?php echo $url_vm; ?>">
						<img src="<?php echo base_url(); ?>public/images/<?php echo $vm['img']; ?>" title="" alt="">
					</a>
					<div class="content_blog">
						<h3>
							<a href="<?php echo $url_vm; ?>" title=""><?php echo $vm['title']; ?></a>
						</h3>
					</div>		
				</div>
            <?php } ?>
			</div>
		</div>
	</div>
</section>
<?php $this->load->view('layout/quesstion'); ?>
</div>
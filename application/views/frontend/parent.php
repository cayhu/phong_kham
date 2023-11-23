<div class="container" itemscope itemtype="https://schema.org/Blog">
	<div class="wrap_background_aside margin-bottom-40 section">
		<div class="row">
			<div class="content_all f-left w_100 margin-top-15">
				<div class="right-content margin-bottom-fix margin-bottom-50-article col-lg-8 col-md-8 col-sm-12 col-xs-12">

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
					<li><strong ><span itemprop="title"><?php echo $menu; ?></span></strong></li>
				</ul>
			</div>
		</div>
	</div>
</section>   
</div>

<div class="list-blogs blog-main row">
	<?php foreach ($data as $data) {
	foreach ($this->phongkham->get_menu_where(array('id'=>$data['parent'])) as $tam) {
		$menuparent=vntoen($tam['title']);
	}
	foreach ($this->phongkham->get_menu_where(array('id'=>$data['child'])) as $tam2) {
		$menuchild=vntoen($tam2['title']);
	}
	$urlpost=base_url().$menuparent."/".$menuchild."/".vntoen($data['title'])."-".$data['id'];
	?>
	<div class="myblog col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="itemblg large">
			<a class="image-blog-left" href="<?php echo $urlpost; ?>" title="<?php echo $data['title']; ?>">
				<img src="<?php echo base_url(); ?>public/images/<?php echo $data['img']; ?>" data-lazyload="<?php echo base_url(); ?>public/images/<?php echo $data['img']; ?>" title="<?php echo $data['title']; ?>" alt="<?php echo $data['title']; ?>">
			</a>
			
			<div class="content_blog">
				<h3>
					<a href="<?php echo $urlpost; ?>" title="<?php echo $data['title']; ?>"><?php echo $data['title']; ?></a>
				</h3>
				<a class="more" href="<?php echo $urlpost; ?>" title="Xem chi tiết">Xem chi tiết</a>
			</div>		
		</div>
	</div>
<?php } ?>
</div>
<div class="row">
	<div class="col-xs-12 text-center">
		
		<nav class="clearfix relative nav_pagi f-left w_100">
	<ul class="pagination clearfix">
		<?php if(isset($_GET['page']) && $_GET['page']>1){ ?> 
		<li class="page-item"><a class="page-link" href="?page=<?php echo $_GET['page']-1; ?>">«</a></li>
	    <?php } ?>
		<?php for ($i=1; $i <= $npage; $i++) {
		if(isset($_GET['page']) && $_GET['page']==$i) { $active="active disabled"; }else{ $active=''; }
		 ?>
	
		<li class="page-item <?php echo $active; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
	    <?php } ?>
	    <?php if(isset($_GET['page'])&& $_GET['page']<$npage){ ?> 
		<li class="page-item hidden-xs"><a class="page-link" href="?page=<?php echo $_GET['page']+1; ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i>
		</a></li>
		<?php } ?>
	</ul>
</nav>
		

	</div>
</div>
</div>


				<aside class="left left-content col-md-4 col-lg-4 col-sm-12 col-xs-12">
					
<aside class="aside-item sidebar-category collection-category margin-bottom-0 margin-top-15">
	<div class="title_h2">
		<h2>
			<span>Danh mục tin tức</span>
		</h2>
	</div>
	<div class="aside-content margin-top-15">
		<nav class="nav-category navbar-toggleable-md">
			<ul class="nav navbar-pills">
				<li class="nav-item lv1">
					<a class="nav-link" href="<?php echo base_url(); ?>">Trang chủ
					</a>
				</li>
				<li class="nav-item lv1">
					<a class="nav-link" href="<?php echo base_url(); ?>ve-chung-toi.htm">Về chúng tôi
					</a>
				</li>
				<li class="nav-item lv1">
					<a class="nav-link" href="<?php echo base_url(); ?>lien-he.htm">Liên hệ
					</a>
				</li>
				<li class="nav-item lv1">
					<a class="nav-link" href="<?php echo base_url(); ?>uu-dai.htm">Ưu đãi
					</a>
				</li>
				<li class="nav-item lv1">
					<a class="nav-link" href="<?php echo base_url(); ?>dat-lich-hen.htm">Đặt lịch hẹn
					</a>
				</li>	
			</ul>
		</nav>
	</div>
</aside>



<div class="section_blogloop_related section">
	<div class="containers">
		<div class="title_h2">
			<h2>
				<a href="tin-tuc" title="Bài viết nổi bật">Bài viết nổi bật</a>
			</h2>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
</div>

<?php $this->load->view('layout/quesstion') ?>
	</aside>

			</div>
		</div>
	</div>
</div>
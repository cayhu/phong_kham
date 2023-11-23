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
					<?php foreach ($data as $dt) ?>
					<li><strong ><span itemprop="title">
						<?php 
						foreach ($this->phongkham->get_menu_where(array('id'=>$dt['parent'])) as $kk) {
							echo "<a href='".base_url().vntoen($kk['title'])."-".$kk['id'].".htm'>".$kk['title']."</a>";
						}
						?></span></strong><span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span></li>
					<li><strong ><span itemprop="title">
						<?php echo $dt['title']; ?>
					</span></strong></li>
				</ul>
			</div>
		</div>
	</div>
</section>   
</div>
<article class="article-main section">
					<div class="row">
						<div class="col-lg-12">
							<div class="article-details">
								<h1 class="article-title"><?php echo $dt['title']  ?></h1>
							</div>

                            <div class="date">
									<i class="fas fa-calendar"></i>
									<div class="news_home_content_short_time">
									<?php echo $dt['date'];  ?>	
									</div>
									<div class="post-time">
										<i class="fa fa-eye" aria-hidden="true"></i>
										<span><?php echo $dt['view'];  ?>	</span>
									</div>

								</div>
							<div class="article-content">
								<div class="rte">
								<?php echo stripcslashes($dt['content']);?>
								</div>
							</div>
						</div>
					</div>
<div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="article_lq section">
		<div class="aside-title"><h2 class="title-head"><span>Bài viết liên quan</span></h2></div>
		<ul class="list_article">
		<?php foreach ($this->phongkham->get_data_where("tbl_post",array('id !='=>$dt['id'],'parent'=>$dt['parent'])) as $oder) {
	foreach ($this->phongkham->get_menu_where(array('id'=>$oder['parent'])) as $tam) {
		$menuparent=vntoen($tam['title']);
	}
	foreach ($this->phongkham->get_menu_where(array('id'=>$oder['child'])) as $tam2) {
		$menuchild=vntoen($tam2['title']);
	}
	$urlpost=base_url().$menuparent."/".$menuchild."/".vntoen($oder['title'])."-".$oder['id'];
			 ?>
			<li><a href="<?php echo $urlpost; ?>" title="<?php echo $oder['title']; ?>"><?php echo $oder['title']; ?></a></li>
		<?php } ?>
		</ul>
	</div>

</div>
</article>

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
				<a href="<?php echo base_url(); ?>tin-tuc.htm" title="Bài viết nổi bật">Bài viết nổi bật</a>
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
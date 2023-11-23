<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 colitem">
				<div class="info">
					<div class="logos">
						
						<a href="<?php echo base_url(); ?>" class="logo-wrapper ">					
							<img src="<?php echo base_url(); ?>public/img/logo.png" alt="">					
						</a>
						
					</div>
					<p>
					BSCKI - Admin - Chuyên khoa ngoại tổng quát
					</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 colitem">
				<div class="widget-ft">
					<h4 class="title-menu">
						<a role="button" class="collapsed">
							Về chúng tôi 
						</a>
					</h4>

					<ul class="linkaddess">
					<?php foreach ($this->phongkham->getdata("tbl_info") as $info) ?>
						<li>
							<i class="fa fa-map-marker"></i>
							<span><?php echo $info['name']; ?></span>
						</li>
						<li>
							<i class="fa fa-phone"></i>
							<a href="tel:<?php echo $info['phone']; ?>"><?php echo $info['phone']; ?>
							</a>
						</li>
						<li>
							<i class="fa fa-envelope"></i>
							<span><?php echo $info['address']; ?></span>
						</li>
		
					</ul>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 colitem">
				<div class="widget-ft">
					<h4 class="title-menu">
						<a role="button" class="collapsed" >
							Bạn cần tư vấn ? 
						</a>
					</h4>
					
					<ul class="supports">
						<li><a href="https://zalo.me/<?php echo $info['phone']; ?>" title="Chat ngay với Zalo"><img src="<?php echo base_url(); ?>public/img/zalo.jpg" alt="Zalo"/></a></li>

					</ul>
				</div>
			</div>

		</div>
	</div>

	<div class="bg-footer-bottom copyright clearfix">
		<div class="container">
			<div class="inner clearfix">
				<div class="row tablet">
					<div id="copyright" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 a-center fot_copyright">
						<span class="wsp">
							<span class="mobile">© Bản quyền thuộc về <b><a href="/" title="NST Web" target="_blank">Admin - Chuyên khoa ngoại tổng quát</a></b>
								<span class="hidden-xs"> | </span>
							</span>
							<span class="opacity1">Cung cấp bởi</span>
							<a href="https://www.facebook.com/" rel="nofollow" title="Sapo" target="_blank">Admin Ads</a>
						</span>
					</div>

				</div>
			</div>
			
			<a href="#" id="back-to-top" class="backtop"  title="Lên đầu trang"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
			
		</div>
	</div>
</footer>
<section class="page section margin-top-15">
	<div class="wrap_background_aside margin-bottom-0 section">
		<div class="section_gioithieu">
			<div class="container">
				<div class="title_before">
					<h1>
						Về chúng tôi
					</h1>
				</div>
				<div class="excerpt">
					Có thể thấy, sức khỏe là vốn quý luôn cần được quan tâm hàng đầu	Việc trang bị cho bản thân những hiểu biết và kiến thức cơ bản về y học để có thể tự chăm sóc mình khi sống tự lập luôn là vấn đề cần thiết với nhiều bạn trẻ hiện nay.

				</div>
				<div class="row">
					<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
						<p>
							<?php foreach ($this->phongkham->get_data_where("tbl_intro",array()) as $intro) {
								echo stripcslashes($intro['content']);
							} ?>
						</p>
						<ul class="list-item">
							<li>
								<img src="<?php echo base_url(); ?>public/img/icon1.png" alt="icon"/>
								<p>Bảo mật thông tin</p>
							</li>
							<li>
								<img src="<?php echo base_url(); ?>public/img/icon2.png" alt="icon"/>
								<p>Bác sĩ chuyên khoa đầu ngành</p>
							</li>
							<li>
								<img src="<?php echo base_url(); ?>public/img/icon3.png" alt="icon"/>
								<p>Chi phí phù hợp</p>
							</li>
							<li>
								<img src="<?php echo base_url(); ?>public/img/icon4.png" alt="icon"/>
								<p>Dịch vụ chu đáo</p>
							</li>
						</ul>
					</div>
					<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
						<img src="<?php echo base_url(); ?>public/img/pic_01.jpg" alt=""/>
					</div>
				</div>
			</div>
		</div>

		<div class="section section_dichvu">
			<div class="container">
				<div class="title_before">
					<h2>
						Dịch vụ của chúng tôi
					</h2>
				</div>
				<div class="slider_dichvu owl-carousel owl-theme"  data-dot="false" data-lg-items='4' data-md-items='4' data-sm-items='3' data-xs-items="1" data-margin='30'>
					<div class="item">
						<img src="<?php echo base_url(); ?>public/img/pic_01_dv.jpg" alt="Tư vấn trực tuyến">
						<p>
							Tư vấn trực tuyến
						</p>
					</div>
					<div class="item">
						<img src="<?php echo base_url(); ?>public/img/pic_02_dv.jpg" alt="Đăng ký gặp bác sĩ">
						<p>
							Đăng ký gặp bác sĩ
						</p>
					</div>
					<div class="item">
						<img src="<?php echo base_url(); ?>public/img/pic_03_dv.jpg" alt="Chia sẻ địa chỉ khám uy tín">
						<p>
							Chia sẻ địa chỉ khám uy tín
						</p>
					</div>
	
					<div class="item">
						<img src="<?php echo base_url(); ?>public/img/pic_04_dv.jpg" alt="Cung cấp thông tin y tế mới nhất">
						<p>
							Cung cấp thông tin y tế mới nhất
						</p>
					</div>
					
				</div>
			</div>
		</div>


	</div>
</section>
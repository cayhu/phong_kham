<section class="page section margin-top-15">
	<div class="wrap_background_aside margin-bottom-40">
		<div class="section section_expt">
			<div class="container">
				<div class="title_before">
					<h1>
						Đặt lịch ngay
					</h1>
				</div>
				<div class="excerpt">
					Với mục tiêu giúp người dùng dễ dàng tiếp cận các dịch vụ chăm sóc sức khỏe hàng đầu hiện nay, chúng tôi tạo ra nhiều phương thức liên hệ.
				</div>
			</div>
		</div>
		<div class="section section_contact">
			<div class="container">
				<div class="detail">
					<div class="titles">Đã dễ dàng nay còn thuận tiện</div>
					<ul class="list-item clearfix">
						<?php foreach ($this->phongkham->get_data_where("tbl_info",array()) as $map)?>
						<li>
							<div class="icon"></div>
							<a href="tel:<?php echo $map['phone']; ?>" title="Gọi điện trực tiếp với các bác sĩ" class="clearfix">
								<span class="title">Gọi điện trực tiếp với các bác sĩ</span>
								<span class="favicon"></span>
							</a>
						</li>
						<li>
							<div class="icon"></div>
							<a href="<?php echo base_url(); ?>lien-he.htm" title="Đặt lịch hẹn trực tiếp trên website" class="clearfix" rel="nofollow">
								<span class="title">Đặt lịch hẹn trực tiếp trên website</span>
								<span class="favicon"></span>
							</a>
						</li>
						<li>
							<div class="icon"></div>
							<a target="_blank" href="https://www.messenger.com/t/simsodepgiagoc.ct" title="Trò chuyện với các chuyên gia trên facebook" class="clearfix" rel="nofollow">
								<span class="title">Trò chuyện với các chuyên gia trên facebook</span>
								<span class="favicon"></span>
							</a>
						</li>
						<li>
							<div class="icon"></div>
							<a target="_blank" href="https://zalo.me/<?php echo $map['phone']; ?>" title="Đăng ký khám qua zalo (với đối tác của chúng tôi)" class="clearfix" rel="nofollow">
								<span class="title">Đăng ký khám qua zalo (với đối tác của chúng tôi)</span>
								<span class="favicon"></span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="section section_formcontact">
			<div class="pagelogin container">
				<div class="title_before">
					<h2>
						Chuyên trang tư vấn sức khỏe
					</h2>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<img src="<?php echo base_url(); ?>public/img/bacsi.jpg" alt="banner"/>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<div class="wrapform">
							<?php if(isset($_GET['success'])){ ?>
							<div id="#success" class="alert alert-success">Bạn đã đặt lịch thành công</div>
						    <?php } ?>
						    <?php if(isset($_GET['error'])){ ?>
						    <div id="error" class="alert alert-warning">Có lỗi! Xin thử lại!</div>	
						    <?php } ?>	
							<form accept-charset="UTF-8" action="<?php echo base_url() ?>welcome/booking" id="contact" method="post">
							<div class="form-signup clearfix">
								<h2 class="block a-center">
									Đăng ký hẹn khám
								</h2>
								<div class="row group_contact">
									<fieldset class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<input placeholder="Họ và tên" type="text" class="form-control  form-control-lg" required value="" name="name">
									</fieldset>
									<fieldset class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<input placeholder="Số điện thoại" type="text" required id="" class="form-control form-control-lg" value="" name="phone">
									</fieldset>
									<fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<textarea placeholder="Triệu trứng bệnh" name="content" id="comment" class="form-control content-area form-control-lg" rows="5" Required></textarea>
									</fieldset>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-10">
										<button type="submit" class="btn btn-primary btn-lienhe">Đặt lịch ngay</button>
									</div>
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

		
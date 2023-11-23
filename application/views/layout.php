<!DOCTYPE html>
<html lang="vi">
<head>
<?php $this->load->view('layout/vntoen'); ?>
<!-- ================= Favicon ================== -->
<link rel="icon" href="" type="image/x-icon" />
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">			
<title><?php echo $title; ?></title>
<script>
(function() {
function asyncLoad() {
var urls = [];
for (var i = 0; i < urls.length; i++) {
var s = document.createElement('script');
s.type = 'text/javascript';
s.async = true;
s.src = urls[i];
s.src = urls[i];
var x = document.getElementsByTagName('script')[0];
x.parentNode.insertBefore(s, x);
}
}
window.attachEvent ? window.attachEvent('onload', asyncLoad) : window.addEventListener('load', asyncLoad, false);
})();
</script>
<!-- ================= Page description ================== -->
<meta name="description" content="NST Phòng Khám - Trang chuyên hỏi đáp tư vấn sức khỏe">
<!-- ================= Meta ================== -->
<meta name="keywords" content="Nst Phòng khám, NST Clinic, NTS Theme, NST Dịch vụ"/>		
<link rel="canonical" href="https://nts-phong-kham.bizwebvietnam.net"/>
<meta name='revisit-after' content='1 days' />
<meta name="robots" content="noodp,index,follow" />
<!-- Facebook Open Graph meta tags -->
<meta property="og:type" content="website">
<meta property="og:title" content="NST Phòng Khám">
<meta property="og:image" content="<?php echo base_url(); ?>public/img/logo.png">
<meta property="og:image:secure_url" content="">
<meta property="og:description" content="">
<meta property="og:url" content="">
<meta property="og:site_name" content="">		
<!-- Plugin CSS -->			
<!-- Build Main CSS -->		
<link href="<?php echo base_url(); ?>public/themes/plugin.scss.css?1561717641385" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/themes/base.scss.css?1561717641385" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/themes/style.scss.css?1561717641385" rel="stylesheet" type="text/css" />		
<link href="<?php echo base_url(); ?>public/themes/module.scss.css?1561717641385" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/themes/responsive.scss.css?1561717641385" rel="stylesheet" type="text/css" />
</head>
<body class="">
	<div class="hidden-md hidden-lg opacity_menu"></div>
	<div class="op_login"></div>
	<!-- Main content -->
	<?php $this->load->view('layout/header'); ?>
     <div id="menu-overlay" class=""></div>
	<!-- Header JS -->	
	<script src="<?php echo base_url(); ?>public/themes/jquery-2.2.3.min.js?1561717641385" type="text/javascript"></script>
	<h1 class="hidden"><?php echo $title; ?></h1>
    <?php $this->load->view($pview); ?>	
    <?php $this->load->view('layout/footer'); ?>	
<!-- Plugin JS -->
<script src="<?php echo base_url(); ?>public/themes/plugin.js?1561717641385" type="text/javascript"></script>	
<!-- Main JS -->	
<script src="<?php echo base_url(); ?>public/themes/main.js?1561717641385" type="text/javascript"></script>

<div class="toolbar hidden-xs">
	<div class="inner">
		<?php foreach ($this->phongkham->getdata("tbl_info") as $info) ?>
		<a class="phone toolbar_a" href="tel:<?php echo $info['phone']; ?>">
			<i class="fa fa-phone"></i>
			<span>Gọi ngay</span>
		</a>
		
		
		<a class="face toolbar_a" href="<?php echo $info['facebook']; ?>">
			<i class="fab fa-facebook"></i>
			<span>Facebook</span>
		</a>
		

	</div>
</div>
		<script type="text/javascript">
			WebFontConfig = {
				google: { families: [ 'Roboto:400,700&amp;subset=vietnamese'] },
				custom: {
					families: ['FontAwesome'],
					urls: ['https://use.fontawesome.com/releases/v5.0.13/css/all.css']
				}
			};
			(function() {
				var wf = document.createElement('script');
				wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
				wf.type = 'text/javascript';
				wf.async = 'true';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(wf, s);
			})();
		</script>
		
		
<a class="block_datlich" style="display: none;" href="dat-lich-hen" title="Đặt lịch ngay"><img src="<?php echo base_url(); ?>public/themes/datlich.png?1561717641385" alt="đặt lịch"/></a>
	

	</body>
</html>
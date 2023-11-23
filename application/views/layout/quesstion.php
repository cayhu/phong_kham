<section class="section_question_blog">
	<div class="containers">
		<div class="title_h2">
			<h2>
				<a href="<?php echo base_url(); ?>cau-hoi-thuong-gap.htm" title="Câu hỏi thường gặp">Câu hỏi thường gặp</a>
			</h2>
		</div>
		<div class="section">
			<ul>
			<?php foreach ($this->phongkham->get_quession() as $quess) {
				$url_quess=base_url()."cau-hoi-thuong-gap/".vntoen($quess['title'])."-".$quess['id'];
		   ?>		
				<li class="itemblg medium">
					<a href="<?php echo $url_quess; ?>" title="<?php echo $quess['title']; ?>"><?php echo $quess['title']; ?></a>
				</li>
			<?php } ?>	
			</ul>
		</div>
	</div>
</section>
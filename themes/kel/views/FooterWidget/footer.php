<div class="footer clearfix">
	<div class="column">
		<h4>
		<a href="<?php echo Yii::app()->createUrl('//article/editor');?>">
		Editor's Pick
		</a>
		</h4>
	</div>
	<!-- Single Column -->
	<?php if(isset($section)) {?>
		<?php foreach ($section as $key => $value) {?>
		
		<div class="column">
			<h4>
				<a href="<?php echo $value->getUrl();?>" title="<?php echo $value->title;?>"><?php echo $value->title;?></a>	
			</h4>
			<?php if(count($category->getCategories($value->id)) > 0) {?>
				<ul>
					<?php foreach ($category->getCategories($value->id) as $cat) {?>
					<li>
						<a href="<?php echo $cat->getUrl($value->slug);?>" title="<?php echo $cat->title;?>"><?php echo $cat->title;?></a>
					</li>
					<?php } ?>
				</ul>
			<?php } ?>
		</div>
		<?php } ?>
	<?php } ?>
	
	<!-- Single Column -->
	<div class="column">
		<h4>About Us</h4>
		<ul>
			<li>
				<a href="<?php echo Yii::app()->createUrl('/site/page/view/about');?>" title="About Us">About Us</a>
			</li>
			<li>
				<a href="<?php echo Yii::app()->createUrl('/site/contact');?>" title="Contact Us">Contact Us</a>
			</li>
			<li>
				<a href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/MediaKitKR.pdf" title="Media Kit">Advertising/Media Kit</a>
			</li>
		</ul>
	</div>
	<!-- Single Column -->
</div>
<!-- footer -->
<div class="powered">
	<div class="left">
		<p>© <?php echo date('Y');?> Dream-Weavers Media. All rights reserved.</p>
	</div>
	<div class="right">
		 <ul>
			<li><a href="#" title="Editorial Policy" target="_blank">Editorial Policy</a></li>
			<li><a href="#" title="Privacy Policy" target="_blank">Privacy Policy</a></li>
			<li><a href="#" title="Terms & Conditions  " target="_blank">Terms & Conditions  </a></li>     
		 </ul>
	</div>
</div>
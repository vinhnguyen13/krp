<?php $this->pageTitle=Yii::app()->name; ?>


<div class="page-section">
	<div class="head">
		<h1>Fashion</h1>
		<div class="filter">
			<label>Display:</label>
			<a href="#" class="filter-choice" title="">Most Current<i></i></a>
			<div class="filter-list">
				<ul>
					<li><a href="#" title="">Most Current</a></li>
					<li><a href="#" title="">Most View</a></li>
					<li><a href="#" title="">Most Comment</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- cate head -->
	<div class="section-detail">
		<ul>
		<?php for($i=1; $i <= 9; $i++){?>
			<?php 
			$url = Yii::app()->createUrl('//fashion/detail');
			?>
			<li>
				<a href="<?php echo $url;?>" title="" class="tmb">
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/images/img-cat-00<?php echo ($i % 3 == 0) ? 3 : $i % 3;?>.jpg" alt="" border="" />
				</a>
				<a href="#" title="" class="category">
					Clothing
				</a>
				<a href="<?php echo $url;?>" title="" class="title">
					Out Of Office
				</a>
				<p class="des">
					Longer description make no problem Longer description make no problem Longer description make no problem Longer description make no problem
				</p>
				<a href="<?php echo $url;?>" title="" class="more">
					read more
				</a>
			</li>
		<?php }?>
		</ul>
		<div class="pagi">
			<a href="#">Loading more...</a>
		</div>
	</div>
	<!-- cate detail -->
</div>
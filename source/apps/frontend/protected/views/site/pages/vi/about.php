<?php
/* @var $this SiteController */

$this->pageTitle .= ' - ' . Lang::t('general', 'About Us');
$this->breadcrumbs=array(
	'About',
);
?>
<div class="page-aboutus">
    <h1><?php echo Lang::t('general', 'About Kelreport')?></h1>
    <div class="left about_new">
    	<div class="frame_pics">
        	<a href="<?php echo Yii::app()->createUrl('//site/page/view/our-team');?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/images/aboutus_new.jpg" align="absmiddle" /></a>
        </div>
	</div>
    <div class="left txt-ab-left">
        <p>
			Lần đầu tiên ra mắt vào năm 2007, KelReport được biết đến như người bạn đồng 
			hành lý tưởng của những người yêu thích mua sắm với những thông tin mới nhất về
			thời trang, phụ kiện và những địa điểm giải trí hàng đầu.
		</p>
		<p>
			Sau một thời gian dài vắng mặt, KelReport đã trở lại với mục tiêu trở thành địa chỉ 
			hàng ngày nơi mà người đọc có thể được cập nhật liên tục về các sản phẩm thời
			trang đặc biệt được tuyển chọn và giới thiệu bởi đội ngũ biên tập, bao gồm trang 
			phục, phụ kiện, xe, thiết bị công nghệ và nhiều ngành hàng khác.
		</p>
		<p>
			KelReport áp dụng một chính sách nghiêm ngặt về nội dung. Mỗi sản phẩm giới
			thiệu trên trang của chúng tôi đều được lựa chọn bởi chính các biên tập viên. 
			KelReport không khuyến khích các nội dung được trả tiền bởi nhãn hàng.
		</p>
		<p>
			Các thị trường chính: Hồ Chí Minh, Hà Nội, Singapore và Bangkok.
		</p>
    </div>
    <div class="right txt-ab-right">
        <div class="note-cm">
            <span class="top-close icon_common"></span>
            <span class="bottom-close icon_common"></span>
            <p>KelReport áp dụng một chính sách nghiêm ngặt về nội dung. Mỗi sản phẩm giới thiệu trên trang của chúng tôi đều được lựa chọn bởi chính các biên tập viên.</p>
        </div>
    </div>
</div>

          
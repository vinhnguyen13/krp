<?php
if ($items && count($items) > 0) {
    ?>
    <div class="col-xs-12 col-md-6 pdL-30 pdR-30 slide-intro">
        <div class="style-box style-box-1 swiper-container">
            <div class="swiper-wrapper">
                <?php
                foreach ($items['news'] as $key => $value) {
                    $producturl = '';
                    $producturl = Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));
                    ?>
                    <div class="swiper-slide">
                        <a href="<?php echo $producturl; ?>" class="thumb">
                            <!--
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/images/img539x480.jpg" alt=""/></a>
                            -->
                            <?php echo $value->getImageThumbnail(array('height' => '539px', 'width' => '480px')); ?>
                        <div class="intro-item">
                            <a href="<?php echo $producturl; ?>" class="link-item"><?php echo $value->title; ?></a>

                            <?php echo $value->description; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    <?php
}
?>
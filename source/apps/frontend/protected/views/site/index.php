
<?php //$this->widget('frontend.widgets.home.SectionWidget'); ?>
<div class="container">
    <?php $this->widget('frontend.widgets.home.NewsAndPromoWidget'); ?>
    <div class="clearfix mgB-40 box-big-news-promo">
        <?php $this->widget('frontend.widgets.home.NewlyOpenedWidget'); ?>
        <?php $this->widget('frontend.widgets.home.SliderWidget'); ?>
        <?php $this->widget('frontend.widgets.home.AdsWidget'); ?>
    </div>

    <?php $this->widget('frontend.widgets.home.SectionRestaurantsWidget'); ?>
</div>

<?php $this->widget('frontend.widgets.home.SectionVideosWidget'); ?>

<div class="container">
    <div class="row">
        <?php $this->widget('frontend.widgets.home.SectionPeoplesWidget'); ?>
        <?php $this->widget('frontend.widgets.home.SectionPopularWidget'); ?>
    </div>
</div>

<!-- Picks Sections -->
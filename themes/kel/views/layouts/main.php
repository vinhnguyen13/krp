<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta name="robots" content="index, follow" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta property="og:site_name" content="Kelreport"/>
<meta property="og:type" content="article"/>
<meta name="google-site-verification" content="ltGeGztsn0mcTWRE81gPy_R2Cbi0o6q8ceOFCE_d1G8" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/plugins.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/style.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]>
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/print.css" rel="stylesheet" type="text/css" media="print"/>
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/css/power.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/jquery.js"></script>	
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->clientScript->getCoreScriptUrl().'/jquery.yiiactiveform.js'?>"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/jquery.coookie.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/jquery.bxSlider.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/inview.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/icheck.js"></script>
<script type="text/javascript">
	var urlCommon = '<?php echo Yii::app()->theme->baseUrl; ?>';
</script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/common.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/js/util/common.js"></script>
</head>
<body>
	<div class="kel">
		<div class="wrapper kel-home">
				<div class="header">
					<div class="welcome">
						<p>Welcome</p>
					</div>
					<!-- welcome message -->
					<?php
					$locations = ProLocation::model()->findAll();
					if(!empty($locations)){
						$locationDefault = 'All';
						if(!empty(Yii::app()->session['_location'])){
							$_tmp_locationDefault = json_decode(Yii::app()->session['_location'], false);
							$locationDefault = $_tmp_locationDefault->city_name;
						}
					?>
					<div class="location">
						<p>Location <a href="#" title="Singapore" class="btn-country"><?php echo $locationDefault;?></a></p>
						<div class="location-list">
							<ul>
								<li><a href="<?php echo Yii::app()->createUrl('//site/location')?>">All</a></li>
								<?php foreach ($locations as $location){?>
									<li><a href="<?php echo Yii::app()->createUrl('//site/location', array('_location'=>$location->id))?>"><?php echo $location->city_name;?></a></li>
								<?php }?>
							</ul>
						</div>
					</div>
					<?php }?>
					<!-- location choose -->
					<div class="logo">
						<a href="<?php echo Yii::app()->homeUrl;?>" title="Kelport"></a>
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/images/logo.png" alt="Kel Report" class="image"/>
						<h1>Kelreport</h1>
						<!-- only insert <h1> tag at home -->
					</div>
					<!-- logo -->
					<div class="authen">
						<ul class="wrap">
							<li class="item">
							<?php if(Yii::app()->user->isGuest){?>
								<a title="Login" onclick="javascript:sprLogin(this);" href="javascript:void(0)"><i class="ismall ismall-login"></i><span class="itext">Login</span></a>
								<div class="reg-board board-login">
									<a href="#" class="btn-close" title="Close"></a>
									<div class="span-wrap"><span class="arrow"></span></div>
									<div class="reg-board-detail">
									<?php 
									$model=new LoginForm();
									$form=$this->beginWidget('CActiveForm', array(
										'id'=>'login-form',
										'action'=>Yii::app()->createUrl('/site/login'),
										'enableClientValidation'=>true,
					                    'enableAjaxValidation'=>true,
					                    'clientOptions'=>array(
					                        'validateOnSubmit'=>true,
					                    ),
									)); ?>
										<ul>	
											<li>
												<?php echo $form->textField($model,'username', array('placeholder'=>'Username')); ?>
												<?php echo $form->error($model,'username'); ?>
											</li>
											<li>
												<?php echo $form->passwordField($model,'password', array('placeholder'=>'Password')); ?>
												<?php echo $form->error($model,'password'); ?>
											</li>
											<li class="remember-me">
												<div class="block-inline">
													<?php echo $form->checkBox($model,'rememberMe', array('id'=>'remember-cb')); ?>
													<label for="remember-cb">Remember me</label>
												</div>
												<div class="block-inline block-sep">
													<span>|</span>
												</div>
												<div class="block-inline">
													<a href="#" target="_blank">
														Forgot your password?
													</a>
												</div>
											</li>
											<li class="buttons">
												<input class="btn-login" type="submit" value="LOG IN"/>
											</li>
											<li class="line">
												<span></span>
											</li>
											<li>
												<a href="<?php echo Yii::app()->createUrl('//site/facebook')?>" title="Login with Facebook"><i class="btn-reg-facebook"></i></a>
											</li>
											<li>
												<a href="<?php echo Yii::app()->createUrl('//site/google')?>" title="Signup with Google"><i class="btn-reg-google"></i></a>
											</li>
										</ul>
										<?php $this->endWidget(); ?>
									</div>
								</div>
								<!-- Login popup -->
							<?php }else{
								?>
									<a title="Login" href="<?php echo Yii::app()->user->data()->getUserUrl();?>" class="logged-user"><i class="ismall ismall-login"></i><span class="itext"><?php echo Yii::app()->user->data()->getDisplayName();?></span></a>
									<?php 
									$fuser = Yii::app()->facebook->getUser();
									if (!empty($fuser)){
									?>
									<div class="reg-board board-login">
										<a href="#" class="btn-close" title="Close"></a>
										<div class="span-wrap"><span class="arrow"></span></div>
										<div class="reg-board-detail">
											<ul>	
												<li class="facebook-connected">
													<i class="btn-reg-facebook"></i>
												</li>
											</ul>
										</div>
									</div>
									<?php }?>
									<!-- Login popup -->
							<?php }?>
							</li>
							<li class="item">
								<?php if(Yii::app()->user->isGuest){?>
									<a title="Sign up" class="btn-reg" onclick="javascript:sprReg(this);"><i class="ismall ismall-reg"></i><span class="itext">Sign up</span></a>
								<?php }else{?>
									<a title="Sign up" class="btn-reg" href="<?php echo Yii::app()->createUrl('//site/logout')?>"><i class="ismall ismall-reg"></i><span class="itext">Sign out</span></a>
								<?php }?>
								<div class="reg-board board-reg">
									<a href="#" class="btn-close" title="Close"></a>
									<div class="span-wrap"><span class="arrow"></span></div>
									<div class="reg-board-detail">
										<ul>
											<li>
												<a href="<?php echo Yii::app()->createUrl('//site/facebook')?>" title="Login with Facebook"><i class="btn-reg-facebook"></i></a>
											</li>
											<li>
												<a href="<?php echo Yii::app()->createUrl('//site/google')?>" title="Signup with Google"><i class="btn-reg-google"></i></a>
											</li>
											<li class="reg-email">
												<a href="<?php echo Yii::app()->createUrl('//site/register')?>" title="Signup using your email">Signup using your email?</a>
											</li>
											<li class="reg-policy">
												<p>By signing up for <span class="bold">Kelreport</span> you agree to the <a href="#" target="_blank">Terms of Service</a> and <a href="#" target="_blank">Privacy Policy</a></p>
											</li>
										</ul>
									</div>
								</div>
								<!-- register popup -->
							</li>
							
							<?php
							$languages = Language::model()->findAllByAttributes(array('enable'=>true));
							$languageDefault = Language::model()->findByAttributes(array('code'=>Yii::app()->language));
							if(!empty($languages)){
							?>
							<li class="item">
								<a title="Language" class="btn-language" href="javascript:void(0);"><i class="ismall ismall-lang"></i><span class="itext"><?php echo $languageDefault->title;?></span></a>
								<div class="lang-list">
									<ul>
										<?php foreach ($languages as $language){?>
										<li><a href="<?php echo Yii::app()->createUrl('//site/lang', array('_lang'=>$language->code))?>" rel="<?php echo $language->code?>" id="lang-<?php echo $language->code?>"><?php echo $language->title?></a></li>
										<?php }?>
									</ul>
								</div>
							</li>
							<?php }?>
					</div>
					<!-- Authen -->
					<?php $this->widget('frontend.widgets.home.SearchWidget'); ?>
					<!-- search -->
				</div>
				<!-- header -->
				<?php $this->widget('frontend.widgets.home.MenuWidget'); ?>
				<!-- navigation -->
				<div class="main-content">
					<div class="cline cline-black"></div>
					<div class="content-wrap">
						<?php //echo $content; ?>
					</div>
					<!-- content board -->
				</div>
				<!-- Main content board -->
				<div class="bottom">
					<?php $this->widget('frontend.widgets.home.SubscribeWidget'); ?>
					<!-- Newsletter -->
					<?php $this->widget('frontend.widgets.home.FooterWidget'); ?>
				</div>
				<!-- bottom area -->
		</div>
		<!-- main wrapper -->
	</div>
	<!-- body -->	
</body>

</html>
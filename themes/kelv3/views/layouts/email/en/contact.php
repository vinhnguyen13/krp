<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Email template Kelreport</title>
</head>

<body>
<div style="margin:0 auto;">
<table width="" border="0" cellspacing="0" cellpadding="0" style="width:693px; margin:0 auto; background:url(<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/email/images/bg_mail.jpg) repeat #dfdfdf; font-family:Arial; font-size:12px; color:#787878;">
  <tr>
    <td valign="middle" align="center">
    	<table width="563" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial; font-size:12px; color:#565656;">
          <?php require_once Yii::getPathOfAlias('themes.kelv2.views.layouts.email.en._header').'.php';?>
          <tr>
            <td style="background:#FFF; padding:0 40px 10px 40px;" align="left" valign="top">
            	<table cellpadding="6">
						<tr><td>Full name</td><td><?php echo $name ?></td></tr>	
						<tr><td>Email</td><td><?php echo $email ?></td></tr>
						<tr><td>Your Phone</td><td><?php echo $phone_number ?></td></tr>
						<tr><td>Subject</td><td><?php echo $subject ?></td></tr>
						<tr><td>Your Message</td><td><?php echo $body ?></td></tr>
				</table>
            </td>
          </tr>
          <tr style="float:left; background:#FFF; width:100%;">
          	<td style="padding:0 20px; width:563px;">
            	<?php require_once Yii::getPathOfAlias('themes.kelv2.views.layouts.email.en._footer').'.php';?>
            </td>
          </tr>
          <tr style="float:left; width:100%; margin-bottom:30px;"><td><img align="absmiddle" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/email/images/shadow_mail.png"></td></tr>
        </table>
    </td>
  </tr>
</table>

</div>
</body>
</html>

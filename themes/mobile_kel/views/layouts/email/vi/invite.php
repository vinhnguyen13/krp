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
          <?php require_once Yii::getPathOfAlias('themes.kelv2.views.layouts.email.vi._header').'.php';?>
          <tr>
            <td style="background:#FFF; padding:0 40px 10px 40px;" align="left" valign="top">
            	<p style="font-size:14px;"><b><?php echo $receiver ?></b> thân mến,</p>
                <p style="line-height:18px;"><b><?php echo $inviter ?></b> mời bạn tham gia KelReport, trang web dành cho những người yêu thích mua sắm với những sản phẩm và dịch vụ hấp dẫn nhất được tuyển chọn và giới thiệu bởi đội ngũ các biên tập viên của chúng tôi.</p>
                <p>Để nhận lời mời, vui lòng bấm vào nút bên dưới</p>
                <p style="text-align:left; padding:10px 0; word-wrap:break-word;"><a href="<?php echo $url ?>" style="background:#333; padding:6px 20px; color:#FFF; font-size:14px; font-weight:bold; text-decoration:none; text-transform:uppercase;">Đồng ý</a></p>
				<p><b>KelReport Team</b></p>
            </td>
          </tr>
          <tr style="float:left; background:#FFF; width:100%;">
          	<td style="padding:0 20px; width:563px;">
            	<?php require_once Yii::getPathOfAlias('themes.kelv2.views.layouts.email.vi._footer').'.php';?>
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

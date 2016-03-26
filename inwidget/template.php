<?php 
/**
 * Project:     inWidget: show pictures from instagram.com on your site!
 * File:        template.php
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of MIT license
 * http://inwidget.ru/MIT-license.txt
 * 
 * @link http://inwidget.ru
 * @copyright 2015 Alexandr Kazarmshchikov
 * @author Alexandr Kazarmshchikov
 * @version 1.0.7
 * @package inWidget
 *
 */

if(!$inWidget) die('inWidget object was not initialised.');
if(!is_object($inWidget->data)) die('<b style="color:red;">Cache file contains plain text:</b><br />'.$inWidget->data);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
	<head>
		<title>inWidget - free Instagram widget for your site!</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="content-language" content="<?php echo $inWidget->langName; ?>" />
		<meta http-equiv="content-style-type" content="text/css2" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<style type='text/css'>
            @import url(https://fonts.googleapis.com/css?family=Lobster&subset=latin,cyrillic);
			body {
				color: #212121;
   				font-family: arial;
   				font-size:12px;
   				padding:0px;
   				margin:0px;
			}
			img {
				border: 0;
			}
			.clear {
				clear:both;
				height:1px;
				line-height:1px;
			}
			.widget {
				width:<?php echo $inWidget->width; ?>px;
				border:1px solid #c3c3c3;
				background:#f9f9f9;
				#border-radius: 5px 5px 5px 5px;
				#-webkit-border-radius: 5px 5px 5px 5px;
				#-moz-border-radius: 5px 5px 5px 5px;
				overflow:hidden;
			}
			.widget a.title:link, .widget a.title:visited  {
				display:block;
				height:40px;
/*                Цвет полоски*/
				background:#F6C5C6;
				text-decoration:none;
			}
			.widget .title .icon {
				display:block;
				float:left;
				width:25px;
				height:25px;
				margin:7px 10px 0 5px;
			}
/*            Текст виджета*/
			.widget .title .text {
                text-align: center;
				float:left;
				width: <?php echo ($inWidget->width-44); ?>px;
				height:25px;
				overflow:hidden;
				margin:5px 0 0 0;
				color:#FFF;
				font-size: 20px;
				white-space:nowrap;
                font-family: 'Lobster', cursive;
				<?php if($inWidget->width<160) echo 'display:none'; ?>
			}
			.widget .profile {
				width:100%;
				border-collapse: collapse;
			}
			.widget .profile tr td {
				padding:0px;
				margin:0px;
				text-align:center;
			}
			.widget .profile td {
				border:1px solid #c3c3c3;
			}
			.widget .profile .avatar {
				width:1%;
				padding:10px !important;
				border-left:none !important;
				line-height:0px;
			}
			.widget .profile .avatar img {
				width:60px;
			}
			.widget .profile .value {
				width:33%;
				height:30px;
				font-size:14px;
				font-weight:bold;
			}
			.widget .profile span {
				display:block;
				font-size:9px;
				font-weight:bold;
				color:#999999;
				margin: -2px 0 0 0;
			}
			.widget a.follow:link, .widget a.follow:visited {
				display:block;
				background:#ad4141;
				text-decoration:none;
				font-size:14px;
				color:#FFF;
				font-weight:bold;
				width:120px;
				margin:0 auto 0 auto;
				padding:4px 4px 4px 10px;
				border:3px solid #FFF;
				border-radius: 5px 5px 5px 5px;
				-webkit-border-radius: 5px 5px 5px 5px;
				-moz-border-radius: 5px 5px 5px 5px;
				box-shadow: 0 0px 2px rgba(0,0,0,0.5);
				-moz-box-shadow: 0 0px 2px rgba(0,0,0,0.5);
				-webkit-box-shadow: 0 0px 2px rgba(0,0,0,0.5);
			}
			.widget a.follow:hover {
				background:#cf3838;
			}
			.widget .data {
				text-align:left;
				margin:3px 0 0 7px;
				padding:0 0 1px 0;
			}
			.widget .data .image {
				display:block;
				float:left;
				margin:0 5px 5px 0;
				width:<?php echo $inWidget->imgWidth; ?>px;
				height:<?php echo $inWidget->imgWidth; ?>px;
				overflow:hidden;
				border:2px solid #FFF;
				box-shadow: 0 1px 1px rgba(0,0,0,0.3);
				ling-height:0px;
			}
			.widget .data .image img {
				width:<?php echo $inWidget->imgWidth; ?>px;
			}
			.widget .data .image:hover {
				filter: alpha(opacity=80);
    			opacity: 0.8;
			}
			.widget .empty {
				text-align:center;
				margin:10px 0 10px 0;
			}
			.copyright {
				width:<?php echo $inWidget->width; ?>px;
				margin:3px 0 0 0;
				font-size:10px;
				text-align:center;
			}
			.copyright a:link, .copyright a:visited {
				text-decoration:none;
				color:#666;
			}
			.copyright a:hover {
				text-decoration:underline;
			}
		</style>
	</head>
<body>
<div class="widget">
	<a href="http://instagram.com/<?php echo $inWidget->data->username; ?>" target="_blank" class="title">
		<img 
			src="i/icon.png" 
			class="icon" />
		<div class="text"><?php echo $inWidget->lang['title']; ?></div>
		<div class="clear">&nbsp;</div>
	</a>
	<?php
		if($inWidget->toolbar == true) { 
			echo '
			<table class="profile">
				<tr>
					<td rowspan="2" class="avatar">
						<a href="http://instagram.com/'.$inWidget->data->username.'" target="_blank"><img src="'.$inWidget->data->avatar.'"></a>
					</td>
					<td class="value">
						'.$inWidget->data->posts.'
						<span>'.$inWidget->lang['statPosts'].'</span>
					</td>
					<td class="value">
						'.$inWidget->data->followers.'
						<span>'.$inWidget->lang['statFollowers'].'</span>
					</td>
					<td class="value" style="border-right:none !important;">
						'.$inWidget->data->following.'
						<span>'.$inWidget->lang['statFollowing'].'</span>
					</td>
				</tr>
				<tr>
					<td colspan="3" style="border-right:none !important;">
						<a href="http://instagram.com/'.$inWidget->data->username.'" class="follow" target="_blank">'.$inWidget->lang['buttonFollow'].' &#9658;</a>
					</td>
				</tr>
			</table>';
		}
		if(!empty($inWidget->data->images)){
			if($inWidget->config['imgRandom'] === true) shuffle($inWidget->data->images);
			$inWidget->data->images = array_slice($inWidget->data->images,0,$inWidget->view);
			echo '<div id="widgetData" class="data">';
			foreach ($inWidget->data->images as $key=>$item){
				switch ($inWidget->preview){
					case 'large':
						$thumbnail = $item->large;
						break;
					case 'fullsize':
						$thumbnail = $item->fullsize;
						break;
					default:
						$thumbnail = $item->small;
				}
				echo '<a href="'.$item->link.'" class="image" target="_blank"><img src="'.$thumbnail.'" alt="" /></a>';
			}
			echo '<div class="clear">&nbsp;</div>';
			echo '</div>';
		}
		else echo '<div class="empty">'.$inWidget->lang['imgEmpty'].'</div>';
	?>
</div>
<!-- Убрали кое что на самом деле важное, но к сожалению пока убрали
<div class='copyright'>
	&copy; <a href='http://inwidget.ru' target='_blank' title='Free Instagram widget for your site!'>inwidget.ru</a>
</div>
-->
</body>
</html>
<!-- 
	inWidget - free Instagram widget for your site!
	http://inwidget.ru
	© Alexandr Kazarmshchikov
-->
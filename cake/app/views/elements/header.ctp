<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>localSNS</title>
</head>
<?php echo $html->css('header');?>
<body>


	<!-- ヘッダ -->
	<div id="header"><h1><a href="http://localhost/cake/boards">Local SNS</a></h1></div>
	<div id ="login">
		<?php if(!empty($userinfo)){
				echo "ようこそ、".$userinfo['User']['username']."さん<br>";
				echo $html->link('ログアウト','/users/logout');
			  }
			  else{
				echo $html->link('ログイン','/users/login');
			  }
		?>
	</div>

		<!-- メインメニュー -->
		<ul id="menu">
		
			<li id="menu01"><a href="http://localhost/cake/boards">シゴトを探す</a></li>
			<li id="menu02"><a href="http://localhost/cake/profiles/mypage">Mypage</a></li>
			<li id ="menu03"><?php if(empty($userinfo)){echo $html->link('新規登録','/users/add');}?></a></li>
		</ul>
	<div id="menuB">
		<div id="search">			
			<?php 
					echo $form->create("Board",array('type'=>'post','controller'=>'boards','action'=>'search'));
					echo $form->text("search");
			?>
		</div>
		
		<div id = "search"><?php echo $form->end("検索");?></div>

		<div id="post"><?php echo $html->link("投稿する",'/boards/edit');?></div>
		
	</div>
	<div id="pagebody">

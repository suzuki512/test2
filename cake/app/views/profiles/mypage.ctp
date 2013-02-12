<?php echo $this->element('header'); ?>
<?php echo $this->element('side'); ?>
<?php echo $html->css('profile_mypage'); ?>
<div class ="content">

	<!--友達通知-->
	<h3>
	<?php
		if(!empty($apply)&&$apply==1){
			echo $html->link('友達申請が来ています！',array('controller'=>'friends',
													  		'action' => 'applylist'
															)
							 ); 
		}
	?>
	</h3>
	<!--メッセージ通知-->
	<h3>
	<?php 
		if(!empty($message)&&$message==1){
			echo $html->link('新着メッセージがあります！',array('controller'=>'messages',
													  			'action' => 'box'
																)
							 ); 
		}
	?></h3>

	<div class ="box">

		<div class="pic">
	
		<a href="http://localhost/cake/users/pic_edit">	
		<img src="/cake/img/pics/<?php echo $data['User']['pic']; ?>" alt="<?php echo $data['User']['username']; ?>" title="プロフィール画像の変更"width="128" height="128"></a>
		</div>

		<div class ="name">名前：<?php echo $data['User']['username']; ?></div>

		自己紹介<br><div class ="intro"><?php $res = str_replace("\n","<br>",$data['Profile']['intro']);
											echo  $res; ?></div>

		<div class ="place">場所：<?php echo $data['Profile']['place']; ?></div>

		<div class ="link">リンク：<a href ="<?php echo $data['Profile']['link']; ?>"><?php echo $data['Profile']['link']; ?></a></div>

	</div>	
</div>

<?php echo $this->element('footer'); ?>
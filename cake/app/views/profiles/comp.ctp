<?php echo $this->element('header'); ?>
<?php echo $this->element('side'); ?>

<div class ="content">
	自己紹介<br><div class ="intro"><?php $res = str_replace("\n","<br>",$data['Profile']['intro']);
											echo  $res; ?></div>
	場所：<?php echo $data['Profile']['place'];?></br>
	ホームページ：<?php echo $data['Profile']['link'];?></br>

	<h4>編集完了しました！</h4></br>

	<?php echo $html->link('マイページに戻る', '/profiles/mypage'); ?>
</div>

<?php echo $this->element('footer'); ?>
<?php echo $this->element('header'); ?>
<?php echo $this->element('side'); ?>
<?php echo $html->css('profile_check');?>
<div class ="content">

	<div class="conf">以下の内容でよろしいですか？<br></div>
	自己紹介<br><div class ="intro"><?php $res = str_replace("\n","<br>",$data['intro']);
											echo  $res; ?></div>
	場所：<?php echo $data['place'];?><br>
	ホームページ：<?php echo $data['link'];?><br>

	<?php echo $this->Form->create('User', array('url' => 'resist'));?>

	<div class="edit"><?php echo $this->Form->end('編集する'); ?></div>

</div>
<?php echo $this->element('footer'); ?>
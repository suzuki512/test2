<?php echo $this->element('header'); ?>
<?php echo $this->element('side'); ?>
<?php echo $html->css('user_pic_edit');?>

<div class="content">


		
	<img src="/cake/img/pics/<?php echo $data['User']['pic']; ?>" alt="<?php echo $data['User']['username']; ?>" wi		dth="128" height="128"><br>

	<?php echo $this->Form->create('',array('type'=>'file','action'=>'pic_add'));?>
	<?php echo $this->Form->file('pic');?>
	<?php echo $this->Form->end('登録');?>
        

	<div class="del"><?php echo $html->link("削除する",array('action'=>'pic_del'));?><br></div>
	
	<?php echo $html->link('戻る','/profiles/mypage');?>
</div>
<?php echo $this->element('footer'); ?>
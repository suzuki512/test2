<?php echo $this->element('header'); ?>
<?php echo $this->element('side'); ?>
<?php echo $html->css('message_edit');?>

<div class ="content">

	<div class ="pic">

	<img src='/cake/img/pics/<?php echo $recipient['User']['pic'];?>' alt='プロフィール写真' width="128" height="128">
	</div>

	<div class ="name">
	<?php echo $recipient['User']['username']; ?>
	</div>

	<?php echo $form->create(null,array('action'=>'resist')); 
	 	  echo $form->textarea('body',array('label' =>'本文','cols'=>40,'rows'=>10));
     	  echo $form->end('送信'); 
	?>

</div>
<?php echo $this->element('footer'); ?>

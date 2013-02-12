
<?php echo $this->element('header'); ?>
<?php echo $this->element('side'); ?>
<?php echo $this->Html->css('board_edit');?>
<div class = "content">
	<div class = "box">
		<label>タイトル</label>
		<form action="../../cake/boards/insert" method="post"/>
		<?php echo $form->textarea('title',array('label' =>'本文','cols'=>40,'rows'=>1));?>
		<?php echo $form->error('Board.title');?>
		<label>本文</label>

		<?php echo $form->textarea('body',array('label' =>'本文','cols'=>40,'rows'=>10));?><?php echo $form->error('body'); ?>
		<button type ="submit"/>投稿する</button>
		</form>
	</div>
</div>
<?php echo $this->element('footer'); ?>

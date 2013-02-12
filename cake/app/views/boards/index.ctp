<?php echo $this->element('header'); ?>
<?php echo $this->Html->css('board_index');?>
<?php foreach ($data as $v): ?>
  
<div class="part">

	<div class="pic">
	
		<img src="/cake/img/pics/<?php echo $v['User']['pic']; ?>" alt="<?php echo $v['User']['username']; ?>" width="128" height="128"><!--画像-->
	</div>		

	<div class="title">
		<a href  = http://localhost/cake/boards/detail/<?php echo $v['Board']['id'];?>>
		<?php echo $v['Board']['title']; ?></a><!--タイトル-->
	</div>


	<div class="name">    
		<a href  =http://localhost/cake/profiles/index/<?php echo $v['User']['id'];?>>
		<?php echo $v['User']['username']?></a>さん<!--名前-->
	</div>


	<div class ="date"><?php echo $v['Board']['date']; ?><!--日付--></div> 
		
	<div class="body"><?php echo mb_strimwidth($v['Board']['body'],0,140,".....","utf-8");?><!--本文--></div>


</div>
<?php endforeach; ?>

	<div class="clear"><?php if(isset($error)&&$error==true){ echo"該当する投稿はありません";}?></div>
	<div class="text">
		<?php echo $this->Paginator->next('<<前の5件へ');?>
		<?php echo $this->Paginator->prev('次の5件へ>>');?>
	</div>
</div>
<?php echo $this->element('footer'); ?>
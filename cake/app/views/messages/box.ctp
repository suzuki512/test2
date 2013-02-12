<?php echo $this->element('header'); ?>
<?php echo $this->element('side'); ?>
<?php echo $html->css('message_box');?>

<div class ="content">

	<?php foreach ($Message as $v):?>
	<div class ="box">
		
		<div class ="pic">
	
		<img src="/cake/img/pics/<?php echo $v['Sender']['pic']; ?>" alt="<?php echo $v['Sender']['username']; ?>" width="128" height="128">
		</div>

		<div class ="name">
		<a href  = http://localhost/cake/profiles/index/<?php echo $v['Sender']['id'];?>/><?php echo $v['Sender']['username']; ?></a>
		</div>

		<div class ="body">
		<?php 
			$res = str_replace("\n","<br>",$v['Message']['body']);
			echo  $res; 
		?>
		</div>

		<div class ="date">
		<?php echo $v['Message']['date']; ?>
		</div>



	</div>
	<?php endforeach;?>

	<div class="text">
		<?php echo $this->Paginator->next('<<前の5件へ');?>
		<?php echo $this->Paginator->prev('次の5件へ>>');?>
	</div>

</div>
<?php echo $this->element('footer'); ?>
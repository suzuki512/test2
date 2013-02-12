<?php echo $this->element('header'); ?>
<?php echo $this->element('side'); ?>
<?php echo $html->css('friend_friendlist');?>
<div class ="content">

	<?php foreach ($friends as $v):?>
	<div class ="box">

		<div class="pic">
		
		<img src ="/cake/img/pics/<?php echo $v['Recieve_friend']['pic'];?>" alt ="<?php echo $v['Recieve_friend']['username'];?>" width= "128" height="128">
		</div>

		<div class="name">
		<a href ="/cake/profiles/index/<?php echo $v['Recieve_friend']['id'];?>"><?php echo $v['Recieve_friend']['username'];?></a>
		</div>

		<div class="button">
		<?php
			echo $form->create('Recieve_friend',array('url'=>
											  array('controller'=>'friends',
													'action'=>'delete',$v['Friend']['id']
													)
				     						  ));
			
			$msg = __('友達解除しますか？', true);
			echo $form->submit(__('解除する', true), array('name'=>'hoge','onClick'=>"return confirm('$msg')"));
			echo $form->end();

		?>
		</div>

	</div>
	<?php endforeach;?>
	
</div>
<?php echo $this->element('footer'); ?>
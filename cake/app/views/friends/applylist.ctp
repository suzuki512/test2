<?php echo $this->element('header'); ?>
<?php echo $this->element('side'); ?>
<?php echo $html->css('friend_friendlist');?>
<div class ="content">		
	<?php foreach ($apply as $v):?>
	<div class="box">

		<div class="pic">
		
			<img src ="/cake/img/pics/<?php echo $v['Send_friend']['pic'];?>" alt ="<?php echo $v['Send_friend']['username'];?>" width="128" height="128">
		</div>
		
		<div class="name">
			<a href ="/cake/profiles/index/<?php echo $v['Friend']['id'];?>"><?php echo $v['Send_friend']['username'];?></a>
		</div>
		
		<form action="/cake/friends/accept/<?php echo $v['Friend']['id'];?>">
			<input type="submit" value="承認する">
		</form>
		<?php
			echo $form->create('Friend',array('url'=>
											  array('controller'=>'friends',
													'action'=>'delete',$v['Friend']['id']
													)
				     						  ));
			
			$msg = __('拒否しますか？', true);
			echo $form->submit(__('拒否する', true), array('name'=>'hoge','onClick'=>"return confirm('$msg')"));
			echo $form->end();

		?>
	</div>

	<?php endforeach;?>

</div>
<?php echo $this->element('footer'); ?>
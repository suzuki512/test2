<?php echo $this->element('header'); ?>
<?php echo $html->css('board_index');?>

	<div class="part">
		<div class="pic">
		
			<img src="/cake/img/pics/<?php echo $data['User']['pic']; ?>" alt="<?php echo $data['User']['username']; ?>" width="128" height="128"><!--画像-->
		</div>		

		<div class="title">
	
			<?php echo $data['Board']['title']; ?></a><br><!--タイトル-->
		</div>


		<div class="name">    
			<a href  =http://localhost/cake/profiles/index/<?php echo $data['User']['id'];?>><br>
			<?php echo $data['User']['username']?></a>さん<br><!--名前-->
		</div>


		<div class ="date"><?php echo $data['Board']['date']; ?><br><!--日付--></div> 
			
		<div class="body">
		<?php 
			$res = str_replace("\n","<br>",$data['Board']['body']);
			echo  $res; ?><!--本文-->
		</div>

		<?php
			if($data['Board']['user_id']==$userinfo['User']['id']){
				echo $form->create('Board',array('url'=>
									array(
									'controller'=>'boards',
									'action'=>'delete',$data['Board']['id']
									)
					     ));
				
				$msg = __('削除しますか？', true);
				echo $form->submit(__('削除する', true), array('name'=>'hoge','onClick'=>"return confirm('$msg')"));
				echo $form->end();
			}
		?>



	</div>

	<div class="clear"><?php if(isset($error)&&$error==true){ echo"該当する投稿はありません";}?></br></div>




<?php echo $this->element('footer'); ?>
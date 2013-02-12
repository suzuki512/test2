
<?php echo $this->element('header'); ?>
<?php echo $html->css('profile_index'); ?>

<h2>プロフィール</h2>


<div class="pic">

	<img src='/cake/img/pics/<?php echo $profile['User']['pic'];?>' alt='プロフィール写真' width="128" height="128">
</div>
<div class ="box">	
	<div class ="name">名前：<?php echo $profile['User']['username']; ?></div>


	自己紹介：	<div class ="intro"><?php 
			   	$res = str_replace("\n","<br>",$profile['Profile']['intro']);
				echo  $res; ?>
	</div>

	<div class ="place">場所：<?php echo $profile['Profile']['place']; ?></div>

	<div class ="link">	リンク：<a href ="<?php echo $profile['Profile']['link']; ?>"><?php echo $profile['Profile']['link']; ?></a></div>

	<?php 
		if($userinfo['User']['id']!==$profile['Profile']['user_id']){
			echo $html->link('メッセージを送る', array(
			    									  'controller'=>'message',
													  'action' => 'edit',
			    									  $profile['Profile']['user_id']
													  )
							);
		} 
	?><br>


	<?php 
		if(!empty($userinfo)&&$userinfo['User']['id']!==$profile['Profile']['user_id']&&$states==0){
			//ログイン中かつ本人ではないかつ友達でない
			echo $form->create('Friend',array('url'=>
											array('controller'=>'friends',
												  'action'=>'apply',$profile['Profile']['user_id']
												  )
											  )
								);
			$msg = __('申請しますか？', true);
			echo $form->submit(__('友達申請する', true), array('name'=>'hoge', 'onClick'=>"return confirm('$msg')"));
			echo $form->end();
		}	
	

		if(!empty($userinfo)&&$userinfo['User']['id']!==$profile['Profile']['user_id']&&$states==1){
			echo "友達<br>";
		}
		if(!empty($userinfo)&&$userinfo['User']['id']!==$profile['Profile']['user_id']&&$states==2){
			echo "友達申請済み<br>";
		}
		if(!empty($userinfo)&&$userinfo['User']['id']!==$profile['Profile']['user_id']&&$states==3){
			echo "友達申請がきています<br>";
		}
		echo $html->link('戻る','/boards');
	?>
</div>

<?php echo $this->element('footer'); ?>

<?php echo $this->element('header'); ?>
<?php echo $html->css('user_login');?>
<h2>ログイン</h2>

<div class = "box">
	<?php
		echo $form->create('User', array('action' => 'login'));
		echo $form->input('username',array('label'=>'ユーザ名'));
		echo $form->input('password',array('label'=>'パスワード'));
		echo $form->end('Login');
	?>


	<div class= "link"><?php echo $html->link("新規登録",'/users/add');?></div>
</div>
<?php echo $this->element('footer'); ?>
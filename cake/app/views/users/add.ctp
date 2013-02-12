<?php echo $this->element('header'); ?>

<?php echo $html->css('user_add');?>

<h2>新規会員登録</h2>

<div class = "box">

	<?php
		echo $form->create('User', array('url' => 'add'));
		echo $form->input('username',array('label'=>'ユーザ名'));
		echo $form->input('password',array('label'=>'パスワード'));
		echo $form->input('email',array('label'=>'メールアドレス'));
		echo $form->end('新規ユーザを作成する');
	?>

	<div class="link"><?php echo $html->link('ログイン','/users/login'); ?></div>
</div>
<?php echo $this->element('footer'); ?>
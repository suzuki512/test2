<?php echo $this->element('header'); ?>
<?php echo $this->element('side'); ?>
<?php echo $html->css('profile_edit'); ?>


<div class ="content">

	<div class = "box">

	<form action="../../cake/profiles/check" method="post">
	
	<label>自己紹介</label>
		<textarea name="intro" id="body" rows="10" cols="40" ><?php echo $data['Profile']['intro'];?></textarea>
	
	<label>場所</label>
		<input type="text" name="place" size="40" value="<?php echo $data['Profile']['place'];?>"/>

	<label>ホームページ	</label>
		<input type="text" name="link" size="40" value="<?php echo $data['Profile']['link'];?>"/>
		
	<button type ="submit"/>編集する</button>
	
	</form>

	<div class="back"><?php echo $html->link('戻る','mypage');?></div>

	</div>
</div>
<?php echo $this->element('footer');?>
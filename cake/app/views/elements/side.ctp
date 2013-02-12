
<!--サイドバー-->
<div id ="side">
	<ul>
		<li><?php echo $html->link('プロフィールを編集する','/profiles/edit'); ?></li>
		<li><?php echo $html->link('メッセージbox','/messages/box'); ?></li>
		<li><?php echo $html->link('メッセージ送信履歴','/messages/sent'); ?></li>
		<li><?php echo $html->link('投稿履歴','/boards/history');?></li>
		<li><?php echo $html->link('友達一覧','/friends/friendlist');?></li>
	</ul>
</div>
<div class ="index"><?php echo $side_index;?></div>
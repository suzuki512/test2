<?php
class board extends AppModel {

	public $primaryKey = 'id'; 
	public $belongsTo = array('User');
	//バリデーションの設定
	public $validate= array(
			'title'=>array(
		        	'rule'=>'notEmpty',
					'message'=>'※タイトルを入力して下さい。'
					),
								  
			

			'body'=>array(
					'rule'=>'notEmpty',
					'message'=>'※本文を入力して下さい。'
					 ),

			'search'=>array(
					'rule'=>'notEmpty'
					)
			);		

	function savePost($uid,$t,$b){//投稿保存
		$post=array(
					'id'=>null,
					'user_id'=>$uid,
					'date'=>date('Y-m-d H:i:s'),
					'title'=>$t,
					'body'=>$b
					);
		 $this->save($post);
	}	

	function deleteBoard($v,$uid){
		$c=$this->findById($v);
		if($c['Board']['user_id']==$uid){//ログイン中のユーザーかチェック
			$this->delete($v);
		}
	}		
}
      

?>
<?php
class Friend extends AppModel {

	public $primaryKey = 'id'; 
	public $belongsTo = array(
        'Send_friend' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
    	'Recieve_friend' => array(
            'className' =>'User',
            'foreignKey' => 'friend_user_id'
        )
	);
	function getProfileIndex($v,$uid){
//友達判定
		$a=$this->find('first', array(//自分から申請しているかチェック
							'conditions' => array(
			    				'user_id' =>$uid,
			    				'friend_user_id'=>$v
		    					)
							)
		 				);

		$b=$this->find('first', array(//相手から申請しているかチェック
		  					'conditions' => array(
			    				'user_id' =>$v,
			    				'friend_user_id'=>$uid
		    					)	
							)
		  			 	);
	
		if($a['Friend']['condition']==1||$b['Friend']['condition']==1){//友達
			return	$states=1;
		}
		if($a['Friend']['condition']=='0'){//友達申請済み
			return	$states=2;
		}
		if($b['Friend']['condition']=='0'){//友達申請が来ている
			return	$states=3;
		}
		if(empty($a)&&empty($b)){	//友達でない
			return	$states=0;
		}

	
	}

	function getFriend($uid){
		return $this->find('all',array('conditions'=>array(
									'AND'=>array(
										'user_id'=>$uid,
										'condition'=>'1'
									 	)
							 		)
								));
	}		
	
	function getFriendApply($uid){      //友達申請を通知
		$states=$this->find('first',array(
		  						'conditions' => array(
						    		'friend_user_id' =>$uid,
						    		'condition'=>0
		    						)
								)
							);
		
		if(!empty($states)){
			return	$apply=1;	
		}	
	}

	function applyFriend($v,$uid){//友達申請処理
		$a=array(
				'id'=>null,
				'user_id'=>$uid,
				'friend_user_id'=>$v,
				'condition'=>'0',		
				'date'=>date('Y-m-d H:i:s')
				);		
		$this->save($a);
	}		

	function acceptFriend($v,$uid){//友達承認処理
		$condition['condition']=1;
		$check=$this->findById($v);
		if($check['Friend']['friend_user_id']==$uid){//ログイン中のユーザーかチェック
			$this->id = $v;
			$this->save($condition);
			$friend=$this->findById($v);
			$a=array(//送り手と受け手を入れ替えた行を作成
					'id'=>null,
					'user_id'=>$uid,
					'friend_user_id'=>$friend['Friend']['user_id'],
					'condition'=>'1',		
					'date'=>date('Y-m-d H:i:s')
					);		
			$this->save($a);
		}
	}		

	function deleteFriend($v,$uid){
		$f=$this->findById($v);
	//友達解除処理
		if($f['Friend']['user_id']==$uid){//ログイン中のユーザーかチェック
			$f_2=$this->find('first',array('conditions'=>array(//送り手と受け手を入れ替えた行を探す
										'and'=>array(
											'user_id'=>$f['Friend']['friend_user_id'],
											'friend_user_id'=>$uid
											)
										)
									));
			$this->deleteAll(array('Friend.id'=>array($v,$f_2['Friend']['id'])));//2行とも削除
	
		}
	//友達拒否処理
		if($f['Friend']['friend_user_id']==$uid){//ログイン中のユーザーかチェック
			$this->delete($v);
		}
		
	}			

	function applyFriendList($uid){//申請一覧
		$apply=$this->find('all',array(
		  						'conditions' => array(
						   			'friend_user_id' =>$uid,
						    		'condition'=>0,
									)
								)
							  );
		return $apply;
	}
}
      

?>
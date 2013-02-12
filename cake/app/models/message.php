<?php

class Message extends AppModel {
	public $primaryKey = 'id'; 
	
	public $belongsTo = array(
	        'Sender' => array(
	            'className' => 'User',
	            'foreignKey' => 'user_id'
	        	),
	        'Recipient' => array(
	            'className' => 'User',
	            'foreignKey' => 'recipient_user_id'
	        	)
	    	);
	 public $validate = array(
  			'body'=>array(
      			'rule'=>'notEmpty',
      			'message'=>'本文を入力してください。'
    			)
			);

	function getNewMessage($uid){
		$states2=$this->find('first', array(
		  							'conditions' => array(
							    		'recipient_user_id' =>$uid,
							    		'condition'=>0
			    						)
									)
								);
		
		if(!empty($states2)){
			return	$message=1;
		}

	}

	function saveMessage($b,$r,$uid){
		$message=array(
					'date'=>date('Y-m-d H:i:s'),
					'condition'=>'0',
					'user_id'=>$uid,
					'body'=>$b,
					'recipient_user_id'=>$r
					);
		$this->save($message);
	}

	function deleteMessage($v,$uid){
		$m=$this->findById($v);
		if($m['Message']['user_id']==$uid){
			$this->delete($v);
		}
	}	

	function saveMessageCond($uid){//既読ならば1に変更
		$condition = array('AND'=>array(
								'recipient_user_id'=>$uid,
								'condition'=>0
								)
							);
						
		$updatefield = array('condition' =>'1');
		$this->updateAll($updatefield,$condition);
	}

}
      

?>
<?php
class profile extends AppModel {

	public $name ='Profile';
	public $primaryKey = 'id'; 
	public $belongsTo = array('User');
	
	function saveNewUser(){//新しいユーザーのプロフィール作成
		$profile['Profile']['user_id']=$this->User->find('count');
		$profile['Profile']['intro']='未設定';
		$profile['Profile']['place']='未設定';
		$this->save($profile);
	}

	function getProfileIndex($uid){
		return	$profile=$this->findByUserId($uid);
	}

	function saveProfile($Pro,$uid){
		$Pro['date']=date('Y-m-d H:i:s');
		$this->id = $uid;
		if($this->id){
			$this->save($Pro);
		}
	}
}
?>
<?php
	
class FriendsController extends AppController {
	var $helpers = array('Html');//ヘルパー
	var $components = array('Auth');
	var $uses=array('Friend');
	
	function beforeFilter(){
		parent::beforeFilter();
	}

	function apply($v){//友達申請
		$this->Friend->applyFriend($v,$this->getUserId());
		$this->redirect(array('action' =>'comp'));
	}
	
	function comp(){
		$side_index="Mypage";
		$this->set('side_index',$side_index);
	}
		
	function accept($v){//友達承認	
		$this->Friend->acceptFriend($v,$this->getUserId());
		$this->redirect(array('action' =>'friendlist'));
	}

	function accept_comp(){
		$side_index="Mypage";
		$this->set('side_index',$side_index);
	}

	function friendlist(){
		$uid=$this->getUserId();
		$this->set('friends',$this->Friend->getFriend($uid));
		$side_index="友達一覧";
		$this->set('side_index',$side_index);
	}

	function applylist(){//申請一覧
		$uid=$this->getUserId();
		
		$this->set('apply',$this->Friend->applyFriendList($uid));
		$side_index="申請一覧";
		$this->set('side_index',$side_index);
	}

	function delete($v){
		$this->Friend->deleteFriend($v,$this->getUserId());
		$this->redirect(array('action'=>'friendlist'));
	}

}	
?>
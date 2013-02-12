<?php
	
class ProfilesController extends AppController {

	var $helpers = array('Html');//ヘルパー
	var $components = array('Auth');
	var $uses=array('Profile','Friend','Message');
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index');
 	}

	function index($v){	
		$uid=$this->getUserId();	
		$this->Session->write('recipient_id',$v);
		$this->set('profile',$this->Profile->getProfileIndex($v));//プロフィールの取得
		$this->set('states',$this->Friend->getProfileIndex($v,$uid));//友達かどうかチェック
	}

	function mypage(){ 
		$uid=$this->getUserId();
		$this->set('data',$this->Profile->getProfileIndex($uid));//プロフィールの取得

		$this->set('apply',$this->Friend->getFriendApply($uid));//友達申請通知

		$this->set('message',$this->Message->getNewMessage($uid));//新着メッセージ通知
		$side_index="MyPage";
		$this->set('side_index',$side_index);
	}
	
	function edit(){ //プロフィール編集
		$uid=$this->getUserId();
		$this->set('data',$this->Profile->getProfileIndex($uid));
		$side_index="プロフィール編集";
		$this->set('side_index',$side_index);
	}
	
	function check(){//プロフィール編集確認画面
		$data=$this->params['form'];
		$this->Session->write('Profile',$data);	
		$this->set('data',$data); 
		$side_index="プロフィール編集";
		$this->set('side_index',$side_index);
	}


	function resist(){//保存
		$uid=$this->getUserId();
		$Pro=$this->Session->read('Profile');
		$this->Profile->saveProfile($Pro,$uid);
		$this->redirect("http://localhost/cake/profiles/comp");
	}
	
	function comp(){//プロフィール編集完了
		$this->set('data',$this->Profile->getProfileIndex($this->getUserId()));
		$side_index="プロフィール編集";
		$this->set('side_index',$side_index);
	}	
}
?>
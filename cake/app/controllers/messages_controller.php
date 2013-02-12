<?php

class MessagesController extends AppController {
      
	var $components = array('Auth');
	var $uses=array('Message','User');
	var $helpers = array('Html');
	
	function beforeFilter(){
		parent::beforeFilter();
	}

	function edit($v){//メッセージ編集画面
		$side_index="メッセージ";
		$recipient=$this->User->findById($v);
		$this->Session->write('recipient',$recipient);
		$this->set('recipient',$recipient);
		$this->set('side_index',$side_index);
	}

	function resist(){//保存
		$b=$this->data['Message']['body'];
		$ref=$this->Session->read('recipient.User.id');
	
		if (!empty($b)){
			$this->Message->saveMessage($b,$ref,$this->getUserId());
			$this->redirect(array('action' => 'comp'));	
		}
		else{
			$this->redirect(array('action' => 'edit',$ref));
		}
	}
	
	function comp(){//メッセージ送信完了画面
		$side_index="メッセージ";
		$this->set('side_index',$side_index);
	}

	function box(){//メッセージbox
		$uid=$this->getUserId();
		$r="recipient_user_id";
		$this->set('Message',$this->pagingById($this->modelNames['0'],$uid,$r));
		$side_index="メッセージbox";
		$this->set('side_index',$side_index);

	//boxにアクセスしたらconditionを１に変更
		$this->Message->saveMessageCond($uid);
	}

	function sent(){//メッセージ送信履歴
		$uid=$this->getUserId();
		$r="user_id";
		$this->set('Message',$this->pagingById($this->modelNames['0'],$uid,$r));
		$side_index="メッセージ送信履歴";
		$this->set('side_index',$side_index);
	}
	
	function delete($v){//削除
		$this->Message->deleteMessage($v,$this->getUserId());
		$this->redirect(array('action'=>'sent'));
	}
	
}
?>
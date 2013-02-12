<?php
class UsersController extends AppController{
	public $uses=array('User','Profile');


	function beforeFilter(){
//親クラスのbeforeFilterの読み込み
		parent::beforeFilter();
		//認証不要のページの指定
		$this->Auth->allow('login','add','logout'); 
		
		if (isset($this->Auth)) {
            $this->Auth->authenticate = $this->NoHash;
        }
	}

	function login(){
	}
	

	//ログアウトアクション（認証が不要なページ）
	function logout(){
		if($this->Auth->logout()) {
			//Auth指定のログインページへ移動
			return $this->redirect($this->Auth->redirect());
		}
    }
	


	
	function add(){
	//ユーザーの作成
	
		$this->User->create();
			
			//リクエストデータを保存できたら
		if ($this->User->save($this->data)) {
			$this->User->saveNewUser();
			$this->Profile->saveNewUser();//新しいユーザーのプロフィール作成
			$this->redirect($this->Auth->redirect());
		} 
	}
		
	function pic_edit(){//画像編集画面	
		$uid=$this->getUserId();
		$this->set('data',$this->User->getUserPic($uid));	
		$side_index="プロフィール画像の登録・変更・削除";
		$this->set('side_index',$side_index);
  	}
		
	function pic_add(){//画像保存
		if($this->data['User']['pic']){
			$v=$this->data['User']['pic'];
			$tmp_file = $v['tmp_name'];
			$user_id=$this->getUserId();
			$this->User->addUserPic($v,$tmp_file,$user_id);
			$this->redirect("pic_edit");
		}
		else{
			$this->redirect("pic_edit");
		}
	}

	function pic_del(){//画像削除
		$this->User->deleteUserPic($this->getUserId());
		$this->redirect("pic_edit");
	}
	

}
?>
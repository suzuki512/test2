<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array('Session',
							
							   'Auth' => 
							 			array(
	 									//ログイン後の移動先
	 									'loginRedirect' => array('controller' => 'boards', 'action' => 'index'),
	 									//ログアウ後の移動先
	 									'logoutRedirect' => array('controller' => 'users', 'action' => 'logout'),
	 									//ログインページのパス
	 									'loginAction' => array('controller' => 'users', 'action' => 'login'),
	 									//未ログイン時のメッセージ
	 									'authError' => 'ログインして下さい。',

										//未ログイン時のメッセージ
	 									'loginError' => 'あなたのお名前とパスワードを入力して下さい。',
										
								
	 									),
								'NoHash'//ハッシュ化無効のコンポーネント
								
	 					);
	

	function beforeFilter(){
		$userinfo=$this->Auth->user();
		$uid=$userinfo['User']['id'];
		$this->set('userinfo',$userinfo);
		$this->autoLayout=false;

	}

	function getUserId(){//ログイン中のuserのid 取得
		$userinfo=$this->Auth->user();
	    return $userinfo['User']['id'];
	}

	function pagingById($m,$uid,$r){//ページネーションの設定
	
		$this->paginate=array("$m" =>array(
	    							'conditions' => array("$m.$r LIKE" => "%{$uid}%"),
	    							'limit'=>5,
									'order' =>array("$m.id" => 'desc')
								)
							);
		$a=$this->paginate("$m");
		return $a;
		
	}
		
		
}


?>
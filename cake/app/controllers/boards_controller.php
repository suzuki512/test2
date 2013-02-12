<?php


class BoardsController extends AppController {//ああああああああaaaaaaaaaaaaaaiooo

	public $scaffold;
	public $uses=array('Board','Friend');
	public $helpers = array('Html');//ヘルパー
	public $components = array('Auth');
	function beforeFilter(){
		parent::beforeFilter();	 //親クラスのbeforeFilterの読み込み
		$this->Auth->allow('index','detail','search'); 
	}

	function index(){
		$uid="";
		$r="user_id";
		$this->set("data",$this->pagingById($this->modelNames['0'],$uid,$r));
	}
	
	function search(){  
		if(!empty($this->data['Board']['search'])){
			$this->paginate=array('Board' =>array(
    								'conditions' =>array(
										'OR'=>array(
											"Board.body LIKE" => "%{$this->data['Board']['search']}%",
											"Board.title LIKE" => "%{$this->data['Board']['search']}%"
										)
									),
    								'limit'=>5,
									'order' =>array('Board.id' => 'desc')
									)
								  );
		
			$data=$this->paginate('Board');
			$this->set('data',$data);
		}
		if(empty($this->data['Board']['search'])){
			$this->redirect("http://localhost/cake/boards/");
		}
	}

	function edit(){
		$side_index="投稿";
		$this->set('side_index',$side_index);
	}
	
	function insert(){
		if(!empty($this->data['title'])&&!empty($this->data['body'])){
			$t=$this->data['title'];
			$b=$this->data['body'];
			$this->Board->savePost($this->getUserId(),$t,$b);
			$this->redirect("http://localhost/cake/boards/");
 		}
		else{
			$this->redirect("http://localhost/cake/boards/edit");
	 	}
	}
 		
	
	function history(){
		$uid=$this->getUserId();
		$r="user_id";
		$this->set('data',$this->pagingById($this->modelNames['0'],$uid,$r));
		$side_index="投稿履歴";
		$this->set('side_index',$side_index);
	}

	function delete($v){
		$this->Board->deleteBoard($v,$this->getUserId());
		$this->redirect(array('action'=>'history'));
	}

	function detail($v){
		$data=$this->Board->findByid($v);
		$this->set('data',$data);
	}

}
?>
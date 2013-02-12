<?php
class User extends AppModel{
	
	public $primaryKey = 'id'; 
	public $hasOne ="Profile";
	
	//バリデーションの設定
	public $validate= array(
		
			'username'=>array(
				array('rule'=>'notEmpty',
				      'message'=>'※ユーザー名を入力して下さい。'
					  ),
				
				array('rule' => 'isUnique',
                      'message' => '※このユーザー名は既に登録されています'
                	  )
			),						  
			

			'email'=>array(
				array('rule'=>'notEmpty',
					  'message'=>'※メールアドレスを入力して下さい'
					  ),

				array('rule' => 'email',
                      'message' => '※メールアドレスを入力して下さい'
                	  )
			),
					
			'password'=>array(
		        		'rule'=>'notEmpty',
						'message'=>'※パスワードを入力して下さい。'
						)
			);
	function saveNewUser(){
		$data['User']['pic']='nophoto.jpg';
		$this->save($data);
		
	}
	
	function getUserPic($uid){
		$data=$this->findById($uid);
		return $data;
	}
	
	function addUserPic($v,$tmp_file,$uid){
		$imginfo = getimagesize($tmp_file);	    //画像の大きさを取得する
	    clearstatcache();						//キャッシュクリア
	            
	     //3000KB、JPEG・GIF・PNG以外ならエラー
	    if (filesize($tmp_file)>3000000 || ($imginfo[2] < 1 || $imginfo[2] > 3)) { 
			$this->set('file_error',true); return false; 
		}
	            
		$upload_path = WWW_ROOT . "/img/pics" . DS;//アップロード場所
	    $width_old  = $imginfo[0];
	    $height_old = $imginfo[1];
	    $width_new  =128;
	    $height_new =128;

	    switch ($imginfo[2]) {	
	    	case 2: // jpeg
	        	$filename =$uid.".jpg";
	            $jpeg = imagecreatefromjpeg($tmp_file);		//	 新しい画像を作成する
	            $jpeg_new = imagecreatetruecolor($width_new, $height_new);
	            imagecopyresampled($jpeg_new,$jpeg,0,0,0,0,$width_new,$height_new,$width_old,$height_old);//再サンプリング
	            imagejpeg($jpeg_new, $upload_path . $filename, 80);//出力
				break;
	                
			case 1: // gif
	            $filename =$user_id.".gif";
	            $gif = imagecreatefromgif($tmp_file);
	            $gif_new = imagecreatetruecolor($width_new, $height_new);
	            imagecopyresampled($gif_new,$gif,0,0,0,0,$width_new,$height_new,$width_old,$height_old);
	            imagegif($gif_new, $upload_path . $filename, 80);
	            break;
	                
			case 3: // png
	            $filename =$user_id.".png";
	            $png = imagecreatefrompng($tmp_file);
	            $png_new = imagecreatetruecolor($width_new, $height_new);
	            imagecopyresampled($png_new,$png,0,0,0,0,$width_new,$height_new,$width_old,$height_old);
	            imagepng($png_new, $upload_path . $filename, 80);
	            break;
	           
	    }
	    $User['pic'] = $filename;
	// [update]のため[id]を指定

	$this->id=$user_id;
	if($this->id){
		$this->save($User);
	}
}
	
	function deleteUserPic($uid){//画像削除
		$this->id=$uid;
		$User['pic']="nophoto.jpg";
		if($this->id){
			$this->save($User);
		}
	}

}
?>
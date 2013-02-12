<?php
App::uses('FormAuthenticate', 'Controller/Component/Auth');

class MyFormAuthenticate extends FormAuthenticate {

protected function _password($password){
return $password;
}

}
?>
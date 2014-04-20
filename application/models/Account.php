<?php

class Application_Model_Account
{

	public function newAccount($data)
	{
		try{
			$user = new Application_Model_DbTable_User();
			$data['date'] = new Zend_Db_Expr('NOW()');
			$data['password'] = sha1($data['password']);
			$userNew = $user->createRow($data);
			return $userNew->save();
		}catch(Zend_Exception $e) {
			echo $e->getMessage();
		}
	}

}


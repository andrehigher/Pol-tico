<?php

class Application_Model_Auth
{

	public function login($data)
	{
		$dbAdapter = Zend_Db_Table::getDefaultAdapter();
		$authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
		$authAdapter->setTableName('user')
					->setIdentityColumn('email')
					->setCredentialColumn('password')
					->setCredentialTreatment('SHA1(?)');
		$authAdapter->setIdentity($data['email'])
					->setCredential($data['password']);
		$auth = Zend_Auth::getInstance();
		$result = $auth->authenticate($authAdapter);
		if ( $result->isValid() ) 
		{
			$info = $authAdapter->getResultRowObject(null, 'password');
			$authNamespace = new Zend_Session_Namespace('userInformation');
			$authNamespace->email = $info->username;
			$authNamespace->user_id = $info->id;
			return true;
		}
		else
		{
			return false;
		}
	}

}


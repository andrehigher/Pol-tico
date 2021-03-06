<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	/**
	 *
	 * Initiate the database connection and register in the variable $db for
	 * utilize that when it convenients.
	 *
	 * @access protected
	 * @return null
	 */
	protected function _initConnection()
	{
		$options    = $this->getOption('resources');
		$db_adapter = $options['db']['adapter'];
		$params     = $options['db']['params'];
		try
		{
			$db = Zend_Db::factory($db_adapter, $params);
			$db->getConnection();
			$registry = Zend_Registry::getInstance();
			$registry->set('db', $db);
		}
		catch( Zend_Exception $e)
		{
			echo "Estamos sem conexão com o banco de dados. Por favor, contacte o administrador.";
			exit;
		}
	}

	/**
	 *
	 * Load Acl to load all of permissions.
	 *
	 * @access protected
	 * @return null
	 */
	protected function _initAcl()
	{
		$aclSetup = new Application_Acl_Setup();
		$allow = new Application_Plugin_Auth();
	}


}


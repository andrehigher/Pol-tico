<?php

class RegisterController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
      $this->_helper->layout()->setLayout('ajax');
     	if ( $this->getRequest()->isPost() ) 
      {
        $data = $this->getRequest()->getPost();
        $account = new Application_Model_Account();
        if($data['password'] == $data['confirm_password'])
        {
        	if($account->newAccount($data))
        	{
        		$this->_redirect('/auth/login');
        	}
        }
      }
    }


}


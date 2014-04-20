<?php

class AuthController extends Zend_Controller_Action
{

    public function init()
    {
      $this->_helper->layout()->setLayout('ajax');
    }

    public function indexAction()
    {
        // action body
    }

    public function loginAction()
    {
     	if ( $this->getRequest()->isPost() ) 
      {
        $data = $this->getRequest()->getPost();
        $auth = new Application_Model_Auth();
        if($auth->login($data))
        {
            $this->_redirect('/dashboard');
        }
        else
        {
            $this->view->error = true;
        }
      }
    }

    public function logoutAction()
    {
      $auth = Zend_Auth::getInstance();
      $auth->clearIdentity();
      session_destroy();
      return $this->_redirect('/index');
    }


}






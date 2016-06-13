<?php

// File: /app/Controller/HomesController.php
class HomeController extends AppController {
    public $helpers = array('Html', 'Form');
    public $controllers = array('Flash');

    public function index() {
    }
    
    public function isAuthorized($user) {
        if (in_array($this->action, array('edit', 'add', 'delete'))) {
            if ($user['role']==='admin') {
                return true;
            }else {
                $this->Flash->error(__("you can't create, delete or edit it."));
                return $this->redirect(array('action' => 'index'));
            }
        }

        return parent::isAuthorized($user);
    }
}
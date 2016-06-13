<?php

// File: /app/Controller/NewsitemsController.php
class NewsitemsController extends AppController {
    public $helpers = array('Html', 'Form');
    public $controllers = array('Flash');
    public $components = array('RequestHandler');

/*  --------------------------------------------------------------------------------------------------------------
    -                                       BASE FUNCTIONS                                                       -
    --------------------------------------------------------------------------------------------------------------    */
    
    public function index() {
        $newsitems = $this->paginate();
        if ($this->request->is('requested')) {
            return $newsitems;
        }
        $this->set('newsitems', $newsitems);
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid newsitem'));
        }

        $newsitem = $this->Newsitem->findById($id);
        if (!$newsitem) {
            throw new NotFoundException(__('Invalid newsitem'));
        }
        $this->set('newsitem', $newsitem);
    }
    
    public function add(){
        if ($this->request->is('post')) {
            $this->Newsitem->create();
            if(!empty($this->data)){
                //Check if image has been uploaded
                $this->addimage();
            }
            if ($this->Newsitem->save($this->request->data)) {
                $this->Flash->success(__('het nieuwsbericht is succesvol toegevoegd.'));
                //return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('niet mogelijk om uw nieuwsbericht toe te voegen.'));
            }    
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid newsitem'));
        }

        $newsitem = $this->Newsitem->findById($id);
        if (!$newsitem) {
            throw new NotFoundException(__('Invalid newsitem'));
        }

        if ($this->request->is(array('newsitem', 'put'))) {
            $this->Newsitem->id = $id;
            if ($this->Newsitem->save($this->request->data)) {
                $this->Flash->success(__('Uw nieuwsbericht is succesvol aangepast.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('niet mogelijk om de nieuwsbericht aan te passen.'));
        }

        if (!$this->request->data) {
            $this->request->data = $newsitem;
        }
    }
    
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Newsitem->delete($id)) {
            $this->Flash->success(__('het nieuwsbericht met het id: $s is succesvol verwijderd', h($id)));
        } else {
            $this->Flash->error(__('het nieuwsbericht met het id: %s kan niet worden verwijderd.', h($id)));
        }

        return $this->redirect(array('action' => 'index'));
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
    
/*  --------------------------------------------------------------------------------------------------------------
    -                                     CUSTOM FUNCTIONS                                                       -
    --------------------------------------------------------------------------------------------------------------    */
    
    public function addimage(){
        if(!empty($this->data['Newsitem']['fotolink']['name'])){
            $file = $this->data['Newsitem']['fotolink']; //put the data into a var for easy use

            $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
            $arr_ext = array('jpg', 'png', 'jpeg', 'gif'); //set allowed extensions

            //only process if the extension is valid
            if(in_array($ext, $arr_ext)){
                //do the actual uploading of the file. First arg is the name, second arg is
                //where we are putting it, app/img folder
                move_uploaded_file(($file['tmp_name']), 'img/newsitem/' . $file['name']);
                //prepare the filename for database entry
                $this->request->data['Newsitem']['fotolink']=$file['name'];
            }
        }
    }
}
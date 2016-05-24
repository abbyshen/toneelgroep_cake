<?php

// File: /app/Controller/VoorstellingController.php
class VoorstellingController extends AppController {
    public $helpers = array('Html', 'Form');
    public $controllers = array('Flash');

    public function index() {
        $voorstellingen = $this->paginate();
        if ($this->request->is('requested')) {
            return $voorstellingen;
        }
        $this->set('voorstellingen', $voorstellingen);
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid voorstelling'));
        }

        $voorstelling = $this->Voorstelling->findById($id);
        if (!$voorstelling) {
            throw new NotFoundException(__('Invalid voorstelling'));
        }
        $this->set('voorstelling', $voorstelling);
    }
    
//    public function add(){
//        if ($this->request->is('post')) {
//            $this->Voorstelling->create();
//            if ($this->Voorstelling->save($this->request->data)) {
//                $this->Flash->success(__('de voorstelling is succesvol toegevoegd.'));
//                return $this->redirect(array('action' => 'index'));
//            }
//            $this->Flash->error(__('niet mogelijk om uw menuitem toe te voegen.'));
//        }else{echo $this->request->is('voorstelling');}
//    }
    
    public function add(){
        if ($this->request->is('post')) {
                $this->Voorstelling->create();
                if(!empty($this->data))
                {
                    //Check if image has been uploaded
                    if(!empty($this->data['Voorstelling']['FotoLink']['name'])){
                        $file = $this->data['Voorstelling']['FotoLink']; //put the data into a var for easy use

                        $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                        $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions

                        //only process if the extension is valid
                        if(in_array($ext, $arr_ext)){
                            //do the actual uploading of the file. First arg is the name, second arg is
                            //where we are putting it
                            move_uploaded_file($file['name'], WWW_ROOT . 'CakePHP/app/img/' /*. $file['name']*/);

                            //prepare the filename for database entry
                            $this->request->data['Voorstelling']['FotoLink']='app/img/' . $file['name'];
                        }
                    }

                    //now do the save
                    //$this->Voorstelling->save($this->data) ;
                }
                print_r($this->request->data);
                if ($this->Voorstelling->save($this->request->data)) {
                    $this->Flash->success(__('de voorstelling is succesvol toegevoegd.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    echo 'fail';
                    $this->Flash->error(__('niet mogelijk om uw menuitem toe te voegen.'));
                }
                
            }
    }


    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid voorstelling'));
        }

        $voorstelling = $this->Voorstelling->findById($id);
        if (!$voorstelling) {
            throw new NotFoundException(__('Invalid voorstelling'));
        }

        if ($this->request->is(array('voorstelling', 'put'))) {
            $this->Voorstelling->id = $id;
            if ($this->Voorstelling->save($this->request->data)) {
                $this->Flash->success(__('Uw voorstelling is succesvol aangepast.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('niet mogelijk om de voorstelling aan te passen.'));
        }

        if (!$this->request->data) {
            $this->request->data = $voorstelling;
        }
    }
    
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Voorstelling->delete($id)) {
            $this->Flash->success(__('The voorstelling with id: %s has been deleted.', h($id)));
        } else {
            $this->Flash->error(__('The voorstelling with id: %s could not be deleted.', h($id)));
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
}
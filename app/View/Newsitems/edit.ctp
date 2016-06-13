<!-- File: /app/View/voorstelling/edit.ctp -->

<h1>Voorstelling aanpassen</h1>
<?php
echo $this->Form->create('Newsitem',array('enctype'=>'multipart/form-data'));
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('fotolink', array('type' => 'file'));
echo $this->Form->end(__('Save Voorstelling'));
<!-- File: /app/View/Voorstelling/add.ctp -->

<h1>Voorstelling toevoegen</h1>
<?php
echo $this->Form->create('Voorstelling',array('enctype'=>'multipart/form-data'));
echo $this->Form->input('VoorstellingNaam');
echo $this->Form->input('VoorstellingJaar');
echo $this->Form->input('FotoLink', array('type' => 'file'));
echo $this->Form->input('KorteInhoud', array('rows' => '3'));
echo $this->Form->input('Acteurs');
echo $this->Form->input('Regie');
echo $this->Form->input('Auteur');
echo $this->Form->end(__('Save Voorstelling'));
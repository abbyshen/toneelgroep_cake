<!-- File: /app/View/Voorstellings/add.ctp -->

<h1>Voorstelling toevoegen</h1>
<?php
echo $this->Form->create('Menu');
echo $this->Form->input('voorstellingsnaam');
echo $this->Form->input('voorstellingsjaar');
echo $this->Form->input('korteinhoud');
echo $this->Form->input('acteurs');
echo $this->Form->input('regie');
echo $this->Form->input('auteur');
echo $this->Form->end(__('Save Menu'));

<?php
  $voorstellingen = $this->requestAction(
    'voorstelling/index/sort:VoorstellingsJaar/direction:dsc/limit:6'
  );
?>

<?php foreach ($voorstellingen as $voorstelling): ?>
    <?php echo $this->Html->image('voorstelling/' . $voorstelling['Voorstelling']['FotoLink'], array(
        'url' => array('controller' => 'voorstelling', 'action' => 'view',$voorstelling['Voorstelling']['id']),
        'class' => 'homeaffiche'))?>
    <h2><?php print($voorstelling['Voorstelling']['VoorstellingNaam']); ?></h2>
<?php endforeach; 
echo $this->Html->link('klik hier voor alle voorstellingen','../voorstelling');
?>
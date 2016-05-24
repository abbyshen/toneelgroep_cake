<!-- File: /app/View/Voorstelling/view.ctp -->

<h1><?php echo ($voorstelling['Voorstelling']['VoorstellingNaam']); ?></h1>
<div>
    <?php echo $this->Html->image($voorstelling['Voorstelling']['FotoLink'])?>
    <p><?php echo ($voorstelling['Voorstelling']['FotoLink']); ?></p>
</div>
<p><?php echo ($voorstelling['Voorstelling']['KorteInhoud']); ?></p>
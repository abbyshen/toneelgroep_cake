<!-- File: /app/View/Voorstelling/view.ctp -->

<h1><?php echo ($voorstelling['Voorstelling']['VoorstellingNaam']); ?></h1>
<div>
    <?php echo $this->Html->image('voorstelling/' . $voorstelling['Voorstelling']['FotoLink'])?>
</div>
<p><?php echo ($voorstelling['Voorstelling']['KorteInhoud']); ?></p>
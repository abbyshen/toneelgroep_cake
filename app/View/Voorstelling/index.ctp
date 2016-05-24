<!-- File: /app/View/voorstelling/index.ctp -->

<h1>voorstellingen</h1>
<p><?php echo $this->Html->link('Add voorstelling', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>voorstellingsnaam</th>
        <th>voorstellingsjaar</th>
        <th>korte inhoud</th>
        <th>regie</th>
        <th>opdrachten</th>
    </tr>

<!-- Here's where we loop through our $voorstelling array, printing out oorstellingen info -->

    <?php foreach ($voorstellingen as $voorstelling): ?>
    <tr>
        <td><?php echo $voorstelling['Voorstelling']['id']; ?></td>
        <td><?php echo $this->Html->link(
                    $voorstelling['Voorstelling']['VoorstellingNaam'],
                    array('action' => 'view', $voorstelling['Voorstelling']['id'])
                ); ?>
        </td>
        <td><?php echo $voorstelling['Voorstelling']['VoorstellingJaar']; ?></td>
        <td><?php echo $voorstelling['Voorstelling']['KorteInhoud']; ?> </td>
        <td><?php echo $voorstelling['Voorstelling']['Regie']; ?> </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $voorstelling['Voorstelling']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $voorstelling['Voorstelling']['id'])
                );
            ?>
        </td>
        
    </tr>
    <?php endforeach; ?>

</table>
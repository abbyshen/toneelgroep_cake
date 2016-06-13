<!-- File: /app/View/Newsitems/index.ctp -->

<h1>Het Laatste Nieuws</h1>
<p><?php echo $this->Html->link('Nieuws toevoegen', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>title</th>
        <th>body</th>
        <th>fotolink</th>
        <th>created</th>
    </tr>

<!-- Here's where we loop through our $newsitem array, printing out nieuwsberichten -->

    <?php foreach ($newsitems as $newsitem): ?>
    <tr>
        <td><?php echo $newsitem['Newsitem']['id']; ?></td>
        <td><?php echo $this->Html->link(
                    $newsitem['Newsitem']['title'],
                    array('action' => 'view', $newsitem['Newsitem']['id'])
                ); ?>
        </td>
        <td><?php echo $newsitem['Newsitem']['body']; ?></td>
        <td><?php echo $newsitem['Newsitem']['fotolink']; ?> </td>
        <td><?php echo $newsitem['Newsitem']['created']; ?> </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $newsitem['newsitem']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $newsitem['newsitem']['id'])
                );
            ?>
        </td>
        
    </tr>
    <?php endforeach; ?>

</table>
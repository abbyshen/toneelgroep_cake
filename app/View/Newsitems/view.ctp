<!-- File: /app/View/newsitem/view.ctp -->

<h1><?php echo ($newsitem['Newsitem']['title']); ?></h1>
<div>
    <?php echo $this->Html->image('newsitem/' . $newsitem['Newsitem']['fotolink'])?>
</div>
<p><?php echo ($newsitem['Newsitem']['body']); ?></p>
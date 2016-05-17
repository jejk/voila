<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $demo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $demo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Demo'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Artists'), ['controller' => 'Artists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Artist'), ['controller' => 'Artists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Criteria'), ['controller' => 'Criteria', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Criterion'), ['controller' => 'Criteria', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="demo form large-9 medium-8 columns content">
    <?= $this->Form->create($demo) ?>
    <fieldset>
        <legend><?= __('Edit Demo') ?></legend>
        <?php
            echo $this->Form->input('order');
            echo $this->Form->input('tile');
            echo $this->Form->input('url');
            echo $this->Form->input('end_date');
            echo $this->Form->input('artist_id', ['options' => $artists, 'empty' => true]);
            echo $this->Form->input('criteria._ids', ['options' => $criteria]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Demos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Artists'), ['controller' => 'Artists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Artist'), ['controller' => 'Artists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Criteria'), ['controller' => 'Criteria', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Criterion'), ['controller' => 'Criteria', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="demos form large-9 medium-8 columns content">
    <?= $this->Form->create($demo) ?>
    <fieldset>
        <legend><?= __('Add Demo') ?></legend>
        <?php
            echo $this->Form->input('artist_id', ['options' => $artists]);
            echo $this->Form->input('active');
            echo $this->Form->input('sort_order');
            echo $this->Form->input('title');
            echo $this->Form->input('customer');
            echo $this->Form->input('url');
            echo $this->Form->input('expiration', ['empty' => true]);
            echo $this->Form->input('criteria._ids', ['options' => $criteria]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

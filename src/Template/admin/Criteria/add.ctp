<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Criteria'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Demo'), ['controller' => 'Demo', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Demo'), ['controller' => 'Demo', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="criteria form large-9 medium-8 columns content">
    <?= $this->Form->create($criterion) ?>
    <fieldset>
        <legend><?= __('Add Criterion') ?></legend>
        <?php
            echo $this->Form->input('title_fr');
            echo $this->Form->input('title_en');
            echo $this->Form->input('title_es');
            echo $this->Form->input('title_it');
            echo $this->Form->input('demo._ids', ['options' => $demo]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

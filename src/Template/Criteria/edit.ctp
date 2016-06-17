<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $criterion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $criterion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Criteria'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Demos'), ['controller' => 'Demos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Demo'), ['controller' => 'Demos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Artists'), ['controller' => 'Artists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Artist'), ['controller' => 'Artists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="criteria form large-9 medium-8 columns content">
    <?= $this->Form->create($criterion) ?>
    <fieldset>
        <legend><?= __('Edit Criterion') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('value');
            echo $this->Form->input('group');
            echo $this->Form->input('subgroup');
            echo $this->Form->input('demos._ids', ['options' => $demos]);
            echo $this->Form->input('artists._ids', ['options' => $artists]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

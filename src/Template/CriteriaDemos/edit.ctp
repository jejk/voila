<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $criteriaDemo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $criteriaDemo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Criteria Demos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Demos'), ['controller' => 'Demos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Demo'), ['controller' => 'Demos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Criteria'), ['controller' => 'Criteria', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Criterion'), ['controller' => 'Criteria', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Artists'), ['controller' => 'Artists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Artist'), ['controller' => 'Artists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="criteriaDemos form large-9 medium-8 columns content">
    <?= $this->Form->create($criteriaDemo) ?>
    <fieldset>
        <legend><?= __('Edit Criteria Demo') ?></legend>
        <?php
            echo $this->Form->input('demo_id', ['options' => $demos, 'empty' => true]);
            echo $this->Form->input('criterion_id', ['options' => $criteria, 'empty' => true]);
            echo $this->Form->input('artist_id', ['options' => $artists, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

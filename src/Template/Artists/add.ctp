<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Artists'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Agencies'), ['controller' => 'Agencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Agency'), ['controller' => 'Agencies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Demo'), ['controller' => 'Demo', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Demo'), ['controller' => 'Demo', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Demo Criteria'), ['controller' => 'DemoCriteria', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Demo Criterium'), ['controller' => 'DemoCriteria', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="artists form large-9 medium-8 columns content">
    <?= $this->Form->create($artist) ?>
    <fieldset>
        <legend><?= __('Add Artist') ?></legend>
        <?php
            echo $this->Form->input('agency_id', ['options' => $agencies, 'empty' => true]);
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('facebook');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

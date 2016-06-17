<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Artists'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Agencies'), ['controller' => 'Agencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Agency'), ['controller' => 'Agencies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Demos'), ['controller' => 'Demos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Demo'), ['controller' => 'Demos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Criteria'), ['controller' => 'Criteria', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Criterion'), ['controller' => 'Criteria', 'action' => 'add']) ?></li>
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
            echo $this->Form->input('active');
            echo $this->Form->input('expiration');
            echo $this->Form->input('nbrdemo');
            echo $this->Form->input('slug');
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('description');
            echo $this->Form->input('facebook');
            echo $this->Form->input('twitter');
            echo $this->Form->input('linkedin');
            echo $this->Form->input('accept_agence_edit');
            echo $this->Form->input('criteria._ids', ['options' => $criteria]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

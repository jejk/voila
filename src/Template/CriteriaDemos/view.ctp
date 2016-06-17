<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Criteria Demo'), ['action' => 'edit', $criteriaDemo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Criteria Demo'), ['action' => 'delete', $criteriaDemo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $criteriaDemo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Criteria Demos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Criteria Demo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Demos'), ['controller' => 'Demos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Demo'), ['controller' => 'Demos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Criteria'), ['controller' => 'Criteria', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Criterion'), ['controller' => 'Criteria', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Artists'), ['controller' => 'Artists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Artist'), ['controller' => 'Artists', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="criteriaDemos view large-9 medium-8 columns content">
    <h3><?= h($criteriaDemo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Demo') ?></th>
            <td><?= $criteriaDemo->has('demo') ? $this->Html->link($criteriaDemo->demo->title, ['controller' => 'Demos', 'action' => 'view', $criteriaDemo->demo->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Criterion') ?></th>
            <td><?= $criteriaDemo->has('criterion') ? $this->Html->link($criteriaDemo->criterion->title_fr, ['controller' => 'Criteria', 'action' => 'view', $criteriaDemo->criterion->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Artist') ?></th>
            <td><?= $criteriaDemo->has('artist') ? $this->Html->link($criteriaDemo->artist->id, ['controller' => 'Artists', 'action' => 'view', $criteriaDemo->artist->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($criteriaDemo->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($criteriaDemo->modified) ?></td>
        </tr>
    </table>
</div>

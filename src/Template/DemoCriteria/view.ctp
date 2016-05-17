<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Demo Criterium'), ['action' => 'edit', $demoCriterium->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Demo Criterium'), ['action' => 'delete', $demoCriterium->id], ['confirm' => __('Are you sure you want to delete # {0}?', $demoCriterium->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Demo Criteria'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Demo Criterium'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Artists'), ['controller' => 'Artists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Artist'), ['controller' => 'Artists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Demo'), ['controller' => 'Demo', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Demo'), ['controller' => 'Demo', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Criteria'), ['controller' => 'Criteria', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Criterion'), ['controller' => 'Criteria', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="demoCriteria view large-9 medium-8 columns content">
    <h3><?= h($demoCriterium->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Demo') ?></th>
            <td><?= $demoCriterium->has('demo') ? $this->Html->link($demoCriterium->demo->id, ['controller' => 'Demo', 'action' => 'view', $demoCriterium->demo->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Artist') ?></th>
            <td><?= $demoCriterium->has('artist') ? $this->Html->link($demoCriterium->artist->id, ['controller' => 'Artists', 'action' => 'view', $demoCriterium->artist->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($demoCriterium->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Criteria Id') ?></th>
            <td><?= $this->Number->format($demoCriterium->criteria_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($demoCriterium->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($demoCriterium->modified) ?></td>
        </tr>
    </table>
</div>

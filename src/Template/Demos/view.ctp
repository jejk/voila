<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Demo'), ['action' => 'edit', $demo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Demo'), ['action' => 'delete', $demo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $demo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Demos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Demo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Artists'), ['controller' => 'Artists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Artist'), ['controller' => 'Artists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Criteria'), ['controller' => 'Criteria', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Criterion'), ['controller' => 'Criteria', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="demos view large-9 medium-8 columns content">
    <h3><?= h($demo->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Artist') ?></th>
            <td><?= $demo->has('artist') ? $this->Html->link($demo->artist->id, ['controller' => 'Artists', 'action' => 'view', $demo->artist->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($demo->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= h($demo->customer) ?></td>
        </tr>
        <tr>
            <th><?= __('Url') ?></th>
            <td><?= h($demo->url) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($demo->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Sort Order') ?></th>
            <td><?= $this->Number->format($demo->sort_order) ?></td>
        </tr>
        <tr>
            <th><?= __('Expiration') ?></th>
            <td><?= h($demo->expiration) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($demo->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($demo->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $demo->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Criteria') ?></h4>
        <?php if (!empty($demo->criteria)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Group') ?></th>
                <th><?= __('Subgroup') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($demo->criteria as $criteria): ?>
            <tr>
                <td><?= h($criteria->id) ?></td>
                <td><?= h($criteria->title) ?></td>
                <td><?= h($criteria->group) ?></td>
                <td><?= h($criteria->subgroup) ?></td>
                <td><?= h($criteria->created) ?></td>
                <td><?= h($criteria->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Criteria', 'action' => 'view', $criteria->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Criteria', 'action' => 'edit', $criteria->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Criteria', 'action' => 'delete', $criteria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $criteria->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

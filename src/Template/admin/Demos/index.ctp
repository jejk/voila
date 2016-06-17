<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Demo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Artists'), ['controller' => 'Artists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Artist'), ['controller' => 'Artists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Criteria'), ['controller' => 'Criteria', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Criterion'), ['controller' => 'Criteria', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="demos index large-9 medium-8 columns content">
    <h3><?= __('Demos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('artist_id') ?></th>
                <th><?= $this->Paginator->sort('active') ?></th>
                <th><?= $this->Paginator->sort('sort_order') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('customer') ?></th>
                <th><?= $this->Paginator->sort('url') ?></th>
                <th><?= $this->Paginator->sort('expiration') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($demos as $demo): ?>
            <tr>
                <td><?= $this->Number->format($demo->id) ?></td>
                <td><?= $demo->has('artist') ? $this->Html->link($demo->artist->id, ['controller' => 'Artists', 'action' => 'view', $demo->artist->id]) : '' ?></td>
                <td><?= h($demo->active) ?></td>
                <td><?= $this->Number->format($demo->sort_order) ?></td>
                <td><?= h($demo->title) ?></td>
                <td><?= h($demo->customer) ?></td>
                <td><?= h($demo->url) ?></td>
                <td><?= h($demo->expiration) ?></td>
                <td><?= h($demo->created) ?></td>
                <td><?= h($demo->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $demo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $demo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $demo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $demo->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Criterion'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Demo'), ['controller' => 'Demo', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Demo'), ['controller' => 'Demo', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="criteria index large-9 medium-8 columns content">
    <h3><?= __('Criteria') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title_fr') ?></th>
                <th><?= $this->Paginator->sort('title_en') ?></th>
                <th><?= $this->Paginator->sort('title_es') ?></th>
                <th><?= $this->Paginator->sort('title_it') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($criteria as $criterion): ?>
            <tr>
                <td><?= $this->Number->format($criterion->id) ?></td>
                <td><?= h($criterion->title_fr) ?></td>
                <td><?= h($criterion->title_en) ?></td>
                <td><?= h($criterion->title_es) ?></td>
                <td><?= h($criterion->title_it) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $criterion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $criterion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $criterion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $criterion->id)]) ?>
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

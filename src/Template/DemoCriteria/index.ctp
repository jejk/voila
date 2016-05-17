<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Demo Criterium'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Artists'), ['controller' => 'Artists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Artist'), ['controller' => 'Artists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Demo'), ['controller' => 'Demo', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Demo'), ['controller' => 'Demo', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Criteria'), ['controller' => 'Criteria', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Criterion'), ['controller' => 'Criteria', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="demoCriteria index large-9 medium-8 columns content">
    <h3><?= __('Demo Criteria') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('demo_id') ?></th>
                <th><?= $this->Paginator->sort('criteria_id') ?></th>
                <th><?= $this->Paginator->sort('artist_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($demoCriteria as $demoCriterium): ?>
            <tr>
                <td><?= $this->Number->format($demoCriterium->id) ?></td>
                <td><?= $demoCriterium->has('demo') ? $this->Html->link($demoCriterium->demo->id, ['controller' => 'Demo', 'action' => 'view', $demoCriterium->demo->id]) : '' ?></td>
                <td><?= $this->Number->format($demoCriterium->criteria_id) ?></td>
                <td><?= $demoCriterium->has('artist') ? $this->Html->link($demoCriterium->artist->id, ['controller' => 'Artists', 'action' => 'view', $demoCriterium->artist->id]) : '' ?></td>
                <td><?= h($demoCriterium->created) ?></td>
                <td><?= h($demoCriterium->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $demoCriterium->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $demoCriterium->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $demoCriterium->id], ['confirm' => __('Are you sure you want to delete # {0}?', $demoCriterium->id)]) ?>
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

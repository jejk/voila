<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Artist'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Agencies'), ['controller' => 'Agencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Agency'), ['controller' => 'Agencies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Demo'), ['controller' => 'Demo', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Demo'), ['controller' => 'Demo', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Demo Criteria'), ['controller' => 'DemoCriteria', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Demo Criterium'), ['controller' => 'DemoCriteria', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="artists index large-9 medium-8 columns content">
    <h3><?= __('Artists') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('agency_id') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('password') ?></th>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('last_name') ?></th>
                <th><?= $this->Paginator->sort('facebook') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($artists as $artist): ?>
            <tr>
                <td><?= $this->Number->format($artist->id) ?></td>
                <td><?= $artist->has('agency') ? $this->Html->link($artist->agency->title, ['controller' => 'Agencies', 'action' => 'view', $artist->agency->id]) : '' ?></td>
                <td><?= h($artist->email) ?></td>
                <td><?= h($artist->password) ?></td>
                <td><?= h($artist->first_name) ?></td>
                <td><?= h($artist->last_name) ?></td>
                <td><?= h($artist->facebook) ?></td>
                <td><?= h($artist->created) ?></td>
                <td><?= h($artist->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $artist->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $artist->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $artist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artist->id)]) ?>
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

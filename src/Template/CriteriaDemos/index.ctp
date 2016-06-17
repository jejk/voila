<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Criteria Demo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Demos'), ['controller' => 'Demos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Demo'), ['controller' => 'Demos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Criteria'), ['controller' => 'Criteria', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Criterion'), ['controller' => 'Criteria', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Artists'), ['controller' => 'Artists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Artist'), ['controller' => 'Artists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="criteriaDemos index large-9 medium-8 columns content">
    <h3><?= __('Criteria Demos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('demo_id') ?></th>
                <th><?= $this->Paginator->sort('criterion_id') ?></th>
                <th><?= $this->Paginator->sort('artist_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($criteriaDemos as $criteriaDemo): ?>
            <tr>
                <td><?= $criteriaDemo->has('demo') ? $this->Html->link($criteriaDemo->demo->title, ['controller' => 'Demos', 'action' => 'view', $criteriaDemo->demo->id]) : '' ?></td>
                <td><?= $criteriaDemo->has('criterion') ? $this->Html->link($criteriaDemo->criterion->title_fr, ['controller' => 'Criteria', 'action' => 'view', $criteriaDemo->criterion->id]) : '' ?></td>
                <td><?= $criteriaDemo->has('artist') ? $this->Html->link($criteriaDemo->artist->id, ['controller' => 'Artists', 'action' => 'view', $criteriaDemo->artist->id]) : '' ?></td>
                <td><?= h($criteriaDemo->created) ?></td>
                <td><?= h($criteriaDemo->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $criteriaDemo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $criteriaDemo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $criteriaDemo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $criteriaDemo->id)]) ?>
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

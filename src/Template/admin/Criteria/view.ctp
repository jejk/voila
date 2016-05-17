<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Criterion'), ['action' => 'edit', $criterion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Criterion'), ['action' => 'delete', $criterion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $criterion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Criteria'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Criterion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Demo'), ['controller' => 'Demo', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Demo'), ['controller' => 'Demo', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="criteria view large-9 medium-8 columns content">
    <h3><?= h($criterion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title Fr') ?></th>
            <td><?= h($criterion->title_fr) ?></td>
        </tr>
        <tr>
            <th><?= __('Title En') ?></th>
            <td><?= h($criterion->title_en) ?></td>
        </tr>
        <tr>
            <th><?= __('Title Es') ?></th>
            <td><?= h($criterion->title_es) ?></td>
        </tr>
        <tr>
            <th><?= __('Title It') ?></th>
            <td><?= h($criterion->title_it) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($criterion->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Demo') ?></h4>
        <?php if (!empty($criterion->demo)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Order') ?></th>
                <th><?= __('Tile') ?></th>
                <th><?= __('Url') ?></th>
                <th><?= __('End Date') ?></th>
                <th><?= __('Artist Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($criterion->demo as $demo): ?>
            <tr>
                <td><?= h($demo->id) ?></td>
                <td><?= h($demo->order) ?></td>
                <td><?= h($demo->tile) ?></td>
                <td><?= h($demo->url) ?></td>
                <td><?= h($demo->end_date) ?></td>
                <td><?= h($demo->artist_id) ?></td>
                <td><?= h($demo->created) ?></td>
                <td><?= h($demo->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Demo', 'action' => 'view', $demo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Demo', 'action' => 'edit', $demo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Demo', 'action' => 'delete', $demo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $demo->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

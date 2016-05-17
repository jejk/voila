<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Artist'), ['action' => 'edit', $artist->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Artist'), ['action' => 'delete', $artist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artist->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Artists'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Artist'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Agencies'), ['controller' => 'Agencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Agency'), ['controller' => 'Agencies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Demo'), ['controller' => 'Demo', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Demo'), ['controller' => 'Demo', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Demo Criteria'), ['controller' => 'DemoCriteria', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Demo Criterion'), ['controller' => 'DemoCriteria', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="artists view large-9 medium-8 columns content">
    <h3><?= h($artist->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Agency') ?></th>
            <td><?= $artist->has('agency') ? $this->Html->link($artist->agency->title, ['controller' => 'Agencies', 'action' => 'view', $artist->agency->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($artist->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Passw0rd') ?></th>
            <td><?= h($artist->password) ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($artist->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($artist->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Facebook') ?></th>
            <td><?= h($artist->facebook) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($artist->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($artist->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($artist->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Demo') ?></h4>
        <?php if (!empty($artist->demo)): ?>
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
            <?php foreach ($artist->demo as $demo): ?>
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
    <div class="related">
        <h4><?= __('Related Demo Criteria') ?></h4>
        <?php if (!empty($artist->demo_criteria)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Demo Id') ?></th>
                <th><?= __('Criteria Id') ?></th>
                <th><?= __('Artist Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($artist->demo_criteria as $demoCriteria): ?>
            <tr>
                <td><?= h($demoCriteria->id) ?></td>
                <td><?= h($demoCriteria->demo_id) ?></td>
                <td><?= h($demoCriteria->criteria_id) ?></td>
                <td><?= h($demoCriteria->artist_id) ?></td>
                <td><?= h($demoCriteria->created) ?></td>
                <td><?= h($demoCriteria->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DemoCriteria', 'action' => 'view', $demoCriteria->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DemoCriteria', 'action' => 'edit', $demoCriteria->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DemoCriteria', 'action' => 'delete', $demoCriteria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $demoCriteria->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

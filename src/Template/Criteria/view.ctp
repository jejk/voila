<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Criterion'), ['action' => 'edit', $criterion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Criterion'), ['action' => 'delete', $criterion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $criterion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Criteria'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Criterion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Demos'), ['controller' => 'Demos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Demo'), ['controller' => 'Demos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Artists'), ['controller' => 'Artists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Artist'), ['controller' => 'Artists', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="criteria view large-9 medium-8 columns content">
    <h3><?= h($criterion->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($criterion->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Group') ?></th>
            <td><?= h($criterion->group) ?></td>
        </tr>
        <tr>
            <th><?= __('Subgroup') ?></th>
            <td><?= h($criterion->subgroup) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($criterion->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Value') ?></th>
            <td><?= $this->Number->format($criterion->value) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($criterion->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($criterion->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Demos') ?></h4>
        <?php if (!empty($criterion->demos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Artist Id') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Sort Order') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Customer') ?></th>
                <th><?= __('Url') ?></th>
                <th><?= __('Expiration') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($criterion->demos as $demos): ?>
            <tr>
                <td><?= h($demos->id) ?></td>
                <td><?= h($demos->artist_id) ?></td>
                <td><?= h($demos->active) ?></td>
                <td><?= h($demos->sort_order) ?></td>
                <td><?= h($demos->title) ?></td>
                <td><?= h($demos->customer) ?></td>
                <td><?= h($demos->url) ?></td>
                <td><?= h($demos->expiration) ?></td>
                <td><?= h($demos->created) ?></td>
                <td><?= h($demos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Demos', 'action' => 'view', $demos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Demos', 'action' => 'edit', $demos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Demos', 'action' => 'delete', $demos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $demos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Artists') ?></h4>
        <?php if (!empty($criterion->artists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Agency Id') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Expiration') ?></th>
                <th><?= __('Nbrdemo') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('First Name') ?></th>
                <th><?= __('Last Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Facebook') ?></th>
                <th><?= __('Twitter') ?></th>
                <th><?= __('Linkedin') ?></th>
                <th><?= __('Accept Agence Edit') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($criterion->artists as $artists): ?>
            <tr>
                <td><?= h($artists->id) ?></td>
                <td><?= h($artists->agency_id) ?></td>
                <td><?= h($artists->email) ?></td>
                <td><?= h($artists->password) ?></td>
                <td><?= h($artists->active) ?></td>
                <td><?= h($artists->expiration) ?></td>
                <td><?= h($artists->nbrdemo) ?></td>
                <td><?= h($artists->slug) ?></td>
                <td><?= h($artists->first_name) ?></td>
                <td><?= h($artists->last_name) ?></td>
                <td><?= h($artists->description) ?></td>
                <td><?= h($artists->facebook) ?></td>
                <td><?= h($artists->twitter) ?></td>
                <td><?= h($artists->linkedin) ?></td>
                <td><?= h($artists->accept_agence_edit) ?></td>
                <td><?= h($artists->created) ?></td>
                <td><?= h($artists->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Artists', 'action' => 'view', $artists->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Artists', 'action' => 'edit', $artists->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Artists', 'action' => 'delete', $artists->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artists->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Artist'), ['action' => 'edit', $artist->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Artist'), ['action' => 'delete', $artist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artist->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Artists'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Artist'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Agencies'), ['controller' => 'Agencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Agency'), ['controller' => 'Agencies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Demos'), ['controller' => 'Demos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Demo'), ['controller' => 'Demos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Criteria'), ['controller' => 'Criteria', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Criterion'), ['controller' => 'Criteria', 'action' => 'add']) ?> </li>
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
            <th><?= __('Password') ?></th>
            <td><?= h($artist->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Slug') ?></th>
            <td><?= h($artist->slug) ?></td>
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
            <th><?= __('Twitter') ?></th>
            <td><?= h($artist->twitter) ?></td>
        </tr>
        <tr>
            <th><?= __('Linkedin') ?></th>
            <td><?= h($artist->linkedin) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($artist->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Nbrdemo') ?></th>
            <td><?= $this->Number->format($artist->nbrdemo) ?></td>
        </tr>
        <tr>
            <th><?= __('Expiration') ?></th>
            <td><?= h($artist->expiration) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($artist->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($artist->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $artist->active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Accept Agence Edit') ?></th>
            <td><?= $artist->accept_agence_edit ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($artist->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Demos') ?></h4>
        <?php if (!empty($artist->demos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Artist Id') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Order') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Customer') ?></th>
                <th><?= __('Url') ?></th>
                <th><?= __('End Date') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($artist->demos as $demos): ?>
            <tr>
                <td><?= h($demos->id) ?></td>
                <td><?= h($demos->artist_id) ?></td>
                <td><?= h($demos->active) ?></td>
                <td><?= h($demos->order) ?></td>
                <td><?= h($demos->title) ?></td>
                <td><?= h($demos->customer) ?></td>
                <td><?= h($demos->url) ?></td>
                <td><?= h($demos->end_date) ?></td>
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
        <h4><?= __('Related Criteria') ?></h4>
        <?php if (!empty($artist->criteria)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title Fr') ?></th>
                <th><?= __('Title En') ?></th>
                <th><?= __('Title Es') ?></th>
                <th><?= __('Title It') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($artist->criteria as $criteria): ?>
            <tr>
                <td><?= h($criteria->id) ?></td>
                <td><?= h($criteria->title_fr) ?></td>
                <td><?= h($criteria->title_en) ?></td>
                <td><?= h($criteria->title_es) ?></td>
                <td><?= h($criteria->title_it) ?></td>
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

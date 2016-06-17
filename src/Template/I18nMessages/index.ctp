<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New I18n Message'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Delete cache'), ['action' => 'clearcache']) ?></li>
    </ul>
</nav>
<div class="i18nMessages index large-9 medium-8 columns content">
    <h3><?= __('I18n Messages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('domain') ?></th>
                <th><?= $this->Paginator->sort('locale') ?></th>
                <th><?= $this->Paginator->sort('singular') ?></th>
                <th><?= $this->Paginator->sort('plural') ?></th>
                <th><?= $this->Paginator->sort('context') ?></th>
                <th><?= $this->Paginator->sort('value_0') ?></th>
                <th><?= $this->Paginator->sort('value_1') ?></th>
                <th><?= $this->Paginator->sort('value_2') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($i18nMessages as $i18nMessage): ?>
            <tr>
                <td><?= $this->Number->format($i18nMessage->id) ?></td>
                <td><?= h($i18nMessage->domain) ?></td>
                <td><?= h($i18nMessage->locale) ?></td>
                <td><?= h($i18nMessage->singular) ?></td>
                <td><?= h($i18nMessage->plural) ?></td>
                <td><?= h($i18nMessage->context) ?></td>
                <td><?= h($i18nMessage->value_0) ?></td>
                <td><?= h($i18nMessage->value_1) ?></td>
                <td><?= h($i18nMessage->value_2) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $i18nMessage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $i18nMessage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $i18nMessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $i18nMessage->id)]) ?>
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

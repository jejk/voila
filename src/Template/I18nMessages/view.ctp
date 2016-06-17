<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit I18n Message'), ['action' => 'edit', $i18nMessage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete I18n Message'), ['action' => 'delete', $i18nMessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $i18nMessage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List I18n Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New I18n Message'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="i18nMessages view large-9 medium-8 columns content">
    <h3><?= h($i18nMessage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Domain') ?></th>
            <td><?= h($i18nMessage->domain) ?></td>
        </tr>
        <tr>
            <th><?= __('Locale') ?></th>
            <td><?= h($i18nMessage->locale) ?></td>
        </tr>
        <tr>
            <th><?= __('Singular') ?></th>
            <td><?= h($i18nMessage->singular) ?></td>
        </tr>
        <tr>
            <th><?= __('Plural') ?></th>
            <td><?= h($i18nMessage->plural) ?></td>
        </tr>
        <tr>
            <th><?= __('Context') ?></th>
            <td><?= h($i18nMessage->context) ?></td>
        </tr>
        <tr>
            <th><?= __('Value 0') ?></th>
            <td><?= h($i18nMessage->value_0) ?></td>
        </tr>
        <tr>
            <th><?= __('Value 1') ?></th>
            <td><?= h($i18nMessage->value_1) ?></td>
        </tr>
        <tr>
            <th><?= __('Value 2') ?></th>
            <td><?= h($i18nMessage->value_2) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($i18nMessage->id) ?></td>
        </tr>
    </table>
</div>

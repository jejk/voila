<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List I18n Messages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="i18nMessages form large-9 medium-8 columns content">
    <?= $this->Form->create($i18nMessage) ?>
    <fieldset>
        <legend><?= __('Add I18n Message') ?></legend>
        <?php
            echo $this->Form->input('domain');
            echo $this->Form->input('locale');
            echo $this->Form->input('singular');
            echo $this->Form->input('plural');
            echo $this->Form->input('context');
            echo $this->Form->input('value_0');
            echo $this->Form->input('value_1');
            echo $this->Form->input('value_2');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('以下の項目を入力して登録してください') ?></legend>
    <?php
    echo $this->Form->control('username');
    echo $this->Form->control('password');
    echo $this->Form->control('email');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

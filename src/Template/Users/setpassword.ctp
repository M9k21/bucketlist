<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('新しいパスワードを設定してください') ?></legend>
    <?php
    echo $this->Form->hidden('username', ['value' => $user->username]);
    echo $this->Form->control('password', ['value' => '']);
    echo $this->Form->hidden('email', ['value' => $user->email]);
    echo $this->Form->hidden('image', ['value' => $user->image]);
    echo $this->Form->hidden('private', ['value' => $user->private === false ? 0 : 1]);
    echo $this->Form->hidden('is_deleted', ['value' => 0]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
<?= $this->Html->link(__('戻る'), ['controller' => 'Users', 'action' => 'edit']) ?>

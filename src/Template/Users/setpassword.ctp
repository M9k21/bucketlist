<h3>パスワードの設定</h3>
<?= $this->Form->create($user) ?>
<?php
    echo $this->Form->hidden('username', ['value' => $user->username]);
    echo $this->Form->control('password', ['value' => '']);
    echo $this->Form->hidden('email', ['value' => $user->email]);
    echo $this->Form->hidden('image', ['value' => $user->image]);
    echo $this->Form->hidden('private', ['value' => $user->private === false ? 0 : 1]);
    echo $this->Form->hidden('is_deleted', ['value' => 0]);
?>
<?= $this->Form->button(__('設定')) ?>
<?= $this->Form->end() ?>
<?= $this->Html->link(__('戻る'), ['controller' => 'Users', 'action' => 'edit']) ?>

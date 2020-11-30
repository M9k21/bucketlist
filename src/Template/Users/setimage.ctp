<h3>アイコン画像の変更</h3>
<?= $this->Form->create($user, [
    'type' => 'file',
    'url' => [
        'controller' => 'Users',
        'action' => 'setimage'
    ]
]) ?>
<?php
    echo $this->Form->hidden('username', ['value' => $user->username]);
    echo $this->Form->hidden('password', ['value' => $user->password]);
    echo $this->Form->hidden('email', ['value' => $user->email]);
    echo $this->Form->control('image', ['type' => 'file']);
    echo $this->Form->hidden('private', ['value' => $user->private === false ? 0 : 1]);
    echo $this->Form->hidden('is_deleted', ['value' => 0]);
?>
<?= $this->Form->button(__('送信')) ?>
<?= $this->Form->end() ?>
<?= $this->Html->link(__('戻る'), ['controller' => 'Users', 'action' => 'edit']) ?>

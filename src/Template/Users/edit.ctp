<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('アカウント情報の変更') ?></legend>
    <?php
    echo $this->Form->control('username');
    echo $this->Form->hidden('password', ['value' => $user->password]);
    echo $this->Form->control('email');
    echo $this->Form->hidden('image', ['value' => $user->image]);
    echo $this->Form->control('private', [
        'type' => 'radio',
        'options' => [
            [0 => '公開'],
            [1 => '非公開'],
        ],
        'label' => 'リストを公開しますか？',
    ]);
    echo $this->Form->hidden('is_deleted', ['value' => 0]);
    ?>
    <p>パスワードの変更は<?= $this->Html->link('こちら', ['controller' => 'Users', 'action' => 'setpassword', $user->id]) ?></p>
    <p>画像の変更は<?= $this->Html->link('こちら', ['controller' => 'Users', 'action' => 'setimage', $user->id]) ?></p>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

<h3>アカウント情報の変更</h3>
<?= $this->Form->create($user) ?>
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
    <p>パスワードの設定は<?= $this->Html->link('こちら', ['controller' => 'Users', 'action' => 'setpassword']) ?></p>
    <p>アイコン画像の変更は<?= $this->Html->link('こちら', ['controller' => 'Users', 'action' => 'setimage']) ?></p>
<?= $this->Form->button(__('送信')) ?>
<?= $this->Form->end() ?>
<?= $this->Html->link(__('戻る'), ['controller' => 'Users', 'action' => 'view']) ?>

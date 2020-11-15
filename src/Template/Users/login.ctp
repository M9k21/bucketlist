<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
<fieldset>
    <legend>メールアドレスとパスワードを入力してください。</legend>
    <?= $this->Form->control('email') ?>
    <?= $this->Form->control('password') ?>
</fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>

<p>アカウントをお持ちでない方は<?= $this->Html->link('こちら', ['controller' => 'Users', 'action' => 'add']) ?>から</p>

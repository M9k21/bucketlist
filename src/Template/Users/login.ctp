<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <p>メールアドレスとパスワードを入力してください。</p>
    <?= $this->Form->control('email') ?>
    <?= $this->Form->control('password') ?>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>

<p>アカウントをお持ちでない方は<?= $this->Html->link('こちら', ['controller' => 'Users', 'action' => 'index']) ?>から</p>

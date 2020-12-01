<h2>アカウントの作成</h2>
<?= $this->Form->create($user) ?>
    <p>以下の項目を入力して登録してください。</p>
    <?php
    echo $this->Form->control('username');
    echo $this->Form->control('password');
    echo $this->Form->control('email');
    ?>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

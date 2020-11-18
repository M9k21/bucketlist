<h2><?= h($bucketlist->user->username) ?> 's List</h2>
<h3>
    <?= h($bucketlist->completed ? '■' : '□') ?>
    <?= h($bucketlist->item) ?>
</h3>
<?php if (!empty($bucketlist->completed)) : ?>
    <p><?= h($bucketlist->completed) ?>達成しました</p>
<?php else : ?>
    <p>これから実現する予定です</p>
<?php endif; ?>
<?php if (!empty($bucketlist->detail)) : ?>
    <?= nl2br(h($bucketlist->detail)) ?>
<?php else : ?>
    <p>実現に向けてのプランや実現した日の記録を残してみましょう！</p>
<?php endif; ?>
<p><?= '最終更新：' . h($bucketlist->modified) ?></p>
<p><?= $this->Html->link('編集する', ['action' => 'edit', $bucketlist->id]) ?></p>
<p><?= $this->Html->link('戻る', ['action' => 'collect', 'username' => $bucketlist->user->username]) ?></p>

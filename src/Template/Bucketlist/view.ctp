<h2><?= h($bucketlist->user->username) ?> 's List</h2>
<h3>
    <?= $bucketlist->completed ? '<i class="fas fa-check-square"></i>' : '<i class="far fa-square"></i>' ?>
    <?= h($bucketlist->item) ?>
</h3>
<?php if (!empty($bucketlist->completed)) : ?>
    <p><?= h($bucketlist->completed) ?>達成しました</p>
<?php else : ?>
    <p>これから実現する予定です</p>
<?php endif; ?>
<div class="textarea">
    <?php if (!empty($bucketlist->detail)) : ?>
        <?= nl2br(h($bucketlist->detail)) ?>
    <?php else : ?>
        <p>実現に向けてのプランや実現した日の記録を残してみましょう！</p>
    <?php endif; ?>
</div>
<p class="updated"><?= '最終更新：' . h($bucketlist->modified) ?> <?= $this->Html->link('<i class="fas fa-edit fa-lg fa-fw"></i>', ['action' => 'edit', $bucketlist->id], ['escape' => false]) ?></p>
<p><?= $this->Html->link('戻る', ['action' => 'collect', 'username' => $bucketlist->user->username]) ?></p>

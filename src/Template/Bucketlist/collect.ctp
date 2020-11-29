<h2><?= h($user->username) ?> 's List</h2>
<p>現在<?= h($bucketlist_count) ?>個登録されています。</p>
<?php if ($user->username === $authuser['username']) : ?>
    <p>あなたの実現したいことを教えてください。</p>
    <fieldset>
        <?= $this->Form->create($add_bucketlist, [
            'type' => 'post',
            'url' => [
                'controller'=>'Bucketlist',
                'action' => 'add',
                'username' =>$user->username
            ]
        ]) ?>
        <?= $this->Form->hidden('user_id', ['value' => $authuser['id']]) ?>
        <?= $this->Form->text('item', ['value' => '']) ?>
        <?= $this->Form->hidden('is_deleted', ['value' => 0]) ?>
        <?= $this->Form->button(__('登録')) ?>
        <?= $this->Form->end() ?>
    </fieldset>
<?php endif; ?>
<ul>
    <?php foreach ($bucketlists as $bucketlist) : ?>
        <li>
            <?php if ($user->username === $authuser['username']) : ?>
                <?php if (!empty($bucketlist->completed)) : ?>
                    <?= $this->Html->link('<i class="fas fa-check-square"></i>', ['action' => 'complete', $bucketlist->id], ['escape'=> false]) ?>
                <?php else : ?>
                    <?= $this->Html->link('<i class="far fa-square"></i>', ['action' => 'complete', $bucketlist->id], ['escape'=> false]) ?>
                <?php endif ?>
                <?= $this->Html->link($bucketlist->item, ['action' => 'view', $bucketlist->id]) ?>
            <?php else : ?>
                <?= !empty($bucketlist->completed)? '<i class="fas fa-check-square"></i>':'<i class="far fa-square"></i>' ?>
                <?= h($bucketlist->item) ?>
            <?php endif; ?>
            <?= !empty($bucketlist->completed) ? '＼達成／' : '' ?>
        </li>
    <?php endforeach; ?>
</ul>

<h2><?= h($username) ?> 's List</h2>
<p>現在<?= h($bucketlist_count) ?>個登録されています。</p>
<?php if ($username === $authuser['username']) : ?>
    <p>あなたの実現したいことを教えてください。</p>
    <fieldset>
        <?= $this->Form->create($add_bucketlist) ?>
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
            <?php if ($username === $authuser['username']) : ?>
                <?php if (!empty($bucketlist->completed)) : ?>
                    <?= $this->Html->link('■', ['action' => 'complete', $bucketlist->id]) ?>
                <?php else : ?>
                    <?= $this->Html->link('□', ['action' => 'complete', $bucketlist->id]) ?>
                <?php endif ?>
                <?= $this->Html->link($bucketlist->item, ['action' => 'view', $bucketlist->id]) ?>
            <?php else : ?>
                <?php if (!empty($bucketlist->completed)) : ?>
                    <?= '■' ?>
                <?php else : ?>
                    <?= '□' ?>
                <?php endif ?>
                <?= h($bucketlist->item) ?>
            <?php endif; ?>
            <?= !empty($bucketlist->completed) ? '＼達成／' : '' ?>
        </li>
    <?php endforeach; ?>
</ul>

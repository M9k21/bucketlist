<?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') ?>
<?= $this->Html->script($checkbox) ?>

<h2><?= h($user->username) ?> 's List<?= $user->private ? ' <i class="fas fa-lock fa-xs"></i>' : '' ?></h2>
<p>現在<?= h($bucketlist_count) ?>個登録されています。</p>
<?php if ($user->username === $authuser['username']) : ?>
    <fieldset>
        <p class="form-text">あなたの実現したいことを教えてください。</p>
        <?= $this->Form->create($add_bucketlist, [
            'type' => 'post',
            'url' => [
                'controller' => 'Bucketlist',
                'action' => 'add'
            ]
        ]) ?>
        <?= $this->Form->hidden('user_id', ['value' => $authuser['id']]) ?>
        <?= $this->Form->error('item') ?>
        <?= $this->Form->text('item', ['value' => '']) ?>
        <?= $this->Form->hidden('is_deleted', ['value' => 0]) ?>
        <?= $this->Form->button(__('登録')) ?>
        <?= $this->Form->end() ?>
    </fieldset>
<?php endif; ?>
<ul>
    <?php foreach ($bucketlists as $bucketlist) : ?>
        <?php if ($user->username === $authuser['username']) : ?>
            <li class="bucketlist_item_flex">
                <div id="checkbox_<?= h($bucketlist->id) ?>">
                    <?= $this->element('checkbox', ['bucketlist' => $bucketlist]) ?>
                </div>
                <?= $this->Html->link($bucketlist->item, ['action' => 'view', $bucketlist->id]) ?>
                <?php if (!empty($bucketlist->completed)) : ?>
                    <span class="completed" id="completed_<?= h($bucketlist->id) ?>">＼達成／</span>
                <?php else : ?>
                    <span class="completed" id="completed_<?= h($bucketlist->id) ?>" style="display:none;">＼達成／</span>
                <?php endif; ?>
            </li>
        <?php else : ?>
            <li>
                <?= !empty($bucketlist->completed) ? '<i class="fas fa-check-square"></i>' : '<i class="far fa-square"></i>' ?>
                <?= h($bucketlist->item) ?>
                <span class="completed"><?= !empty($bucketlist->completed) ? '＼達成／' : '' ?></span>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ', ['url' => ['action' => 'collect', 'username' => $user->username]]) ?>
        <?= $this->Paginator->numbers(['url' => ['action' => 'collect', 'username' => $user->username]]) ?>
        <?= $this->Paginator->next(' >', ['url' => ['action' => 'collect', 'username' => $user->username]]) ?>
    </ul>
</div>

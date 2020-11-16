<h2><?= h($username) ?> 's List</h2>
<p>現在<?= h($listitem_count) ?>個登録されています。</p>
<?php if ($username === $authuser['username']) : ?>
    <p>あなたの実現したいことを教えてください。</p>
    <fieldset>
        <?= $this->Form->create($add_listitem) ?>
        <?= $this->Form->hidden('user_id', ['value' => $authuser['id']]) ?>
        <?= $this->Form->text('item', ['value' => '']) ?>
        <?= $this->Form->hidden('is_deleted', ['value' => 0]) ?>
        <?= $this->Form->button(__('登録')) ?>
        <?= $this->Form->end() ?>
    </fieldset>
<?php endif; ?>
<ul>
    <?php foreach ($listitems as $listitem) : ?>
        <li>
            <?php if ($username === $authuser['username']) : ?>
                <?php if (!empty($listitem->completed)) : ?>
                    <?= $this->Html->link('■', ['action' => 'complete', $listitem->id]) ?>
                <?php else : ?>
                    <?= $this->Html->link('□', ['action' => 'complete', $listitem->id]) ?>
                <?php endif ?>
                <?= $this->Html->link($listitem->item, ['action' => 'view', $listitem->id]) ?>
            <?php else : ?>
                <?php if (!empty($listitem->completed)) : ?>
                    <?= '■' ?>
                <?php else : ?>
                    <?= '□' ?>
                <?php endif ?>
                <?= h($listitem->item) ?>
            <?php endif; ?>
            <?= !empty($listitem->completed) ? '＼達成／' : '' ?>
        </li>
    <?php endforeach; ?>
</ul>

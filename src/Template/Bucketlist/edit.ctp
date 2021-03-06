<h2><?= h($bucketlist->user->username) ?> 's List</h2>
<h3><i class="fas fa-edit fa-fw"></i>編集する</h3>
<fieldset>
    <?= $this->Form->create($bucketlist) ?>
    <?= $this->Form->hidden('user_id', ['value' => $bucketlist->user_id]) ?>
    <?= $this->Form->control('item', ['value' => $bucketlist->item, 'label' => 'title']) ?>
    <?= $this->Form->textarea('detail', ['row' => 50, 'col' => 20, 'placeholder' => '実現に向けてのプランや実現した日の記録を残してみましょう！', 'label' => 'detail']) ?>
    <?= $this->Form->hidden('is_deleted', ['value' => 0]) ?>
    <?= $this->Form->button(__('登録')) ?>
    <p class="delete">このリストアイテムを<?= $this->Html->link('削除する', ['action' => 'delete', $bucketlist->id]) ?></p>
    <?= $this->Form->end() ?>
</fieldset>
<p><?= $this->Html->link('戻る', ['action' => 'view', $bucketlist->id]) ?></p>

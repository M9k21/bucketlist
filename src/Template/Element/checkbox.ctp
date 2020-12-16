<?= $this->Form->create('null', ['type' => 'post', 'class' => 'checkbox_form']) ?>
<?= $this->Form->hidden('bucketlist_id', ['value' => $bucketlist->id]) ?>
<?php if (!empty($bucketlist->completed)) : ?>
    <?= $this->Html->link('<i class=" fa fa-check-square"></i>', [], ['escape' => false, 'class' => 'incomplete_button']) ?>
<?php else : ?>
    <?= $this->Html->link('<i class="far fa-square"></i>', [], ['escape' => false, 'class' => 'complete_button']) ?>
<?php endif; ?>
<?= $this->Form->end() ?>

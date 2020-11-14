<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bucketlist $bucketlist
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bucketlist->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bucketlist->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bucketlist'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bucketlist form large-9 medium-8 columns content">
    <?= $this->Form->create($bucketlist) ?>
    <fieldset>
        <legend><?= __('Edit Bucketlist') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('item');
            echo $this->Form->control('detail');
            echo $this->Form->control('completed', ['empty' => true]);
            echo $this->Form->control('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

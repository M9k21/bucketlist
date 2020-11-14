<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bucketlist $bucketlist
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bucketlist'), ['action' => 'edit', $bucketlist->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bucketlist'), ['action' => 'delete', $bucketlist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bucketlist->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bucketlist'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bucketlist'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bucketlist view large-9 medium-8 columns content">
    <h3><?= h($bucketlist->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $bucketlist->has('user') ? $this->Html->link($bucketlist->user->id, ['controller' => 'Users', 'action' => 'view', $bucketlist->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= h($bucketlist->item) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Detail') ?></th>
            <td><?= h($bucketlist->detail) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bucketlist->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($bucketlist->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($bucketlist->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Completed') ?></th>
            <td><?= h($bucketlist->completed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $bucketlist->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

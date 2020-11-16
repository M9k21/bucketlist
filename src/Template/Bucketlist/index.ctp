<h2>みんなのリストをみてみよう</h2>
<ul>
    <?php shuffle($new_bucketlists); ?>
    <?php foreach ($new_bucketlists as $new_bucketlist) : ?>
        <?php if (!empty($new_bucketlist->item)) : ?>
            <li>
                <?= $this->Html->image($new_bucketlist->user->image ? 'userimage' . DS . $new_bucketlist->user->image : 'userdefault.png', ['width' => 50, 'height' => 50]) ?>
                <?= $this->Html->link($new_bucketlist->user->username, ['action' => 'collect', 'username' => $new_bucketlist->user->username]) ?>
                <?= h($new_bucketlist->item) ?>
            </li>
            <hr>
        <?php endif ?>
    <?php endforeach; ?>
</ul>

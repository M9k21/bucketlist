<h2>みんなのリスト</h2>
<div class="description">
    <p>みんなが最近達成したことを</p>
    <p>確認してみましょう！</p>
    <p>あなたがBucket Listを作成する時の</p>
    <p>参考になるかもしれません。</p>
</div>
<ul>
    <?php shuffle($new_bucketlists); ?>
    <?php foreach ($new_bucketlists as $new_bucketlist) : ?>
        <?php if (!empty($new_bucketlist->item)) : ?>
            <li class="listitem">
                <span><?= $this->Html->image($new_bucketlist->user->image ? 'userimage' . DS . $new_bucketlist->user->image : 'userdefault.png', ['width' => 40, 'height' => 40]) ?></span>
                <ul>
                    <li><?= $this->Html->link($new_bucketlist->user->username, ['action' => 'collect', 'username' => $new_bucketlist->user->username]) ?></li>
                    <li><?= h($new_bucketlist->item) ?></li>
                </ul>
            </li>
            <hr>
        <?php endif ?>
    <?php endforeach; ?>
</ul>

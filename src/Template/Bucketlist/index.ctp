<h2>みんなのリスト</h2>
<div class="description">
    <p>みんなが最近達成したことを</p>
    <p>確認してみましょう！</p>
    <p>あなたがBucket Listを作成する時の</p>
    <p>参考になるかもしれません。</p>
</div>
<ul>
    <?php foreach ($complete_bucketlists as $complete_bucketlist) : ?>
        <a href="<?= $this->Url->build(['controller'=> 'Bucketlist', 'action'=>'collect', 'username' => $complete_bucketlist->user->username]) ?>">
            <li class="listitem">
                <?= $this->Html->image($complete_bucketlist->user->image ? 'userimage' . DS . $complete_bucketlist->user->image : 'userdefault.png', ['width' => 40, 'height' => 40]) ?>
                <ul>
                    <li><?= h($complete_bucketlist->user->username) ?></li>
                    <li><?= h($complete_bucketlist->item) ?></li>
                </ul>
            </li>
        </a>
        <hr>
    <?php endforeach; ?>
</ul>

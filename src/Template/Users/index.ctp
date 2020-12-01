<?=$this->Html->image('top-image.jpeg')?>
<div id="top-introduction">
    <p>Bucket Listでは</p>
    <p>人生で実現したい</p>
    <p>100のことを登録して</p>
    <p>あなただけのリストを</p>
    <p>作成することができます</p>
</div>
<ul class="top-link">
    <li><?=$this->Html->link(__('登録する'), ['controller' => 'Users', 'action'=> 'add']) ?></li>
    <li><?=$this->Html->link(__('ログイン'), ['controller' => 'Users', 'action'=> 'login']) ?></li>
</ul>

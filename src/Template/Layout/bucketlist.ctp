<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->name . '/' . $this->request->getParam('action') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->script('https://kit.fontawesome.com/a6c1df6d9e.js" crossorigin="anonymous') ?>
</head>

<body>
    <nav class="top-bar titlebar" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns name">
            <li>
                <h1>
                    <?= $this->Html->link(__('Bucket List'), ['controller' => 'bucketlist', 'action' => 'index']) ?>
                </h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <div class="actions index medium-9 columns content">
            <?= $this->fetch('content') ?>
        </div>
        <nav class="large-2 medium-3 columns sidebar" id="actions-sidebar">
            <ul class="side-nav">
                <li>
                    <?= $this->Html->image($authuser['image'] ? 'userimage' . DS . $authuser['image'] : 'userdefault.png', ['width' => 40, 'height' => 40]) ?>
                    <?= h($authuser['username']) ?>
                    <?= $authuser['private']? ' <i class="fas fa-lock fa-s fa-fw"></i>' : '' ?>
                </li>
                <li class="heading"><?= __('Menu') ?></li>
                <li><?= $this->Html->link(__('TOP'), ['controller' => 'bucketlist', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('My List'), ['controller' => 'bucketlist', 'action' => 'collect', 'username' => $authuser['username']]) ?></li>
                <hr>
                <li><?= $this->Html->link(__('Setting'), ['controller' => 'Users', 'action' => 'view']) ?></li>
                <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
            </ul>
        </nav>
    </div>
    <footer>
    </footer>
</body>

</html>

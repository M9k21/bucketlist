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
    <?= $this->Html->css('bucketlist.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->script('https://kit.fontawesome.com/a6c1df6d9e.js" crossorigin="anonymous') ?>
</head>

<body>
    <nav class="header">
        <ul class="header-menu">
            <li>
                <h1>
                    <?= $this->Html->link(__('Bucket List'), ['controller' => 'bucketlist', 'action' => 'index']) ?>
                </h1>
            </li>
            <li class="header-menu-right">
                <ul class="header-icon">
                    <li><?= $this->Html->link('<i class="far fa-list-alt fa-lg"></i>', ['controller' => 'Bucketlist', 'action' => 'collect', 'username' => $authuser['username']], ['escape' => false]) ?></li>
                    <li><?= $this->Html->link('<i class="fas fa-cog fa-lg"></i>', ['controller' => 'Users', 'action' => 'view'], ['escape' => false]) ?></li>
                </ul>
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
    </div>
    <footer>
    </footer>
</body>

</html>

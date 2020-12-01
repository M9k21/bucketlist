<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bucket List</title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('bucketlist.css') ?>
    <?= $this->Html->css('users.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <h1 id="app-title">Bucket List</h1>
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
    <footer>
    </footer>
</body>

</html>

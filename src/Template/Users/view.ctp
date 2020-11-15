<h3>マイページ</h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Name') ?></th>
        <td><?= h($user->username) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Email') ?></th>
        <td><?= h($user->email) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Image') ?></th>
        <td>
            <?php if (!empty($user->image)) : ?>
                <?= $this->Html->image('userimage' . DS . $user->image, ['width' => 80, 'height' => 80]) ?>
            <?php else : ?>
                <?= $this->Html->image('userdefault.png', ['width' => 80, 'height' => 80]) ?>
            <?php endif; ?>
    </tr>
    <tr>
        <th scope="row"><?= __('リストの公開') ?></th>
        <td><?= $user->private ? __('非公開') : __('公開'); ?></td>
    </tr>
</table>

<?= $this->Html->link('変更する', ['controller' => 'Users', 'action' => 'edit', $user->id]) ?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exercise[]|\Cake\Collection\CollectionInterface $exercises
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Exercise'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Series'), ['controller' => 'Series', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Series'), ['controller' => 'Series', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="exercises index large-9 medium-8 columns content">
    <h3><?= __('Exercises') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_exercise') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exercises as $exercise): ?>
            <tr>
                <td><?= $this->Number->format($exercise->id) ?></td>
                <td><?= h($exercise->name_exercise) ?></td>
                <td><?= h($exercise->image) ?></td>
                <td><?= h($exercise->description) ?></td>
                <td><?= $exercise->has('user') ? $this->Html->link($exercise->user->name, ['controller' => 'Users', 'action' => 'view', $exercise->user->id]) : '' ?></td>
                <td><?= h($exercise->created) ?></td>
                <td><?= h($exercise->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $exercise->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exercise->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

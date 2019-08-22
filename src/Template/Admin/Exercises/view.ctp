<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exercise $exercise
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Exercise'), ['action' => 'edit', $exercise->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exercise'), ['action' => 'delete', $exercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Exercises'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exercise'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Series'), ['controller' => 'Series', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Series'), ['controller' => 'Series', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="exercises view large-9 medium-8 columns content">
    <h3><?= h($exercise->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name Exercise') ?></th>
            <td><?= h($exercise->name_exercise) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($exercise->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($exercise->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $exercise->has('user') ? $this->Html->link($exercise->user->name, ['controller' => 'Users', 'action' => 'view', $exercise->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($exercise->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($exercise->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($exercise->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Series') ?></h4>
        <?php if (!empty($exercise->series)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Repetitions') ?></th>
                <th scope="col"><?= __('Weight') ?></th>
                <th scope="col"><?= __('Order') ?></th>
                <th scope="col"><?= __('Exercise Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($exercise->series as $series): ?>
            <tr>
                <td><?= h($series->id) ?></td>
                <td><?= h($series->repetitions) ?></td>
                <td><?= h($series->weight) ?></td>
                <td><?= h($series->order) ?></td>
                <td><?= h($series->exercise_id) ?></td>
                <td><?= h($series->created) ?></td>
                <td><?= h($series->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Series', 'action' => 'view', $series->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Series', 'action' => 'edit', $series->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Series', 'action' => 'delete', $series->id], ['confirm' => __('Are you sure you want to delete # {0}?', $series->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

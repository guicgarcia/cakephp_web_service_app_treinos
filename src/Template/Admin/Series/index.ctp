<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Series[]|\Cake\Collection\CollectionInterface $series
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Series'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="series index large-9 medium-8 columns content">
    <h3><?= __('Series') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('repetitions') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weight') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order') ?></th>
                <th scope="col"><?= $this->Paginator->sort('exercise_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($series as $series): ?>
            <tr>
                <td><?= $this->Number->format($series->id) ?></td>
                <td><?= $this->Number->format($series->repetitions) ?></td>
                <td><?= $this->Number->format($series->weight) ?></td>
                <td><?= $this->Number->format($series->order) ?></td>
                <td><?= $series->has('exercise') ? $this->Html->link($series->exercise->id, ['controller' => 'Exercises', 'action' => 'view', $series->exercise->id]) : '' ?></td>
                <td><?= h($series->created) ?></td>
                <td><?= h($series->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $series->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $series->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $series->id], ['confirm' => __('Are you sure you want to delete # {0}?', $series->id)]) ?>
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

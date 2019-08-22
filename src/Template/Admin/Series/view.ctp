<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Series $series
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Series'), ['action' => 'edit', $series->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Series'), ['action' => 'delete', $series->id], ['confirm' => __('Are you sure you want to delete # {0}?', $series->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Series'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Series'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="series view large-9 medium-8 columns content">
    <h3><?= h($series->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Exercise') ?></th>
            <td><?= $series->has('exercise') ? $this->Html->link($series->exercise->id, ['controller' => 'Exercises', 'action' => 'view', $series->exercise->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($series->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Repetitions') ?></th>
            <td><?= $this->Number->format($series->repetitions) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weight') ?></th>
            <td><?= $this->Number->format($series->weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $this->Number->format($series->order) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($series->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($series->modified) ?></td>
        </tr>
    </table>
</div>

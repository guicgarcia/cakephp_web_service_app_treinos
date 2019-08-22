<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Series $series
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $series->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $series->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Series'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="series form large-9 medium-8 columns content">
    <?= $this->Form->create($series) ?>
    <fieldset>
        <legend><?= __('Edit Series') ?></legend>
        <?php
            echo $this->Form->control('repetitions');
            echo $this->Form->control('weight');
            echo $this->Form->control('order');
            echo $this->Form->control('exercise_id', ['options' => $exercises, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

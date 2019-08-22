<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exercise $exercise
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Exercises'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Series'), ['controller' => 'Series', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Series'), ['controller' => 'Series', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="exercises form large-9 medium-8 columns content">
    <?= $this->Form->create($exercise) ?>
    <fieldset>
        <legend><?= __('Add Exercise') ?></legend>
        <?php
            echo $this->Form->control('name_exercise');
            echo $this->Form->control('image');
            echo $this->Form->control('description');
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Series $series
 */
 
use Cake\Datasource\ConnectionManager; 
 
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Series'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="series form large-9 medium-8 columns content">
    <?= $this->Form->create($series) ?>
    <fieldset>
        <legend><?= __('Add Series') ?></legend>
        <?php
            echo $this->Form->control('repetitions');
            echo $this->Form->control('weight');
            echo $this->Form->control('order_exercise');
            
            $connection = ConnectionManager::get('default');
            $results = $connection->execute(
                'SELECT id FROM exercises ORDER BY id DESC limit 1;'
            )->fetchAll('assoc');
        ?>
        <input type="hidden" name="exercise_id" value="<?php echo 1; ?>">
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

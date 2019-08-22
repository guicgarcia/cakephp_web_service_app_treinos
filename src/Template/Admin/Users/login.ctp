<div class="users form large-12 medium-12 columns content">
    <h1>Página de login</h1>
    <?= $this->Form->create() ?>
    <fieldset>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Acessar')) ?>
    <?= $this->Form->end() ?>
</div>

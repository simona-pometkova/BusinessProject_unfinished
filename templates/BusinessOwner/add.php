<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BusinessOwner $businessOwner
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Business Owner'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="businessOwner form content">
            <?= $this->Form->create($businessOwner) ?>
            <fieldset>
                <legend><?= __('Add business owner') ?></legend>
                <?php
                    echo $this->Form->control('email');
                    echo $this->Form->control('first_name', ['label' => 'First name']);
                    echo $this->Form->control('last_name', ['label' => 'Surname']);
                //    echo $this->Form->control('num_of_businesses', ['label' => 'Number of owned businesses', 'empty' => 0]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

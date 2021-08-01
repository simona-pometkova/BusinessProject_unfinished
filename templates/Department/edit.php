<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department $department
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $department->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $department->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Department'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="department form content">
            <?= $this->Form->create($department) ?>
            <fieldset>
                <legend><?= __('Edit Department') ?></legend>
                <?php
                    echo $this->Form->control('business_id', ['options' => $business]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('address');
                    echo $this->Form->control('manager');
                    echo $this->Form->control('num_of_employees');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

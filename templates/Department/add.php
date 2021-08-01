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
            <?= $this->Html->link(__('List Department'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="department form content">
            <?= $this->Form->create($department) ?>
            <fieldset>
                <legend><?= __('Add department') ?></legend>
                <?php
                    echo $this->Form->control('business_id', ['options' => $business]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('address');
                    //Показва ми само един работник. Не мога да разбера защо.
                    echo $this->Form->control('manager', ['options' => $empSelect]); //manager has to be one of the employees
                    //echo $this->Form->control('num_of_employees', ['label' => 'Number of employees']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeeQualification $employeeQualification
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $employeeQualification->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $employeeQualification->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Employee Qualification'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="employeeQualification form content">
            <?= $this->Form->create($employeeQualification) ?>
            <fieldset>
                <legend><?= __('Edit Employee Qualification') ?></legend>
                <?php
                    echo $this->Form->control('employee_id', ['options' => $employee]);
                    echo $this->Form->control('qualification_id', ['options' => $qualification]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

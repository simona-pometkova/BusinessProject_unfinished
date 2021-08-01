<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JobHistory $jobHistory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Job History'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="jobHistory form content">
            <?= $this->Form->create($jobHistory) ?>
            <fieldset>
                <legend><?= __('Add job history entry') ?></legend>
                <?php
                    echo $this->Form->control('emp_id', ['options' => $employee, 'label' => 'Employee']);
                    echo $this->Form->control('hire_date', ['label' => 'Hire date']);
                    echo $this->Form->control('leave_date', ['label' => 'Leave date']);
                    echo $this->Form->control('company');
                    echo $this->Form->control('position');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

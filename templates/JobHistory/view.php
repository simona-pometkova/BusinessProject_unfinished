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
            <?= $this->Html->link(__('Edit Job History'), ['action' => 'edit', $jobHistory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Job History'), ['action' => 'delete', $jobHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobHistory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Job History'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Job History'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="jobHistory view content">
            <h3><?= h($jobHistory->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Employee') ?></th>
                    <td><?= $jobHistory->has('employee') ? $this->Html->link($jobHistory->employee->id, ['controller' => 'Employee', 'action' => 'view', $jobHistory->employee->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Company') ?></th>
                    <td><?= h($jobHistory->company) ?></td>
                </tr>
                <tr>
                    <th><?= __('Position') ?></th>
                    <td><?= h($jobHistory->position) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($jobHistory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hire Date') ?></th>
                    <td><?= h($jobHistory->hire_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Leave Date') ?></th>
                    <td><?= h($jobHistory->leave_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

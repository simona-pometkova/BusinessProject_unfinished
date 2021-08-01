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
            <?= $this->Html->link(__('Edit Employee Qualification'), ['action' => 'edit', $employeeQualification->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Employee Qualification'), ['action' => 'delete', $employeeQualification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeQualification->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Employee Qualification'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Employee Qualification'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="employeeQualification view content">
            <h3><?= h($employeeQualification->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Employee') ?></th>
                    <td><?= $employeeQualification->has('employee') ? $this->Html->link($employeeQualification->employee->id, ['controller' => 'Employee', 'action' => 'view', $employeeQualification->employee->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Qualification') ?></th>
                    <td><?= $employeeQualification->has('qualification') ? $this->Html->link($employeeQualification->qualification->name, ['controller' => 'Qualification', 'action' => 'view', $employeeQualification->qualification->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($employeeQualification->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

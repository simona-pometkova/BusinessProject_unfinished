<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeeQualification[]|\Cake\Collection\CollectionInterface $employeeQualification
 */
?>
<div class="employeeQualification index content">
    <?= $this->Html->link(__('New Employee Qualification'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Employee Qualification') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('employee_id') ?></th>
                    <th><?= $this->Paginator->sort('qualification_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employeeQualification as $employeeQualification): ?>
                <tr>
                    <td><?= $this->Number->format($employeeQualification->id) ?></td>
                    <td><?= $employeeQualification->has('employee') ? $this->Html->link($employeeQualification->employee->id, ['controller' => 'Employee', 'action' => 'view', $employeeQualification->employee->id]) : '' ?></td>
                    <td><?= $employeeQualification->has('qualification') ? $this->Html->link($employeeQualification->qualification->name, ['controller' => 'Qualification', 'action' => 'view', $employeeQualification->qualification->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $employeeQualification->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employeeQualification->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employeeQualification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeQualification->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

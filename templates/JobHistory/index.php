<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JobHistory[]|\Cake\Collection\CollectionInterface $jobHistory
 */
?>
<div class="jobHistory index content">
    <?= $this->Html->link(__('New Job History'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Job History') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('emp_id') ?></th>
                    <th><?= $this->Paginator->sort('hire_date') ?></th>
                    <th><?= $this->Paginator->sort('leave_date') ?></th>
                    <th><?= $this->Paginator->sort('company') ?></th>
                    <th><?= $this->Paginator->sort('position') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jobHistory as $jobHistory): ?>
                <tr>
                    <td><?= $this->Number->format($jobHistory->id) ?></td>
                    <td><?= $jobHistory->has('employee') ? $this->Html->link($jobHistory->employee->id, ['controller' => 'Employee', 'action' => 'view', $jobHistory->employee->id]) : '' ?></td>
                    <td><?= h($jobHistory->hire_date) ?></td>
                    <td><?= h($jobHistory->leave_date) ?></td>
                    <td><?= h($jobHistory->company) ?></td>
                    <td><?= h($jobHistory->position) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $jobHistory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $jobHistory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $jobHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobHistory->id)]) ?>
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

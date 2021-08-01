<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department[]|\Cake\Collection\CollectionInterface $department
 */
?>
<div class="department index content">
    <?= $this->Html->link(__('New Department'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Department') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('business_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('manager') ?></th>
                    <th><?= $this->Paginator->sort('num_of_employees') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($department as $department): ?>
                <tr>
                    <td><?= $this->Number->format($department->id) ?></td>
                    <td><?= $department->has('busines') ? $this->Html->link($department->busines->name, ['controller' => 'Business', 'action' => 'view', $department->busines->id]) : '' ?></td>
                    <td><?= h($department->name) ?></td>
                    <td><?= h($department->address) ?></td>
                    <td><?= h($department->manager) ?></td>
                    <td><?= $this->Number->format($department->num_of_employees) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $department->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $department->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $department->id], ['confirm' => __('Are you sure you want to delete # {0}?', $department->id)]) ?>
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

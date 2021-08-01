<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QualificationService[]|\Cake\Collection\CollectionInterface $qualificationService
 */
?>
<div class="qualificationService index content">
    <?= $this->Html->link(__('New Qualification Service'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Qualification Service') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('qualification_id') ?></th>
                    <th><?= $this->Paginator->sort('service_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($qualificationService as $qualificationService): ?>
                <tr>
                    <td><?= $this->Number->format($qualificationService->id) ?></td>
                    <td><?= $qualificationService->has('qualification') ? $this->Html->link($qualificationService->qualification->name, ['controller' => 'Qualification', 'action' => 'view', $qualificationService->qualification->id]) : '' ?></td>
                    <td><?= $qualificationService->has('service') ? $this->Html->link($qualificationService->service->name, ['controller' => 'Service', 'action' => 'view', $qualificationService->service->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $qualificationService->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $qualificationService->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $qualificationService->id], ['confirm' => __('Are you sure you want to delete # {0}?', $qualificationService->id)]) ?>
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

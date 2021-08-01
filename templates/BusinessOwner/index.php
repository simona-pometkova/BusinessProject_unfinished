<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BusinessOwner[]|\Cake\Collection\CollectionInterface $businessOwner
 */
?>
<div class="businessOwner index content">
    <?= $this->Html->link(__('New Business Owner'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Business Owner') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('num_of_businesses') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($businessOwner as $businessOwner): ?>
                <tr>
                    <!-- Показва пак някакви warnings за хедъри, undefined variables & etc. -->
                    <td><?= $this->Number->format($businessOwner->id) ?></td>
                    <td><?= h($businessOwner->email) ?></td>
                    <td><?= h($businessOwner->first_name) ?></td>
                    <td><?= h($businessOwner->last_name) ?></td>
                    <td><?= $this->Number->format($businessOwner->num_of_businesses) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $businessOwner->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $businessOwner->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $businessOwner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $businessOwner->id)]) ?>
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

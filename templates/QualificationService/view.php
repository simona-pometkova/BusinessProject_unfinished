<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QualificationService $qualificationService
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Qualification Service'), ['action' => 'edit', $qualificationService->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Qualification Service'), ['action' => 'delete', $qualificationService->id], ['confirm' => __('Are you sure you want to delete # {0}?', $qualificationService->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Qualification Service'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Qualification Service'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="qualificationService view content">
            <h3><?= h($qualificationService->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Qualification') ?></th>
                    <td><?= $qualificationService->has('qualification') ? $this->Html->link($qualificationService->qualification->name, ['controller' => 'Qualification', 'action' => 'view', $qualificationService->qualification->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Service') ?></th>
                    <td><?= $qualificationService->has('service') ? $this->Html->link($qualificationService->service->name, ['controller' => 'Service', 'action' => 'view', $qualificationService->service->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($qualificationService->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

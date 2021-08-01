<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BusinessOwner $businessOwner
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Business Owner'), ['action' => 'edit', $businessOwner->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Business Owner'), ['action' => 'delete', $businessOwner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $businessOwner->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Business Owner'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Business Owner'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="businessOwner view content">
            <h3><?= h($businessOwner->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($businessOwner->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($businessOwner->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($businessOwner->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($businessOwner->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Num Of Businesses') ?></th>
                    <td><?= $this->Number->format($businessOwner->num_of_businesses) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

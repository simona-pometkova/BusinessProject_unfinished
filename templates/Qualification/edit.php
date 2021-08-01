<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Qualification $qualification
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $qualification->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $qualification->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Qualification'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="qualification form content">
            <?= $this->Form->create($qualification) ?>
            <fieldset>
                <legend><?= __('Edit Qualification') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('employee._ids', ['options' => $employee]);
                    echo $this->Form->control('service._ids', ['options' => $service]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

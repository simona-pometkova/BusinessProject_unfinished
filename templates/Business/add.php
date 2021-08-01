<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Busines $busines
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Business'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="business form content">
            <?= $this->Form->create($busines) ?>
            <fieldset>
                <legend><?= __('Add business') ?></legend>
                <?php
                    echo $this->Form->control('owner_id', ['options' => $businessSelect]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('founding_date', ['label' => 'Founding date']);
                    echo $this->Form->control('address', ['label' => 'Headquarters address']);
                    echo $this->Form->control('type', ['options' => $businessTypes]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

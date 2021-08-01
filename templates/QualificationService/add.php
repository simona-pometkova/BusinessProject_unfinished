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
            <?= $this->Html->link(__('List Qualification Service'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="qualificationService form content">
            <?= $this->Form->create($qualificationService) ?>
            <fieldset>
                <legend><?= __('Add Qualification Service') ?></legend>
                <?php
                    echo $this->Form->control('qualification_id', ['options' => $qualification]);
                    echo $this->Form->control('service_id', ['options' => $service]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

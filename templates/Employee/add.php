<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Employee'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="employee form content">
            <?= $this->Form->create($employee) ?>
            <fieldset>
                <legend><?= __('Add employee') ?></legend>
                <?php
                    echo $this->Form->control('dept_id', [
                                              'options' => $department,
                                              'empty' => 'Select department']);
                    echo $this->Form->control('first_name', ['label' => 'First name']);
                    echo $this->Form->control('last_name', ['label' => 'Surname']);
                    echo $this->Form->control('address');
                    echo $this->Form->control('qualification._ids', ['options' => $qualification, 'label' => 'Qualifications']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<!-- <script type='text/javascript'>
    $('#dept-id').select2();
    $('#dept-id').change(function(){
        alert($(this).val());
    });
</script> -->

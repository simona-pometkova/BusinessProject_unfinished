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
            <?= $this->Html->link(__('Edit Qualification'), ['action' => 'edit', $qualification->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Qualification'), ['action' => 'delete', $qualification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $qualification->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Qualification'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Qualification'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="qualification view content">
            <h3><?= h($qualification->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($qualification->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($qualification->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Employee') ?></h4>
                <?php if (!empty($qualification->employee)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Dept Id') ?></th>
                            <th><?= __('First Name') ?></th>
                            <th><?= __('Last Name') ?></th>
                            <th><?= __('Address') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($qualification->employee as $employee) : ?>
                        <tr>
                            <td><?= h($employee->id) ?></td>
                            <td><?= h($employee->dept_id) ?></td>
                            <td><?= h($employee->first_name) ?></td>
                            <td><?= h($employee->last_name) ?></td>
                            <td><?= h($employee->address) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Employee', 'action' => 'view', $employee->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Employee', 'action' => 'edit', $employee->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employee', 'action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Service') ?></h4>
                <?php if (!empty($qualification->service)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Business Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Cost') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($qualification->service as $service) : ?>
                        <tr>
                            <td><?= h($service->id) ?></td>
                            <td><?= h($service->business_id) ?></td>
                            <td><?= h($service->name) ?></td>
                            <td><?= h($service->cost) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Service', 'action' => 'view', $service->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Service', 'action' => 'edit', $service->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Service', 'action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

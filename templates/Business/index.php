<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Busines[]|\Cake\Collection\CollectionInterface $business
 */
?>
<div class="business index content">
    <?= $this->Html->link(__('New Busines'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Business') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                <!-- Показва само един рекърд. -->
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('owner_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('founding_date') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($businesses as $busines): ?>
                <tr>
                    <td><?= $this->Number->format($busines->id) ?></td>
                    <!-- Не искам само last_name да се показва, а също и first_name. -->
                    <?php 
                        if ($busines->has('business_owner')) {
                            $name = $busines->business_owner->first_name.' '.$busines->business_owner->last_name;
                        } else {
                            $name = '';
                        }
                    ?>
                    <td><?= $busines->has('business_owner') ? $this->Html->link($name, ['controller' => 'BusinessOwner', 
                                                                                         'action' => 'view'
                    ]) : '' ?></td>
                    <!-- След като се опитах да променя в контролера.
                    <td><?= $busines->has('business_owner') ? h($businessOwner[$busines->owner]) : '' ?></td> -->

                    <td><?= h($busines->name) ?></td>

                    <!-- Не разбирам защо тази част не работи.
                    <?php 
                        $time = new DateTime();
                        $formatter = new IntlDateFormatter($busines['founding_date'], IntlDateFormatter::MEDIUM, IntlDateFormatter::NONE);
                        $formatter->format($time);
                    ?>
                    <td><?= h($formatter) ?></td> -->

                    <!-- Това тук работи, но показва часа, а аз не искам. -->
                    <td><?= $this->Time->format($busines->founding_date, \IntlDateFormatter::MEDIUM, null, 'Europe/Sofia') ?> 

                    <!-- Това е оригиналния код. 
                    <td><?= h($busines->founding_date) ?></td> --> 
                    <td><?= h($busines->address) ?></td>
                    <td><?= h($businessTypes[$busines->type]) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $busines->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $busines->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $busines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $busines->id)]) ?>
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

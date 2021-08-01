<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JobHistory Entity
 *
 * @property int $id
 * @property int $emp_id
 * @property \Cake\I18n\FrozenDate $hire_date
 * @property \Cake\I18n\FrozenDate $leave_date
 * @property string $company
 * @property string $position
 *
 * @property \App\Model\Entity\Employee $employee
 */
class JobHistory extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'emp_id' => true,
        'hire_date' => true,
        'leave_date' => true,
        'company' => true,
        'position' => true,
        'employee' => true,
    ];
}

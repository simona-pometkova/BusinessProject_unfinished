<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmployeeQualification Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property int $qualification_id
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Qualification $qualification
 */
class EmployeeQualification extends Entity
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
        'employee_id' => true,
        'qualification_id' => true,
        'employee' => true,
        'qualification' => true,
    ];
}

<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QualificationService Entity
 *
 * @property int $id
 * @property int $qualification_id
 * @property int $service_id
 *
 * @property \App\Model\Entity\Qualification $qualification
 * @property \App\Model\Entity\Service $service
 */
class QualificationService extends Entity
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
        'qualification_id' => true,
        'service_id' => true,
        'qualification' => true,
        'service' => true,
    ];
}

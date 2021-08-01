<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Qualification Model
 *
 * @property \App\Model\Table\EmployeeTable&\Cake\ORM\Association\BelongsToMany $Employee
 * @property \App\Model\Table\ServiceTable&\Cake\ORM\Association\BelongsToMany $Service
 *
 * @method \App\Model\Entity\Qualification newEmptyEntity()
 * @method \App\Model\Entity\Qualification newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Qualification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Qualification get($primaryKey, $options = [])
 * @method \App\Model\Entity\Qualification findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Qualification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Qualification[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Qualification|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Qualification saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Qualification[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Qualification[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Qualification[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Qualification[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class QualificationTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('qualification');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Employee', [
            'foreignKey' => 'qualification_id',
            'targetForeignKey' => 'employee_id',
            'joinTable' => 'employee_qualification',
        ]);
        $this->belongsToMany('Service', [
            'foreignKey' => 'qualification_id',
            'targetForeignKey' => 'service_id',
            'joinTable' => 'qualification_service',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}

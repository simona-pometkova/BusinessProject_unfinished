<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobHistory Model
 *
 * @property \App\Model\Table\EmployeeTable&\Cake\ORM\Association\BelongsTo $Employee
 *
 * @method \App\Model\Entity\JobHistory newEmptyEntity()
 * @method \App\Model\Entity\JobHistory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\JobHistory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobHistory get($primaryKey, $options = [])
 * @method \App\Model\Entity\JobHistory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\JobHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JobHistory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobHistory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobHistory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobHistory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\JobHistory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\JobHistory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\JobHistory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class JobHistoryTable extends Table
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

        $this->setTable('job_history');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Employee', [
            'foreignKey' => 'emp_id',
            'joinType' => 'INNER',
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
            ->date('hire_date')
            ->requirePresence('hire_date', 'create')
            ->notEmptyDate('hire_date');

        $validator
            ->date('leave_date')
            ->requirePresence('leave_date', 'create')
            ->notEmptyDate('leave_date');

        $validator
            ->scalar('company')
            ->maxLength('company', 50)
            ->requirePresence('company', 'create')
            ->notEmptyString('company');

        $validator
            ->scalar('position')
            ->maxLength('position', 32)
            ->requirePresence('position', 'create')
            ->notEmptyString('position');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['emp_id'], 'Employee'), ['errorField' => 'emp_id']);

        return $rules;
    }
}

<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QualificationService Model
 *
 * @property \App\Model\Table\QualificationTable&\Cake\ORM\Association\BelongsTo $Qualification
 * @property \App\Model\Table\ServiceTable&\Cake\ORM\Association\BelongsTo $Service
 *
 * @method \App\Model\Entity\QualificationService newEmptyEntity()
 * @method \App\Model\Entity\QualificationService newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\QualificationService[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QualificationService get($primaryKey, $options = [])
 * @method \App\Model\Entity\QualificationService findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\QualificationService patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QualificationService[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\QualificationService|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QualificationService saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QualificationService[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QualificationService[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\QualificationService[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QualificationService[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class QualificationServiceTable extends Table
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

        $this->setTable('qualification_service');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Qualification', [
            'foreignKey' => 'qualification_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Service', [
            'foreignKey' => 'service_id',
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
        $rules->add($rules->existsIn(['qualification_id'], 'Qualification'), ['errorField' => 'qualification_id']);
        $rules->add($rules->existsIn(['service_id'], 'Service'), ['errorField' => 'service_id']);

        return $rules;
    }
}

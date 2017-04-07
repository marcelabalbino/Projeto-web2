<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Comprovantes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Files
 * @property \Cake\ORM\Association\BelongsTo $Files
 *
 * @method \App\Model\Entity\Comprovante get($primaryKey, $options = [])
 * @method \App\Model\Entity\Comprovante newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Comprovante[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Comprovante|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comprovante patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Comprovante[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Comprovante findOrCreate($search, callable $callback = null, $options = [])
 */
class ComprovantesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('comprovantes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Files', [
            'foreignKey' => 'boleto_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Files', [
            'foreignKey' => 'recibo_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->date('vencimento')
            ->requirePresence('vencimento', 'create')
            ->notEmpty('vencimento');

        $validator
            ->date('pagamento')
            ->requirePresence('pagamento', 'create')
            ->notEmpty('pagamento');

        $validator
            ->boolean('aproved')
            ->requirePresence('aproved', 'create')
            ->notEmpty('aproved');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['boleto_id'], 'Files'));
        $rules->add($rules->existsIn(['recibo_id'], 'Files'));

        return $rules;
    }
}

<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Articles', [
            'foreignKey' => 'user_id',
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
            ->uuid('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('first_name')
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);



        $validator
            ->scalar('password')
            ->maxLength('password', 64)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');


//        $validator
//            ->scalar('image')
//            ->requirePresence('image', 'input')
//            ->add('image', [
//                'validExtension' => [
//                    'rule' => ['extension',['jpeg', 'png', 'jpg']],
//                    'message' => 'These files extension are allowed: .jpeg, .png, .jpg'
//                ]]);


        return $validator
            ->notEmptyString('email', 'An email is required')
            ->email('email')
            ->notEmptyString('password', 'A password is required')
            ->notEmptyString('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'author']],
                'message' => 'Please enter a valid role'
            ]);
    }

    public function validationPassword(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('current_password')
            ->add('current_password', 'custom', ['rule' => function ($value, $context) {
                $user = $this->get($context['data']['id']);
                if ($user) {
                    if ((new DefaultPasswordHasher())->check($value, $user->password)) {
                        return true;
                    }
                }
                return false;
            },
                'message' => 'The old password does not match the current password!',
            ])
            ->notEmptyString('current_password');

        $validator
            ->add('password', [
                'length' => [
                    'rule' => ['minLength', 4],
                    'message' => 'The password have to be at least 4 characters!',
                ]
            ]);
        $validator
            ->add('new_password',[
                'match' => [
                    'rule' => ['compareWith', 'confirm_password'],
                    'message' => 'The passwords does not match!',
                ],
            ])
            ->notEmptyString('new_password');

        $validator
            ->add('confirm_password', [
                'match' => [
                    'rule' => ['compareWith', 'new_password'],
                    'message' => 'The passwords does not match!',
                ]
            ])
            ->notEmptyString('confirm_password');

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
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->existsIn(['role_id'], 'Roles'), ['errorField' => 'role_id']);

        return $rules;
    }
}

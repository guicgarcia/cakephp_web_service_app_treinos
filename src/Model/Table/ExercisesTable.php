<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

/**
 * Exercises Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\SeriesTable|\Cake\ORM\Association\HasMany $Series
 *
 * @method \App\Model\Entity\Exercise get($primaryKey, $options = [])
 * @method \App\Model\Entity\Exercise newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Exercise[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Exercise|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exercise|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exercise patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Exercise[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Exercise findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExercisesTable extends Table
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

        $this->setTable('exercises');
        $this->setDisplayField('name_exercise');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Series', [
            'foreignKey' => 'exercise_id'
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
            ->scalar('name_exercise')
            ->maxLength('name_exercise', 255)
            ->allowEmpty('name_exercise');

        $validator
            ->scalar('image')
            ->maxLength('image', 500)
            ->allowEmpty('image');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

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

        return $rules;
    }
    
    public function listar($id) 
    {
        $connection = ConnectionManager::get('default');
        // $results = $connection->execute(
        //     'SELECT e.id, e.name_exercise, e.image, e.description   
        //      FROM exercises e
        //      LEFT JOIN series s ON e.id = s.exercise_id    
        //     '
        // )->fetchAll('assoc');
        
        $results = $connection->execute(
            'SELECT e.id, e.name_exercise, e.image, e.description, e.user_id
             FROM exercises e  
             WHERE e.user_id =:id
            ', 
            ['id' => $id] 
        )->fetchAll('assoc');
    
//         $query = $this->find()
// 			->select(['id', 'name_exercise', 'image', 'description'])
// 			->where([ 'Exercises.user_id' => $id ]);
			
		//return $query;	
        
        return $results;
        
    }
    
    public function viewExercise($id) 
    {
        $connection = ConnectionManager::get('default');
        $results = $connection->execute(
            'SELECT s.repetitions, s.weight, s.order_exercise  
             FROM exercises e 
             INNER JOIN series s ON e.id = s.exercise_id
             WHERE e.id =:id
             ',  [ 'id'  =>  $id ]
        )->fetchAll('assoc');
        
        //var_dump($results);
        //exit();
        
        return $results;
    }
    
}

<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Video Model
 *
 * @method \App\Model\Entity\Video newEmptyEntity()
 * @method \App\Model\Entity\Video newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Video[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Video get($primaryKey, $options = [])
 * @method \App\Model\Entity\Video findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Video patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Video[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Video|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Video saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Video[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Video[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Video[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Video[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VideoTable extends Table
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

        $this->setTable('video');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
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
            ->scalar('title')
            ->maxLength('title', 250)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('short_desc')
            ->requirePresence('short_desc', 'create')
            ->notEmptyString('short_desc');

        $validator
            ->scalar('url')
            ->maxLength('url', 100)
            ->requirePresence('url', 'create')
            ->notEmptyString('url');

        $validator
            ->scalar('videoId')
            ->maxLength('videoId', 10)
            ->requirePresence('videoId', 'create')
            ->notEmptyString('videoId');

        $validator
            ->scalar('type')
            ->maxLength('type', 10)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->scalar('quality')
            ->maxLength('quality', 50)
            ->requirePresence('quality', 'create')
            ->notEmptyString('quality');

        $validator
            ->scalar('thumbnail')
            ->maxLength('thumbnail', 850)
            ->requirePresence('thumbnail', 'create')
            ->notEmptyString('thumbnail');

        $validator
            ->scalar('channelId')
            ->maxLength('channelId', 50)
            ->requirePresence('channelId', 'create')
            ->notEmptyString('channelId');

        return $validator;
    }
}

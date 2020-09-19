<?php

namespace rest\versions\v1\models;

use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributesBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class Post extends \common\models\Post
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'author_id',
                'updatedByAttribute' => 'author_id',
            ],
            [
                'class' => AttributesBehavior::className(),
                'attributes' => [
                    'published_at' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => new Expression('NOW()'),
                    ],
                    'updated_at' => [
                        ActiveRecord::EVENT_BEFORE_UPDATE => new Expression('NOW()'),
                    ],
                    'status' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => 'published'
                    ]
                ]
            ]
        ];
    }
}
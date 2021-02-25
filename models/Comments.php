<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int|null $id
 * @property int|null $postId
 * @property string|null $name
 * @property string|null $email
 * @property string|null $body
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'postId'], 'integer'],
            [['body'], 'string'],
            [['name', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'postId' => 'Post ID',
            'name' => 'Name',
            'email' => 'Email',
            'body' => 'Body',
        ];
    }

    /**
     * {@inheritdoc}
     * @return CommentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentsQuery(get_called_class());
    }
}

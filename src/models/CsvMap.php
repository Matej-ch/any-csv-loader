<?php

namespace matejch\anyCsvLoader\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;

/**
 * This is the model class for table "csv_map".
 *
 * @property int $id
 * @property string $name
 * @property string|null $values
 */
class CsvMap extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'csv_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'unique'],
            [['name'], 'string', 'max' => 1024],
            [['values'], 'string'],
            [['name', 'values'], 'trim'],
            [['values'], 'validateFormat'],
            [['name'], 'filter', 'filter' => 'strip_tags', 'skipOnArray' => true],
        ];
    }

    public function validateFormat($attribute, $params): void
    {

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('anyCsvLoader/model', 'ID'),
            'name' => Yii::t('anyCsvLoader/model', 'name'),
            'values' => Yii::t('anyCsvLoader/model', 'values'),
        ];
    }
}
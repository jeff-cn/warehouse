<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "warehouses".
 *
 * @property integer $id
 * @property string $name
 * @property string $address_street
 * @property string $address_city
 * @property string $address_state
 * @property string $address_zip
 * @property string $address_country
 *
 * @property Transfer[] $transfers
 * @property Transfer[] $transfers0
 */
class Warehouse extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'warehouses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'address_street', 'address_city', 'address_zip', 'address_country'], 'required'],
            [['id'], 'integer'],
            [['name', 'address_street', 'address_city', 'address_state', 'address_zip', 'address_country'], 'string'],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address_street' => 'Address Street',
            'address_city' => 'Address City',
            'address_state' => 'Address State',
            'address_zip' => 'Address Zip',
            'address_country' => 'Address Country',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getOutgoingTransfers()
    {
        return $this->hasMany(Transfer::className(), ['sender_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getIncomingTransfers()
    {
        return $this->hasMany(Transfer::className(), ['receiver_id' => 'id']);
    }
}

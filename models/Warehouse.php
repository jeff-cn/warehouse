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
 * @property Box[] $boxes
 * @property TransferAccept[] $incomingTransferAccepts
 * @property TransferAccept[] $outgoingTransferAccepts
 * @property TransferRequest[] $incomingTransferRequests
 * @property TransferRequest[] $outgoingtransferRequests
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
    public function getBoxes()
    {
        return $this->hasMany(Box::className(), ['dislocation_warehouse_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getOutgoingTransferAccepts()
    {
        return $this->hasMany(TransferAccept::className(), ['sender_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getOutgoingTransferRequests()
    {
        return $this->hasMany(TransferRequest::className(), ['sender_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getIncomingTransferAccepts()
    {
        return $this->hasMany(TransferAccept::className(), ['receiver_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getIncomingTransferRequests()
    {
        return $this->hasMany(TransferRequest::className(), ['receiver_id' => 'id']);
    }
}

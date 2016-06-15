<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "boxes".
 *
 * @property integer $id
 * @property string $barcode
 * @property double $width
 * @property double $height
 * @property double $length
 * @property integer $status
 *
 * @property TransferItem[] $transferItems
 * @property TransferAccept[] $transferAccepts
 * @property TransferRequest[] $transferRequests
 */
class Box extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'boxes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'barcode', 'width', 'height', 'length', 'status'], 'required'],
            [['id', 'status'], 'integer'],
            [['barcode'], 'string'],
            [['width', 'height', 'length'], 'number'],
            [['barcode'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'barcode' => 'Barcode',
            'width' => 'Width',
            'height' => 'Height',
            'length' => 'Length',
            'status' => 'Status',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getTransferItems()
    {
        return $this->hasMany(TransferItem::className(), ['box_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getTransferAccepts()
    {
        return $this->hasMany(TransferAccept::className(), ['id' => 'transfer_accept_id'])->viaTable('transfer_items', ['box_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getTransferRequests()
    {
        return $this->hasMany(TransferRequest::className(), ['id' => 'transfer_request_id'])->viaTable('transfer_items', ['box_id' => 'id']);
    }
}

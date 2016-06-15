<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "transfer_items".
 *
 * @property integer $id
 * @property integer $transfer_request_id
 * @property integer $transfer_accept_id
 * @property integer $box_id
 * @property integer $status
 *
 * @property Box $box
 * @property TransferAccept $transferAccept
 * @property TransferRequest $transferRequest
 */
class TransferItem extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transfer_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'transfer_request_id', 'transfer_accept_id', 'box_id', 'status'], 'required'],
            [['id', 'transfer_request_id', 'transfer_accept_id', 'box_id', 'status'], 'integer'],
            [['box_id', 'status'], 'unique', 'targetAttribute' => ['box_id', 'status'], 'message' => 'The combination of Box ID and Status has already been taken.'],
            [['transfer_accept_id', 'box_id'], 'unique', 'targetAttribute' => ['transfer_accept_id', 'box_id'], 'message' => 'The combination of Transfer Accept ID and Box ID has already been taken.'],
            [['transfer_request_id', 'box_id'], 'unique', 'targetAttribute' => ['transfer_request_id', 'box_id'], 'message' => 'The combination of Transfer Request ID and Box ID has already been taken.'],
            [['box_id'], 'exist', 'skipOnError' => true, 'targetClass' => Box::className(), 'targetAttribute' => ['box_id' => 'id']],
            [['transfer_accept_id'], 'exist', 'skipOnError' => true, 'targetClass' => TransferAccept::className(), 'targetAttribute' => ['transfer_accept_id' => 'id']],
            [['transfer_request_id'], 'exist', 'skipOnError' => true, 'targetClass' => TransferRequest::className(), 'targetAttribute' => ['transfer_request_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'transfer_request_id' => 'Transfer Request ID',
            'transfer_accept_id' => 'Transfer Accept ID',
            'box_id' => 'Box ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getBox()
    {
        return $this->hasOne(Box::className(), ['id' => 'box_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getTransferAccept()
    {
        return $this->hasOne(TransferAccept::className(), ['id' => 'transfer_accept_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getTransferRequest()
    {
        return $this->hasOne(TransferRequest::className(), ['id' => 'transfer_request_id']);
    }
}

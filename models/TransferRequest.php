<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "transfer_requests".
 *
 * @property integer $id
 * @property integer $sender_id
 * @property integer $receiver_id
 * @property string $reference_number
 * @property string $ts_created
 * @property string $ts_updated
 * @property integer $status
 *
 * @property TransferItem[] $transferItems
 * @property Box[] $boxes
 * @property Warehouse $sender
 * @property Warehouse $receiver
 */
class TransferRequest extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transfer_requests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sender_id', 'receiver_id', 'reference_number', 'ts_created', 'status'], 'required'],
            [['id', 'sender_id', 'receiver_id', 'status'], 'integer'],
            [['reference_number'], 'string'],
            [['ts_created', 'ts_updated'], 'safe'],
            [['reference_number'], 'unique'],
            [['sender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['sender_id' => 'id']],
            [['receiver_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['receiver_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sender_id' => 'Sender ID',
            'receiver_id' => 'Receiver ID',
            'reference_number' => 'Reference Number',
            'ts_created' => 'Ts Created',
            'ts_updated' => 'Ts Updated',
            'status' => 'Status',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getTransferItems()
    {
        return $this->hasMany(TransferItem::className(), ['transfer_request_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getBoxes()
    {
        return $this->hasMany(Box::className(), ['id' => 'box_id'])->viaTable('transfer_items', ['transfer_request_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getSender()
    {
        return $this->hasOne(Warehouse::className(), ['id' => 'sender_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getReceiver()
    {
        return $this->hasOne(Warehouse::className(), ['id' => 'receiver_id']);
    }
}

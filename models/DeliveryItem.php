<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "delivery_items".
 *
 * @property integer $id
 * @property integer $delivery_note_id
 * @property integer $box_id
 * @property integer $status
 *
 * @property Box $box
 * @property DeliveryNote $deliveryNote
 */
class DeliveryItem extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'delivery_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'delivery_note_id', 'box_id', 'status'], 'required'],
            [['id', 'delivery_note_id', 'box_id', 'status'], 'integer'],
            [['delivery_note_id', 'box_id'], 'unique', 'targetAttribute' => ['delivery_note_id', 'box_id'], 'message' => 'The combination of Delivery Note ID and Box ID has already been taken.'],
            [['box_id'], 'exist', 'skipOnError' => true, 'targetClass' => Box::className(), 'targetAttribute' => ['box_id' => 'id']],
            [['delivery_note_id'], 'exist', 'skipOnError' => true, 'targetClass' => DeliveryNote::className(), 'targetAttribute' => ['delivery_note_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'delivery_note_id' => 'Delivery Note ID',
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
    public function getDeliveryNote()
    {
        return $this->hasOne(DeliveryNote::className(), ['id' => 'delivery_note_id']);
    }
}

<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "delivery_notes".
 *
 * @property integer $id
 * @property string $reference_number
 * @property string $ts_created
 *
 * @property DeliveryItem[] $deliveryItems
 * @property Box[] $boxes
 */
class DeliveryNote extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'delivery_notes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'reference_number'], 'required'],
            [['id'], 'integer'],
            [['reference_number'], 'string'],
            [['ts_created'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reference_number' => 'Reference Number',
            'ts_created' => 'Ts Created',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getDeliveryItems()
    {
        return $this->hasMany(DeliveryItem::className(), ['delivery_note_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getBoxes()
    {
        return $this->hasMany(Box::className(), ['id' => 'box_id'])->viaTable('delivery_items', ['delivery_note_id' => 'id']);
    }
}

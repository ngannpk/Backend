<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $id
 * @property string $name Name Product
 * @property string $code
 * @property string $summary Mô tả ngắn gọn
 * @property string $description  Mô tả chi tiết
 * @property int $trending Bán chạy
 * @property int $popular Nổi bật
 * @property int $new_arrival
 * @property double $price
 * @property double $price_sale
 * @property string $avatar
 * @property string $date_post
 * @property string $date_edit
 * @property int $brand_id
 * @property int $user_create_id Người tạo
 * @property int $user_edit_id1 Người sửa
 * @property int $so_luong
 * @property string ngay_hang_ve
 *
 *
 * @property Images[] $images
 * @property Brand $brand
 * @property User $userCreate
 * @property User $userEditId1
 * @property ProductCategory[] $productCategories
 * @property ProductOrder[] $productOrders
 * @property ProductTags[] $productTags
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'date_post', 'brand_id', 'so_luong'], 'required', 'message' => '{attribute}'],
            [['description', 'ngay_hang_ve'], 'string'],
            [['trending', 'popular', 'new_arrival', 'brand_id', 'user_create_id', 'user_edit_id1'], 'integer'],
            [['price', 'price_sale'], 'number'],
            [['date_post', 'date_edit'], 'safe'],
            [['name', 'code'], 'string', 'max' => 150],
            [['summary'], 'string', 'max' => 300],
            [['avatar'], 'string', 'max' => 100],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'id']],
            [['user_create_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_create_id' => 'id']],
            [['user_edit_id1'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_edit_id1' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name Product',
            'code' => 'Code',
            'summary' => 'Mô tả ngắn gọn',
            'description' => ' Mô tả chi tiết',
            'trending' => 'Bán chạy',
            'popular' => 'Nổi bật',
            'new_arrival' => 'New Arrival',
            'price' => 'Price',
            'price_sale' => 'Price Sale',
            'avatar' => 'Avatar',
            'date_post' => 'Date Post',
            'date_edit' => 'Date Edit',
            'brand_id' => 'Brand ID',
            'user_create_id' => 'Người tạo',
            'user_edit_id1' => 'Người sửa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCreate()
    {
        return $this->hasOne(User::className(), ['id' => 'user_create_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserEditId1()
    {
        return $this->hasOne(User::className(), ['id' => 'user_edit_id1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategory::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductOrders()
    {
        return $this->hasMany(ProductOrder::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductTags()
    {
        return $this->hasMany(ProductTags::className(), ['product_id' => 'id']);
    }
}

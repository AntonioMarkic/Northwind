<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $ProductID
 * @property string $ProductName
 * @property int|null $SupplierID
 * @property int|null $CategoryID
 * @property string|null $QuantityPerUnit
 * @property string|null $UnitPrice
 * @property int|null $UnitsInStock
 * @property int|null $UnitsOnOrder
 * @property int|null $ReorderLevel
 * @property string $Discontinued
 */
class Product extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'ProductName' => true,
        'SupplierID' => true,
        'CategoryID' => true,
        'QuantityPerUnit' => true,
        'UnitPrice' => true,
        'UnitsInStock' => true,
        'UnitsOnOrder' => true,
        'ReorderLevel' => true,
        'Discontinued' => true,
    ];
}

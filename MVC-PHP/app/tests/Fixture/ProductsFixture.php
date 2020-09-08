<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'ProductID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'ProductName' => ['type' => 'string', 'length' => 40, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'SupplierID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'CategoryID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'QuantityPerUnit' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'UnitPrice' => ['type' => 'decimal', 'length' => 10, 'precision' => 4, 'unsigned' => false, 'null' => true, 'default' => '0.0000', 'comment' => ''],
        'UnitsInStock' => ['type' => 'smallinteger', 'length' => 2, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null],
        'UnitsOnOrder' => ['type' => 'smallinteger', 'length' => 2, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null],
        'ReorderLevel' => ['type' => 'smallinteger', 'length' => 2, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null],
        'Discontinued' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => 'b\'0\'', 'collate' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'ProductName' => ['type' => 'index', 'columns' => ['ProductName'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ProductID'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'ProductID' => 1,
                'ProductName' => 'Lorem ipsum dolor sit amet',
                'SupplierID' => 1,
                'CategoryID' => 1,
                'QuantityPerUnit' => 'Lorem ipsum dolor ',
                'UnitPrice' => 1.5,
                'UnitsInStock' => 1,
                'UnitsOnOrder' => 1,
                'ReorderLevel' => 1,
                'Discontinued' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}

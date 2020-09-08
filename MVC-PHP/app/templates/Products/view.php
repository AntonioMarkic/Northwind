<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->ProductID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->ProductID], ['confirm' => __('Are you sure you want to delete # {0}?', $product->ProductID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="products view content">
            <h3><?= h($product->ProductID) ?></h3>
            <table>
                <tr>
                    <th><?= __('ProductName') ?></th>
                    <td><?= h($product->ProductName) ?></td>
                </tr>
                <tr>
                    <th><?= __('QuantityPerUnit') ?></th>
                    <td><?= h($product->QuantityPerUnit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Discontinued') ?></th>
                    <td><?= h($product->Discontinued) ?></td>
                </tr>
                <tr>
                    <th><?= __('ProductID') ?></th>
                    <td><?= $this->Number->format($product->ProductID) ?></td>
                </tr>
                <tr>
                    <th><?= __('SupplierID') ?></th>
                    <td><?= $this->Number->format($product->SupplierID) ?></td>
                </tr>
                <tr>
                    <th><?= __('CategoryID') ?></th>
                    <td><?= $this->Number->format($product->CategoryID) ?></td>
                </tr>
                <tr>
                    <th><?= __('UnitPrice') ?></th>
                    <td><?= $this->Number->format($product->UnitPrice) ?></td>
                </tr>
                <tr>
                    <th><?= __('UnitsInStock') ?></th>
                    <td><?= $this->Number->format($product->UnitsInStock) ?></td>
                </tr>
                <tr>
                    <th><?= __('UnitsOnOrder') ?></th>
                    <td><?= $this->Number->format($product->UnitsOnOrder) ?></td>
                </tr>
                <tr>
                    <th><?= __('ReorderLevel') ?></th>
                    <td><?= $this->Number->format($product->ReorderLevel) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

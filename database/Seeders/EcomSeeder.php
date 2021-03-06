<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Stylers\Taxonomy\Models\Taxonomy;

class EcomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->seedProductTypes();
        $this->seedProductDescriptions();
        $this->seedBasketStatuses();
        $this->seedTransactionStatuses();
        $this->seedCategories();
    }

    protected function seedProductTypes() {
        $parentTx = Taxonomy::loadTaxonomy(config('ecommerce.product_type'));
        $parentTx->name = 'product_type';
        $parentTx->save();

        foreach (config('ecommerce.product_types') as $name => $id) {
            $tx = Taxonomy::loadTaxonomy($id);
            $tx->name = $name;
            $tx->save();
            $tx->makeChildOf($parentTx);
        }
    }

    protected function seedProductDescriptions() {
        $parentTx = Taxonomy::loadTaxonomy(config('ecommerce.product_description_type'));
        $parentTx->name = 'product_description_type';
        $parentTx->save();

        foreach (config('ecommerce.product_description_types') as $name => $id) {
            $tx = Taxonomy::loadTaxonomy($id);
            $tx->name = $name;
            $tx->save();
            $tx->makeChildOf($parentTx);
        }
    }

    protected function seedBasketStatuses(){
        $parentTx = Taxonomy::loadTaxonomy(config('ecommerce.basket_status'));
        $parentTx->name = 'basket_status';
        $parentTx->save();

        foreach (Config::get('ecommerce.basket_statuses') as $name => $id) {
            $tx = Taxonomy::loadTaxonomy($id);
            $tx->name = $name;
            $tx->save();
            $tx->makeChildOf($parentTx);
        }
    }

    protected function seedTransactionStatuses(){
        $parentTx = Taxonomy::loadTaxonomy(config('ecommerce.transaction_pay_status'));
        $parentTx->name = 'transaction_pay_status';
        $parentTx->save();

        foreach (config('ecommerce.transaction_pay_statuses') as $name => $id) {
            $tx = Taxonomy::loadTaxonomy($id);
            $tx->name = $name;
            $tx->save();
            $tx->makeChildOf($parentTx);
        }
    }

    protected function seedCategories(){
        $parentTx = Taxonomy::loadTaxonomy(config('ecommerce.category'));
        $parentTx->name = 'category';
        $parentTx->save();

        foreach (config('ecommerce.categories') as $name => $id) {
            $tx = Taxonomy::loadTaxonomy($id);
            $tx->name = $name;
            $tx->save();
            $tx->makeChildOf($parentTx);
        }
    }
}
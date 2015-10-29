<?php

use Illuminate\Database\Seeder;

class StatusOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_orders')->truncate();

        factory('CodeCommerce\StatusOrders')->create([
            'name' => 'Pedido recebido'
        ]);

        factory('CodeCommerce\StatusOrders')->create([
            'name' => 'Pagamento aprovado'
        ]);

        factory('CodeCommerce\StatusOrders')->create([
            'name' => 'Transporte em andamento'
        ]);

        factory('CodeCommerce\StatusOrders')->create([
            'name' => 'Entrega realizada'
        ]);
    }
}

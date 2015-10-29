<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Order;
use CodeCommerce\StatusOrders;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminOrdersController extends Controller
{
    private $orderModel;
    private $statusOrdersModel;

    public function __construct(Order $orderModel, StatusOrders $statusOrdersModel){

        $this->orderModel = $orderModel;
        $this->statusOrdersModel = $statusOrdersModel;
    }
    public function index(){

        $orders = $this->orderModel->orderBy('id', 'ASC')->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function edit($id){

        $status = $this->statusOrdersModel->lists('name', 'id');
        $order = $this->orderModel->find($id);
        return view('orders.edit', compact('order','status'));
    }

    public function update(Requests\OrderRequest $request, $id){

        $this->orderModel->find($id)->update($request->all());

        return redirect()->route('orders');
    }
}

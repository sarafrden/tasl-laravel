<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\OrderRepository;
use App\Models\Order;
use App\Http\Requests\Order\CreateOrder;
use App\Http\Requests\Order\UpdateOrder;
use App\Http\Requests\LimitRequest;

class OrderAPIController extends Controller
{
    private $OrderRepository;
    public function __construct()
    {
        $this->OrderRepository = new OrderRepository(new Order());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LimitRequest $request)
    {
        return $this->OrderRepository->index($request->take, $request->skip);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrder $request)
    {
        $data = $request->validated();
        return $this->OrderRepository->store($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->OrderRepository->show($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrder $request, $id)
    {
        $data = $request->validated();
        return $this->OrderRepository->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\\$name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->OrderRepository->destroy($id);
    }
}

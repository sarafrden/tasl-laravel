<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromCollection, WithHeadings, WithMapping
{
    private $i = 1;
    public function map($order): array
    {
        return [
            $this->i++,
            'Customer_Name'        => ($order->getCustomerName()),
            'Received_Amount'               => ($order->total()),
            'Created_At'             => ($order->created_at),
        ];
    }
  public function headings(): array {
    return [
            "#",  "Customer Name", "Received Amount", "Created At",
    ];
  }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            $order['Customer_Name'] = $order->getCustomerName();
            $order['Received_Amount'] = $order->total();
        }

       return $orders;

    }
}

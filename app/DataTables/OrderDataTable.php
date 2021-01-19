<?php

namespace App\DataTables;

use App\Orders_detail;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\DB;


class OrderDataTable extends DataTable
{

    public function dataTable()

    {
        $query = DB::table('orders_detail')
            ->join('orders', 'orders.id', '=', 'orders_detail.order_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('products', 'products.id', '=', 'orders_detail.product_id')
            ->select('users.name as nama', 'orders.created_at as tanggal_transaksi', 'orders.invoice', 'orders.resi', 'orders.status', 'products.title as Judul', 'orders_detail.qty as jumlah', 'orders_detail.subtotal')
            // ->whereBetween('orders.created_at', ["2021-01-13", "2021-01-13"])
            ->orderBy('invoice', 'ASC')
            ->get();
        return datatables($query)
            ->addIndexColumn()
            ->removeColumn('password')
            ->editColumn('tanggal_transaksi', function ($model) {

                return date('d-m-Y', strtotime($model->tanggal_transaksi));
            });
    }
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom'          => 'Bfrtip',
                'buttons'      => ['excel', 'csv', 'print', 'reset', 'reload'],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {

        return [
            'DT_RowIndex',
            'nama',
            'invoice',
            'tanggal_transaksi',
            'Judul',
            'jumlah',
            'subtotal',
            'resi',
            'status'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Stayctn_Order_' . date('YmdHis');
    }
}

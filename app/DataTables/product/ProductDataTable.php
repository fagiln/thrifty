<?php

namespace App\DataTables\product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;
use Carbon\Carbon;


class ProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Product $product) {
                return view('seller.product.action', ['product' => $product]);
            })
            ->editColumn('img_path', function (Product $product) {
                if ($product->img_path != null) {
                    return '<img src="' . asset('uploads/' . $product->img_path) . '"width="90px">';
                }
            })->editColumn('category_id', function (Product $product) {

                return $product->category->name;
            })
            ->editColumn('description', function (Product $product) {
                return '<span>' . Str::limit($product->description, 10, ' ...') . '</span>';
            })
            ->editColumn('created_at', function (Product $product) {
                return Carbon::parse($product->created_at)->format('d F Y H:i');
            })
             ->editColumn('updated_at', function (Product $product) {
                return Carbon::parse($product->updated_at)->format('d F Y H:i');
            })
            ->rawColumns(['action', 'img_path', 'description'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive(true)
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,  // Untuk memastikan lebar kolom diatur secara otomatis
            ])
            //->dom('Bfrtip')
            ->orderBy([1])
            ->selectStyleSingle()
            ->buttons([]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('name'),
            Column::make('price'),
            Column::make('category_id')->title('Category'),
            Column::make('stock'),
            Column::make('img_path')->title('Image'),
            Column::make('description'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}

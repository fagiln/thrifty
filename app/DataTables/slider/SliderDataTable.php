<?php

namespace App\DataTables\slider;

use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SliderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function(Slider $slider){
                return view('seller.slider.action', ['slider'=>$slider]);
            })
            ->editColumn('image_path', function(Slider $slider ){
                return '<img src="'.asset('uploads/'.$slider->image_path).'" width="150px">';
            })
             ->editColumn('created_at', function(Slider $slider ){
                return Carbon::parse($slider->created_at)->format('d-m-Y');
            }) 
            ->editColumn('updated_at', function(Slider $slider ){
                return Carbon::parse($slider->updated_at)->format('d-m-Y');
            })
            
            ->rawColumns(['action', 'image_path'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Slider $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
        ->setTableId('slider-table')
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
            Column::make('image_path')->title('Image'),
            Column::make('title'),
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
        return 'Slider_' . date('YmdHis');
    }
}

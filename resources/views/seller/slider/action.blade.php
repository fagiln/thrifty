<div class="d-flex justify-content-center align-items-center gap-2">
    <input type="hidden" name="id" value="{{ $slider->id }}">

    {{-- @can($globalModule['update']) --}}
    <a href="{{ url('seller/slider-list/'.$slider->id.'/edit') }}" class="btn btn-warning">
        <i class="fas fa-pen fs-2"></i>
    </a>
    {{-- @endcan --}}
    {{-- @can($globalModule['delete']) --}}
    <button data-url="{{ route('seller.slider.list.destroy', $slider->id) }}" data-action="delete"
        data-table-id="slider-table" data-name="{{ $slider->title }}" class="btn btn-danger">
        <i class="fas fa-trash fs-2"></i></button>
    {{-- @endcan --}}
</div>

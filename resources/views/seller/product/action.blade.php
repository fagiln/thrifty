<div class="d-flex justify-content-center align-items-center gap-2">
    <input type="hidden" name="id" value="{{ $product->id }}">

    {{-- @can($globalModule['update']) --}}
    <a href="{{ url('seller/product-list/'.$product->id.'/edit') }}" class="btn btn-warning">
        <i class="fas fa-pen fs-2"></i>
    </a>
    {{-- @endcan --}}
    {{-- @can($globalModule['delete']) --}}
    <button data-url="{{ route('seller.product.list.destroy', $product->id) }}" data-action="delete"
        data-table-id="product-table" data-name="{{ $product->name }}" class="btn btn-danger">
        <i class="fas fa-trash fs-2"></i></button>
    {{-- @endcan --}}
</div>

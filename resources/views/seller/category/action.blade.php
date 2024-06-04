<div class="d-flex justify-content-center align-items-center gap-2">
    <input type="hidden" name="id" value="{{ $category->id }}">

    {{-- @can($globalModule['update']) --}}
    <a href="{{ url('seller/category-list/' . $category->id . '/edit') }}" class="btn btn-warning">
        <i class="fas fa-pen fs-2"></i>
    </a> 
    {{-- <a href="{{ url('seller/category-list/'.$category->id) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus {{$category->name}}?')">
        <i class="fas fa-trash fs-2"></i>
    </a> --}}
    {{-- @endcan --}}
    {{-- @can($globalModule['delete']) --}}
    <button data-url="{{ route('seller.category.list.destroy', $category->id) }}" data-action="delete"
        data-table-id="category-table" data-name="{{ $category->name }}" class="btn btn-danger">
        <i class="fas fa-trash fs-2"></i></button>
    {{-- @endcan --}}
</div>

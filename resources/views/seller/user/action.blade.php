<div class="d-flex justify-content-center align-items-center gap-2">
    <input type="hidden" name="id" value="{{ $user->id }}">

    {{-- @can($globalModule['update']) --}}
    <a href="{{ url('seller/user-list/'.$user->id.'/edit') }}" class="btn btn-warning">
        <i class="fas fa-pen fs-2"></i>
    </a>
    {{-- @endcan --}}
    {{-- @can($globalModule['delete']) --}}
    <button data-url="{{ route('seller.user.list.destroy', $user->id) }}" data-action="delete"
        data-table-id="user-table" data-name="{{ $user->username }}" class="btn btn-danger">
        <i class="fas fa-trash fs-2"></i></button>
    {{-- @endcan --}}
</div>

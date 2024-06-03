@extends('template.layout')
@section('title', 'User List')

@section('content')
    <div class="p-3">

        @if (session('status'))
            <div class="mt-3">
                <div id="success-alert" class="alert alert-success d-flex justify-content-between fade show" role="alert">
                    {{ session('status') }}

                </div>
            </div>
        @endif

        {{ $dataTable->table() }}
    </div>
    {{-- @include('seller.user.modals') --}}
    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var alert = document.getElementById('success-alert');
                if (alert) {
                    setTimeout(function() {
                        var bootstrapAlert = new bootstrap.Alert(alert);
                        bootstrapAlert.close();
                    }, 3000); // waktu dalam milidetik (5000 ms = 5 detik)
                }
            });



            $(document).on('click', 'button[data-action="delete"]', function() {
                var url = $(this).data('url');
                var tableId = $(this).data('table-id');
                var name = $(this).data('name');

                if (confirm('Apa kamu yakin ingin menghapus Seller ' + name + '?')) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(result) {
                            $('#' + tableId).DataTable().ajax.reload();
                            alert('Seller ' + name + ' berhasil di hapus');
                        },
                        error: function(xhr) {
                            alert('Error deleting user');
                        }
                    });
                }
            });
        </script>
    @endpush
@endsection

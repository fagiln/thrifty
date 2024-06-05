@extends('template.layout')
@section('title', 'Product List')
@section('content')
@if (session('status'))
<div class="mt-3">
    <div id="success-alert" class="alert alert-success d-flex justify-content-between fade show" role="alert">
        {{ session('status') }}

    </div>
</div>
@endif
    <a href="{{ route('seller.product.show') }}" class="btn btn-primary my-2">
        <i class="fas fa-plus fs-2"></i> Add
    </a>
    {{ $dataTable->table() }}

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var alert = document.getElementById('success-alert');
                if (alert) {
                    setTimeout(function() {
                        var bootstrapAlert = new bootstrap.Alert(alert);
                        bootstrapAlert.close();
                    }, 5000); // waktu dalam milidetik (5000 ms = 5 detik)
                }
            });
        </script>
    @endpush
@endsection

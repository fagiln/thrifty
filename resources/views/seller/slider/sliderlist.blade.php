@extends('template.layout')
@section('title', 'Slider List')
@section('content')
@if (session('status'))
<div class="mt-3">
    <div id="success-alert" class="alert alert-success d-flex justify-content-between fade show" role="alert">
        {{ session('status') }}

    </div>
</div>
@endif
    <a href="" class="btn btn-primary my-2">
        <i class="fas fa-plus fs-2"></i> Add
    </a>
    {{ $dataTable->table() }}

    @push('scripts')
        {{ $dataTable->scripts() }}
    @endpush
@endsection

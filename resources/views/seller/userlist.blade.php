@extends('template.layout')
@section('title', 'User List')

@section('content')
    <div class="p-3">

        {{ $dataTable->table() }}
    </div>


    @push('scripts')
        {{ $dataTable->scripts() }}
    @endpush
@endsection

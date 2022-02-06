@extends('layouts.auth')

@push('page-css')
@livewireStyles
@endpush

@section('main')
<livewire:login />
@endsection

@push('page-js')
@livewireScripts
@endpush

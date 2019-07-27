@extends('layouts.app')

@section('content')
    <item-gallery :claims="{{ auth()->id() ? 'true' : 'false' }}"></item-gallery>
@endsection

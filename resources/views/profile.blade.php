@extends('layouts.app')

@section('content')
<profile :edit="{{ $edit }}" :user="{{ $user }}"></profile>
@endsection

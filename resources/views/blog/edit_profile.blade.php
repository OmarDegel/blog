@extends('blog.master')
@section('content')
@livewire('edit-profile-livewire',['user'=>$user])
@endsection

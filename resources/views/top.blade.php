@extends('layouts.app')

@section('title', 'TOP')

@section('content')

<div class="p-top">
    <img src="{{ asset('storage/images/' . 'top.jpg') }}" />
    <p class="hero-title">MATCH</p>
    <p class="hero-sub">エンジニア向けお仕事をマッチング</p>
</div>
@endsection

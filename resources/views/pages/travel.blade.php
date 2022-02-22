@extends('layouts.app')

@section('head')
    <meta property="og:url"         content="{{ config('app.url') }}" />
    <meta property="og:type"        content="article" />
    <meta property="og:title"       content="Travel - jack.kiwi" />
    <meta property="og:description" content="Jack Cruden's portfolio & blog" />
    <meta property="og:image" content="{{ config('app.url').'/images/kiwifruit_white.png' }}" />

    <link href="https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" rel="stylesheet" />
@endsection

@section('title', 'Travel')

@section('app')
    <travel :places="{{ App\Models\Place::orderBy('start_date', 'desc')->get() }}" />
@endsection

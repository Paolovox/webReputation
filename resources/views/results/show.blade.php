@extends('layouts.main')

@section('main-content')
    <section id="content">
        <div class="container">
            <div class="c-header">
                <h2>Search({{$result->search->platform->platform}}, {{$result->search->keyword->keyword}})</h2>
                <h2>Result({{$result->link}}, {{$result->status}}, {{$result->position}})</h2>
                <h3>{{$result->description}}</h3>
            </div>
        </div>
    </section>
@endsection

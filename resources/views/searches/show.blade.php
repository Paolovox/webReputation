@extends('layouts.main')

@section('main-content')
    <section id="content">
        <div class="container">
            <div class="c-header">
                <h2>({{$search->platform->platform}}, {{$search->keyword->keyword}})</h2>
            </div>
        </div>
    </section>
@endsection

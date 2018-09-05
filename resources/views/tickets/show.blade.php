@extends('layouts.main')

@section('main-content')
    <section id="content">
        <div class="container">
            <div class="c-header">
                <h2>Visualizza ticket #{{$ticket->id}}</h2>
            </div>

            <div class="card">
                <div class="action-header palette-Blue-Grey-400 bg clearfix">
                    <div class="ah-label hidden-xs palette-White text">{{$ticket->oggetto}}</div>
                </div>
                <div class="card-body card-padding">
                   <p>{{$ticket->messaggio}}</p>
                </div>


            </div>
        </div>
    </section>
@endsection

@extends('layouts.main')

@section('main-content')
    <section id="content">
        <div class="container">
            <div class="c-header">
                <h2>{{$client->name}} - {{$dossier->number}}</h2>
            </div>

            <div class="card addLink"  style="display: none">
                <div class="card-header">
                    <h2>Aggiungi un nuovo Link </h2>
                </div>

                <div class="card-body card-padding">
                    {{ Form::open(array('route' => 'links.store', 'class'=>'row')) }}
                    <div class="col-sm-12">
                        <div class="form-group fg-line">
                            {{ Form::label('url', NULL, ['class' => 'sr-only']) }}
                            {{ Form::text('url', NULL, ['class' => 'form-control input-sm',  'placeholder'=> 'Indirizzo url','required']) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fg-line">
                            {{ Form::label('title', NULL, ['class' => 'sr-only']) }}
                            {{ Form::text('title', NULL, ['class' => 'form-control input-sm', 'placeholder'=> 'Titolo URL','required']) }}
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group fg-line">
                            {{ Form::label('status', NULL, ['class' => 'sr-only']) }}
                            {{ Form::select('status',\App\Link::$status, ['class' => 'form-control input-sm', 'placeholder'=> 'Status' ,'required']) }}
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group fg-line">
                            {{ Form::label('google_position', NULL, ['class' => 'sr-only']) }}
                            {{ Form::text('google_position', NULL, ['class' => 'form-control input-sm', 'placeholder'=> 'Posizione su google']) }}
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group fg-line">
                            {{ Form::label('google_page', NULL, ['class' => 'sr-only']) }}
                            {{ Form::text('google_page', NULL, ['class' => 'form-control input-sm', 'placeholder'=> 'Pagina di google']) }}
                        </div>
                    </div>
                    <div class="col-sm-4 pull-right">
                        {{ Form::button('Cancella', ['type' => 'reset', 'class' => 'btn btn-default btn-sm m-t-5 waves-effect', 'onclick'=>"return $('.addDoc').hide();"]) }}
                        {{ Form::button('Aggiungi', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm m-t-5 waves-effect']) }}
                    </div>
                    {{ Form::hidden('dossier', Crypt::encrypt($dossier->number)) }}
                    {{ Form::close() }}
                </div>
            </div>

            <div class="card addDoc"  style="display: none">
                <div class="card-header">
                    <h2>Aggiungi un nuovo Documento </h2>
                </div>

                <div class="card-body card-padding">
                    {{ Form::open(array('route' => 'documents.store', 'class'=>'row',  'files' => true)) }}
                    <div class="col-sm-12">
                        <div class="form-group fg-line">
                            {{ Form::label('title', NULL, ['class' => 'sr-only']) }}
                            {{ Form::text('title', NULL, ['class' => 'form-control input-sm',  'placeholder'=> 'Descrizione documento']) }}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group fg-line">
                            {{ Form::label('file', NULL, ['class' => 'sr-only']) }}
                            {{ Form::file('file', NULL, ['class' => 'form-control input-sm', 'required']) }}
                        </div>
                    </div>

                    <div class="col-sm-4 pull-right">
                        {{ Form::button('Cancella', ['type' => 'reset', 'class' => 'btn btn-default btn-sm m-t-5 waves-effect ', 'onclick'=>"return $('.addDoc').hide();"]) }}
                        {{ Form::button('Aggiungi', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm m-t-5 waves-effect']) }}
                    </div>
                    {{ Form::hidden('dossier', Crypt::encrypt($dossier->number)) }}
                    {{ Form::close() }}
                </div>
            </div>
            <div class="card addTicket"  style="display: none">
                <div class="card-header">
                    <h2>Nuova segnalazione</h2>
                </div>

                <div class="card-body card-padding">
                    {{ Form::open(array('route' => 'tickets.store', 'class'=>'row')) }}
                    <div class="col-sm-12">
                        <div class="form-group fg-line">
                            {{ Form::label('oggetto', NULL, ['class' => 'sr-only']) }}
                            {{ Form::text('oggetto', NULL, ['class' => 'form-control input-sm',  'placeholder'=> 'Oggetto']) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fg-line">
                            {{ Form::label('messaggio', NULL, ['class' => 'sr-only']) }}
                            {{ Form::textarea('messaggio', NULL, ['class' => 'form-control input-sm', 'size' => '30x3', 'placeholder'=>'Messaggio', 'required']) }}
                        </div>
                    </div>

                    <div class="col-sm-4 pull-right">
                        {{ Form::button('Cancella', ['type' => 'reset', 'class' => 'btn btn-default btn-sm m-t-5 waves-effect', 'onclick'=>"return $('.addTicket').hide();"]) }}
                        {{ Form::button('Aggiungi', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm m-t-5 waves-effect']) }}
                        </div>
                    {{ Form::hidden('dossier', Crypt::encrypt($dossier->number)) }}

                    {{ Form::close() }}
                </div>
            </div>

            <div class="card" id="profile-main">
                <div class="pm-overview c-overflow mCustomScrollbar _mCS_4 mCS-autoHide" style="overflow: visible;">
                    <div class="main-menu">
                        <li>
                            <a href="#" onclick="$('.addDoc').hide();$('.addTicket').hide();$('.addLink').toggle();">
                                <i class="zmdi zmdi-link zmdi-hc-fw"></i> Aggiungi Link
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="$('.addTicket').hide();$('.addLink').hide();$('.addDoc').toggle();">
                                <i class="zmdi zmdi-attachment zmdi-hc-fw"></i> Aggiungi Documento
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="$('.addDoc').hide();$('.addLink').hide();$('.addTicket').toggle();">
                                <i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Invia Segnalazione
                            </a>
                        </li>
                    </div>

                </div>

                <div class="pm-body clearfix">
                    <div class="tabpanel" role="tabpanel">
                        <ul class="tab-nav tn-justified" role="tablist">
                            <li role="presentation" class="active"><a href="#links" aria-controls="#links" role="tab" data-toggle="tab" aria-expanded="false">Links</a></li>
                            <li role="presentation"><a href="#documents" aria-controls="#documents" role="tab" data-toggle="tab" aria-expanded="false">Documenti</a></li>
                            <li role="presentation"><a href="#tickets" aria-controls="#tickets" role="tab" data-toggle="tab" aria-expanded="false">Segnalazioni</a></li>
                        </ul>
                        <div class="tab-content" style="padding: unset;">
                            <div role="tabpanel" class="tab-pane animated fadeInRight active" id="links">
                                @include('links.index')
                            </div>
                            <div role="tabpanel" class="tab-pane animated fadeInRight" id="documents">
                                @include('documents.index')
                            </div>
                            <div role="tabpanel" class="tab-pane animated fadeInRight" id="tickets">
                                @include('tickets.index')
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </section>


@endsection

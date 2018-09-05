<div class="list-group lg-alt lg-even-black">
 @foreach($documents as $document)
    <div class="list-group-item media">

        <div class="pull-left">
            <div class="avatar-char palette-Light-Blue bg"></div>
        </div>
        <div class="pull-right">
            <ul class="actions">
                <li class="dropdown">
                    <a href="" data-toggle="dropdown" aria-expanded="false">
                        <i class="zmdi zmdi-more-vert"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="{{ route('documents.file', ['filename' => $document->filename]) }}">Download</a>
                        </li>
                        <li>
                            {!!Form::open(array('route' => array('documents.destroy', $document->id))) !!}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {!!Form::submit('Elimina', ['class'=>'btn btn-default waves-effect', "style"=>"box-shadow:none;padding: 10px 20px;"])!!}
                            {!!Form::close()!!}
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="media-body">
            <div class="lgi-heading">{{$document->title}}</div>
            <ul class="lgi-attrs">
                <li>Nome File: {{$document->filename}}</li>
                <li>Data: {{Carbon\Carbon::parse($document->created_at)->format('d-m-Y') }}</li>
            </ul>
        </div>
    </div>
    @endforeach
</div>
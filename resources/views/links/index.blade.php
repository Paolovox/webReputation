<div class="list-group lg-alt lg-even-black">
    <div class="action-header palette-Blue-Grey-400 bg clearfix massAction" style="display: none;">
        <div class="ah-label hidden-xs palette-White text">Azioni di massa</div>
        <ul class="ah-actions actions a-alt">
            <li>
                <a class="removeLinks">
                    <i class="zmdi zmdi-check-all zmdi-hc-fw"></i>
                </a>
                <a class="uncheckLinks">
                    <i class="zmdi zmdi-square-o zmdi-hc-fw"></i>
                </a>
            </li>
        </ul>
    </div>
    @foreach($links as $link)
    <div class="list-group-item media">
        @if($link->isOn())
        <div class="checkbox pull-left lgi-checkbox">
            <label>
                <input type="checkbox" name="links[]" value="{{$link->id}}" onchange="return $('.massAction').show()"><i class="input-helper"></i>
            </label>
        </div>
        @endif
        <div class="pull-left">
            @php
            $link->color = 'Red';
            if ($link->status ==='online') $link->color = 'Green';
            @endphp
            <div class="avatar-char palette-{{$link->color}} bg">{{$link->title[0] }}</div>
        </div>
        <div class="pull-right">
            <ul class="actions">
                <li class="dropdown">
                    <a href="" data-toggle="dropdown" aria-expanded="false">
                        <i class="zmdi zmdi-more-vert"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="{{$link->url}}" target="_blank">Visualizza</a>
                        </li>
                        <li>
                            {!!Form::open(array('route' => array('links.destroy', $link->id))) !!}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {!!Form::submit('Elimina', ['class'=>'btn btn-default waves-effect', "style"=>"box-shadow:none;padding: 10px 20px;"])!!}
                            {!!Form::close()!!}
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="media-body">
            <div class="lgi-heading">{{$link->title}}</div>
            <small class="lgi-text">{{$link->url}}</small>
            <ul class="lgi-attrs">
                <li>Stato: {{\App\Link::$status[$link->status]}}</li>
                <li>Posizione: {{$link->google_position}} / Pagina: {{$link->google_page}}</li>
                <li>Data: {{Carbon\Carbon::parse($link->created_at)->format('d-m-Y') }}</li>
            </ul>
        </div>
    </div>
        @endforeach
</div>
@section('scripts')
    <script type="text/javascript">
    jQuery(document).ready( function($) {
        // Uncheck All
        $('.uncheckLinks').click(function () {
            $("input:checkbox[name^='links[]']").each(function() {
                $(this).prop("checked", false);
                $('.massAction').hide();
            })
        });

        $('.removeLinks').click(function () {
            var data = { 'links' : []};
            $("input:checkbox[name^='links']:checked").each(function() {
                data['links'].push($(this).val());
            });
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/links/remove',
                type: 'POST',
                data: {_token: CSRF_TOKEN, data:data},
                dataType: 'JSON',
                success: function(data){
                    location.reload();
                }
            });

        });


    });
    </script>
@endsection

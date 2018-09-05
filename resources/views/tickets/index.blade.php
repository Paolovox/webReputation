<div class="list-group lg-alt lg-even-black">
    @foreach($tickets as $ticket)
    <div class="list-group-item media">
        <div class="pull-left">
            <div class="avatar-char palette-Light-Blue bg">P</div>
        </div>
        <div class="pull-right">
            <ul class="actions">
                <li class="dropdown">
                    <a href="" data-toggle="dropdown" aria-expanded="false">
                        <i class="zmdi zmdi-more-vert"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="{{route('tickets.show',['id'=>$ticket->id])}}">Visualizza</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="media-body">
            <div class="lgi-heading">{{$ticket->oggetto}}</div>
            <small class="lgi-text">{{$ticket->messaggio}}</small>
            <ul class="lgi-attrs">
                <li>Stato: {{\App\Ticket::$status[$ticket->status]}}</li>
                <li>Data: {{Carbon\Carbon::parse($ticket->created_at)->format('d-m-Y') }}</li>
            </ul>
        </div>
    </div>
        @endforeach
</div>
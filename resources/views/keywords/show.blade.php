@extends('layouts.main')

@section('main-content')
    <section id="content">
        <div class="container">
            <div class="c-header">
                <h2>{{$lawyer->name}}</h2>
            </div>

            <div class="card" id="profile-main">
                <div class="pm-overview c-overflow mCustomScrollbar _mCS_4 mCS-autoHide" style="overflow: visible;">

                    <div class="pmo-block pmo-contact hidden-xs">
                        <h2>Contact</h2>
                        <ul>
                            <li><i class="zmdi zmdi-phone"></i> 00971 12345678 9</li>
                            <li>
                                <i class="zmdi zmdi-pin"></i>
                                <address class="m-b-0 ng-binding">
                                    44-46 Morningside Road,<br>
                                    Edinburgh,<br>
                                    Scotland
                                </address>
                            </li>
                        </ul>

                    </div>


                </div>

                <div class="pm-body clearfix">
                    <ul class="tab-nav tn-justified">
                        <li class="active waves-effect"><a href="profile-about.html">Clienti</a></li>
                        <li class="waves-effect"><a href="profile-photos.html">Ticket</a></li>
                        <li class="waves-effect"><a href="profile-connections.html">Pagamenti</a></li>
                    </ul>


                    <div class="pmb-block">
                        <div class="pmbb-header">
                            <h2><i class="zmdi zmdi-equalizer m-r-5"></i> Summary</h2>
                        </div>
                        <div class="pmbb-body p-l-30">
                            <div class="pmbb-view">
                                Sed eu est vulputate, fringilla ligula ac, maximus arcu. Donec sed felis vel magna mattis ornare ut non turpis. Sed id arcu elit. Sed nec sagittis tortor. Mauris ante urna, ornare sit amet mollis eu, aliquet ac ligula. Nullam dolor metus, suscipit ac imperdiet nec, consectetur sed ex. Sed cursus porttitor leo.
                            </div>
                        </div>
                    </div>



                </div>


            </div>
        </div>
    </section>
@endsection

<h1>Ciao {{$user->name}}</h1>
<p>Per concludere la registrazione cliccare sul seguente link:<br> {{ url(config('app.url').route('password.reset', $token, false))}}</p>
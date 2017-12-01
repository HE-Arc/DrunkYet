@component('mail::message')

@component('mail::panel', ['url' => ''])
@if ($user->gender == "male")
    Monsieur {{$user->name}}
@else
    Madame {{$user->name}}
@endif
@endcomponent

Merci de votre inscription sur notre site !


@component('mail::button', ['url' => config('app.url')])
Aller sur le site
@endcomponent

L'équipe de {{ config('app.name') }}
@endcomponent

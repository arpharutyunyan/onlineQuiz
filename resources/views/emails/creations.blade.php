@component('mail::message')
Notification

Via admin page has been created {{$table}} with ID: {{$id}} and name: {{$name}}

@component('mail::button', ['url' => 'onlinequiz.loc'])
Visit site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
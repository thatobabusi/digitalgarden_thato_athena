@component('mail::message')
# RE: {{$subject}}

Hi Thato,

You have received a new message from {{$from_fullname}} on the {{ config('app.name') }} platform.<br>

Message Contents:<br>
{{$message}}


Thanks,<br>
{{$from_fullname}}<br>
Email - {{$from_email}}<br>
Cellphone - {{$from_cellphone}}
@endcomponent

@component('mail::message')
# Thanks for Activate Your Account 

@component('mail::panel')
 For Activate your Account
@endcomponent

@component('mail::button', ['url' => $url])
Click here
@endcomponent

Thanks,
<br>
Team {{config('app.name')}}
 
@endcomponent
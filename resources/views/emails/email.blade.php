@component('mail::message')
# Hi, user

Request peminjaman akun zoom telah diapprove oleh admin, silakan cek secara berkala di sistem.
<br>
<br>
Berikut merupakan detail akun yang dipinjam:
<br>
Akun : Zoom PTI 
<br>
Email : ZoomPTI@gmail.com
<br>
Password : a1xbk0asd(1#

@component('mail::button', ['url' => ''])
Cek Status
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
# Introduction

Tahnk you for shopping with us.

{{ $order->total }}



Thanks,<br>
{{ config('app.name') }}
@endcomponent

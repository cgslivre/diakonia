@extends('layouts.root') 
@section('app-scope','auth') 
@yield('content')
<script type="text/javascript" src="{{ mix('manifest.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
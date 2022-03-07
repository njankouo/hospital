@if (Session()->has('success'))
    <span class="alert-success " hidden>
        {{ Session::get('success') }}
    </span>
@endif
@extends('layouts.master')
@include('client.create')
@section('contenu')
    @include('client.liste')
@endsection
<script src="{{ asset('js/jquery-3.6.0.min.js') }}">

</script>


@if (Session::has('success'))
    <script>
        toastr.success("{!! Session::get('success') !!}");
    </script>
@endif

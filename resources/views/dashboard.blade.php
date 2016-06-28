@extends('layouts/master')

@section('content')

    @javascript(compact('pusherKey'))

    <google-calendar grid="a1:a2"></google-calendar>

    <last-fm grid="b1:c1"></last-fm>

    <current-time grid="d1" dateformat="ddd DD/MM"></current-time>

    <packagist-statistics grid="b2"></packagist-statistics>

    <rain-forecast grid="c2"></rain-forecast>

    <internet-connection grid="d2"></internet-connection>

    <github-file file-name="Carindale GF" grid="a3"></github-file>

    <github-file file-name="Carindale L1" grid="b3"></github-file>

    <github-file file-name="Redbank" grid="c3"></github-file>

    <github-file file-name="Brookside" grid="d3"></github-file>

@endsection
@extends('layouts/master')

@section('content')

    @javascript(compact('pusherKey'))

    <google-calendar grid="a2:a3"></google-calendar>

    <last-fm grid="b1:c1"></last-fm>

    <current-time grid="a1" dateformat="dddd DD/MM"></current-time>


    <rain-forecast grid="e2"></rain-forecast>

    <internet-connection grid="e1"></internet-connection>

    <store-data file-name="Carindale GF" grid="b2"></store-data>

    <store-data file-name="Carindale L1" grid="c2"></store-data>

    <store-data file-name="Redbank" grid="d2"></store-data>
    <store-data file-name="Brookside" grid="d1"></store-data>

    <store-data file-name="Toombul" grid="d3"></store-data>
    <store-data file-name="Hervey Bay" grid="c3"></store-data>

    <store-data file-name="Maryborough" grid="b3"></store-data>

@endsection

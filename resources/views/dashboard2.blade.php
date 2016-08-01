@extends('layouts/master')

@section('content')

    @javascript(compact('pusherKey'))

    <google-calendar grid="a2:a3"></google-calendar>

    <last-fm grid="b1:c1"></last-fm>

    <current-time grid="a1" dateformat="dddd DD/MM"></current-time>


    <rain-forecast grid="e2"></rain-forecast>

    <internet-connection grid="e1"></internet-connection>

    <trello-data store-name="Carindale GF" grid="b2"></trello-data>

    <trello-data store-name="Carindale L1" grid="c2"></trello-data>

    <trello-data store-name="Redbank" grid="d2"></trello-data>
    <trello-data store-name="Brookside" grid="d1"></trello-data>

    <trello-data store-name="Toombul" grid="d3"></trello-data>
    <trello-data store-name="Hervey Bay" grid="c3"></trello-data>

    <trello-data store-name="Maryborough" grid="b3"></trello-data>

@endsection

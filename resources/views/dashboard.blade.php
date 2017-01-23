@extends('layouts/master')

@section('content')

    @javascript(compact('pusherKey'))
  <current-time grid="a1:b1" dateformat="dddd DD/MM"></current-time>
    <title-board grid="a2:b2"></title-board>
    <store-data store-name="Carindale GF" grid="c1:d2"></store-data>

    <store-data store-name="Carindale L1" grid="e1:f2"></store-data>

    <store-data store-name="Redbank" grid="g1:h2"></store-data>
    <store-data store-name="Brookside" grid="g3:h4"></store-data>

    <store-data store-name="Toombul" grid="e3:f4"></store-data>
    <store-data store-name="Hervey Bay" grid="c3:d4"></store-data>

    <store-data store-name="Maryborough" grid="a3:b4"></store-data>

@endsection

@extends('layouts/master')

@section('content')

    @javascript(compact('pusherKey'))
  <current-time grid="a1:b1" dateformat="dddd DD/MM"></current-time>
    <internet-connection grid="a2:b2"></internet-connection>
    <pos-data store-name="Carindale GF" grid="c1:d2"></pos-data>

    <pos-data store-name="Carindale L1" grid="e1:f2"></pos-data>

    <pos-data store-name="Redbank" grid="g1:h2"></pos-data>
    <pos-data store-name="Brookside" grid="g3:h4"></pos-data>

    <pos-data store-name="Toombul" grid="e3:f4"></pos-data>
    <pos-data store-name="Hervey Bay" grid="c3:d4"></pos-data>

    <pos-data store-name="Maryborough" grid="a3:b4"></pos-data>

@endsection

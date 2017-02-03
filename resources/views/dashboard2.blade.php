@extends('layouts/master')

@section('content')

    @javascript(compact('pusherKey'))

   <!-- <google-calendar grid="a2:a3"></google-calendar> -->

  <!--  <last-fm grid="b1:c1"></last-fm> -->




  <current-time grid="a1:b1" dateformat="dddd DD/MM"></current-time>
    <internet-connection grid="a2:b2"></internet-connection>



  <!--  <rain-forecast grid="e2"></rain-forecast> -->

   <!-- <internet-connection grid="e1"></internet-connection> -->

    <trello-data store-name="Carindale GF" grid="c1:d2"></trello-data>

    <trello-data store-name="Carindale L1" grid="e1:f2"></trello-data>

    <trello-data store-name="Redbank" grid="g1:h2"></trello-data>
    <trello-data store-name="Brookside" grid="g3:h4"></trello-data>

    <trello-data store-name="Toombul" grid="e3:f4"></trello-data>
    <trello-data store-name="Hervey Bay" grid="c3:d4"></trello-data>

    <trello-data store-name="Maryborough" grid="a3:b4"></trello-data>

@endsection

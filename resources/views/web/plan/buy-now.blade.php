@extends('web.layout.app')

@section('title') Musafir | Plan @endsection

@section('content')
<iframe src="{{ $url['baseurl'].'amount='.$url['amount'].'&currency='.$url['currency'].'&package='.$url['package'].'&packageId='.$url['packageId'].'&token='.$url['token'] }}" style="width:100%; height:100vh;" frameborder="0"></iframe>
@endsection

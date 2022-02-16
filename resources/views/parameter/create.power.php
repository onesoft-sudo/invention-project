:extends('layouts.main'):
:title('Test'):

:section('main'):
<h1>Parameters</h1>
<ul class="list-group my-3">
    :foreach($params as $param):
        <li class="list-group-item">{{ $param->content }}</li>
    :endforeach:
</ul>
:endsection:

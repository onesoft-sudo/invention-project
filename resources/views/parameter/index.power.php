:extends('layouts.main'):
:title('Test'):

:section('main'):
<h1>Parameters</h1>
<ul class="list-group">
    :foreach($params as $param):

    :endforeach
</ul>
:endsection:

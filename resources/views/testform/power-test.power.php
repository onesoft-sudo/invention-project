:extends('layouts.layout1')
:title($data->username . ' - User\'s Profile')

:function:css($args)
    <p>Hello it is! {{ $args }}</p>
:endfunction

:function:css2($arg = 'no arg')
    <p>Hello not it is! {{ $arg }}</p>
:endfunction

:section('main')
<h1>Hi</h1>
<p>This is from main section.</p>

:component('btn', 'Login')
:component('btn', 'Login 2')

!{{ css2('nofeh') }}!

:component('btn', 'Login 3')


!{{ css('hi') }}!

:endsection

:section('bottom')
<h1>Bottom</h1>
<p>Bottom bottom section</p>
:endsection

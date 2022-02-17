:extends('layouts.main'):
:title('Test'):

:section('main'):
<h1>Parameters</h1>
<a href="{{ route('parameter.create') }}" class="btn btn-custom">Create</a>
<form action="" method="post" onsubmit="return onDelete()" class="mt-3">
    :csrf:
    :method('DELETE'):

    <button class="btn btn-custom" type="submit">Delete</button>
</form>
<div>
    <p>{{ route('abc', 5, 672, "SLuggis044") }}</p>
</div>
<ul class="list-group my-3">
    :foreach($params as $param):
        <li class="list-group-item">
            <p>{{ $param->content }}</p>
            <br>
            <a href="{{ route('parameter.view', $param->id) }}">View</a>
        </li>
    :endforeach:
</ul>
<script>
    function onDelete() {
        const id = prompt("Enter ID:");

        if(!/\d+/.test(id)) {
            alert("You must provide a valid ID.");
            return false;
        }

        const form = document.querySelector('form');
        form.setAttribute('action', '/params/' + id);
        form.submit();
        return false;
    }
</script>
:endsection:

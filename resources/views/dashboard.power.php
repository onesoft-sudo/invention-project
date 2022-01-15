:section('main')
<h1>Welcome, <?= session()->get("name") ?>!</h1>

<div class="pt-3">

</div>

<a href="/logout" class="btn btn-primary mt-3">Logout</a>
:endsection

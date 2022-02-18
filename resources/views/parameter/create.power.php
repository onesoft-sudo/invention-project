:extends('layouts.main'):
:title('Create Parameter'):

:section('main'):
<h1>Create Parameter</h1>
{{ session()->getFlash('msg') }}
<br>
<form action="{{ route('parameter.store') }}" method="post">
    :csrf:

    <div class="form-group my-3">
        <label for="i1">Content</label>
        <textarea name="content" id="i1" cols="30" rows="10" class="form-control:if(errors('content')): is-invalid:endif:">:if(errors('content')):{{ old('content') }}:endif:</textarea>
        :if(errors('content')):
            <div class="invalid-feedback">
                {{ error_first('content') }}
            </div>
        :endif:
    </div>

    <div class="form-group my-3">
        <button class="btn btn-custom" type="submit">Submit</button>
    </div>
</form>
:endsection:

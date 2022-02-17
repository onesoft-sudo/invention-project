:extends('layouts.main'):
:title('An API built with Invention Framework'):

:section('main'):
    <h1>An API built with <span class="text-primary">Invention Framework</span></h1>
    <p>Please fill out the form below to subscribe to our mailing list. :if(isset($help)):OK.:else:Hello!:endif:</p>

    <div class="row mb-3">
        <div class="col-md-6">
            <form action="{{ route('api.index', 5) }}" method="post" novalidate>
                :csrf:

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control:error('email'): is-invalid:enderror:" value="{{ old('email') }}">

                    :error('email'):
                    <div class="invalid-feedback">
                        {{ $_error_current }}
                    </div>
                    :enderror:
                </div>
                <div class="form-group my-2">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" id="name" class="form-control:if(error_first('name')): is-invalid:endif:" value="{{ old('name') }}">
                    <div class="invalid-feedback">
                        {{ error_first('name') }}
                    </div>
                </div>
                <div class="form-group my-2">
                    <label for="feedback">Feedback (Optional)</label>
                    <textarea name="feedback" id="feedback" class="form-control:error('feedback'): is-invalid:enderror:" rows="10">{{ old('feedback') }}</textarea>
                    <div class="invalid-feedback">
                        {{ error_first('feedback') }}
                    </div>
                </div>
                <div class="form-group">
                    :component('btn', 'Submit'):
                </div>
            </form>
            <div>
                <p class="pt-3"><span class="text-muted">&copy; OSN Inc.</span></p>
            </div>
        </div>
    </div>


:endsection:

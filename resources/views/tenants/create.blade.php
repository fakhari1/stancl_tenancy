@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a new Tenant</div>

                    <div class="card-body">
                        <form action="{{ route('tenants.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="id" class="control-label">Tenant ID (name)</label>
                                <input type="text" name="id" id="id"
                                       class="form-control {{ $errors->has('id') ? 'is-invalid' : '' }}">

                                @if($errors->has('id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

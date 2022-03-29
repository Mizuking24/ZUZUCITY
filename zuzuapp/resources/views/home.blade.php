@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">UserLogin</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                <div>
                    <a href="{{ route('user.item_index') }}">こちら</a>から先に進んでください。
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">AdminLogin</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div>
                        <a href="{{ route('admin.item_index') }}">商品一覧</a>
                    </div>
                    <div>
                        <a href="{{ route('admin.item_index') }}">注文一覧</a>
                    </div>
                    <p>{{ $user }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

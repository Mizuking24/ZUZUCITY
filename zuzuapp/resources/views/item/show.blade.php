@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品詳細</div>
                <div class="card-body">
                  <img src="{{ asset('/storage/images/' . $item->image_id) }}">
                  <table class="table">
                    <tr>
                      <th>商品名</th>
                      <td>{{ $item->name }}</td>
                      <td></td>
                    </tr>
                    <tr>
                      <th>商品説明</th>
                      <td>{{ $item->introduction }}</td>
                      <td></td>
                    </tr>
                    <tr>
                      <th>価格</th>
                      <td>{{ $item->price }}円（税抜き）</td>
                      <td></td>
                    </tr>
                    <tr>
                      <th>販売ステータス</th>
                      @if($item->is_active === 1)
                        <td>販売中</td>
                      @elseif($item->is_active === 0)
                        <td>Sold Out</td>
                      @endif
                    </tr>
                  </table>
                  {!! Form::open(['route' => ['user.cart_add', 'class' => 'd-inline']]) !!}
                    {{ Form::hidden('item_id', $item->id) }}
                    {{ Form::hidden('user_id', $user) }}
                    <div class="form-group col-sm-2">
                      <div class="ml-2">
                        {!! Form::label('amount', '購入個数', ['class' => 'mt-1']) !!}
                      </div>
                      <div class="ml-2">
                        <input type="number" name="amount" class="form-control" pattern="[1-9][0-9]*" min="1" required autofocus>
                      </div>
                    </div>
                    <div class="form-group col-sm-2">
                      {!! Form::submit('カートへ', ['class' => 'btn btn-primary']) !!}
                    </div>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">マイカート</div>
              <div class="card-body">
                @if(isset($cart_data))
                <table class="table">
                  <tr>
                    <th>商品名</th>
                    <th>数量</th>
                    <th>価格</th>
                    <th>小計</th>
                    <th></th>
                  </tr>
                  @foreach($cart_data as $cart)
                  <tr>
                    <td>{{ $cart->item->name }}</td>
                    <td>{{ $cart->amount }}</td>
                    <td>{{ $cart->item->price }}</td>
                    <td>{{ $cart->item->price * $cart->amount * 1.1 }}円</td>
                    <td>
                      {!! Form::open(['route' => ['user.cart_destroy', $cart->id]]) !!}
                      {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach
                  <tr>
                    <th>合計</th>
                    <td>{{ $total }}円</td>
                    <td></td>
                    <td>
                      {!! Form::open(['route' => ['user.order_new']]) !!}
                      {!! Form::submit('レジへ進む', ['class' => 'btn btn-primary']) !!}
                      {!! Form::close() !!}
                    </td>
                    <td></td>
                  </tr>
                </table>
                @else
                <h1>カートが空です！！！！！</h1>
                @endif
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

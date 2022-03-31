@extends('admins.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">注文情報確認画面</div>

                <div class="card-body">
                  {!! Form::open(['route' => ['user.order_create']]) !!}
                  {{ Form::hidden('name', $order_name) }}
                  {{ Form::hidden('post_code', $order_postCode) }}
                  {{ Form::hidden('address', $order_address) }}
                  {{ Form::hidden('payment', $payment) }}
                  {{ Form::hidden('delivery_charge', $delivery_charge) }}
                  {{ Form::hidden('billing_amount', $billing_amount) }}
                    @csrf
                    <table class="table">
                      <tr>
                        <th>氏名</th>
                        <td>{{ $order_name }}</td>
                      </tr>
                      <tr>
                        <th>郵便番号</th>
                        <td>{{ $order_postCode }}</td>
                      </tr>
                      <tr>
                        <th>住所</th>
                        <td>{{ $order_address }}</td>
                      </tr>
                      <tr>
                        <th>支払方法</th>
                        <td>{{ $payment }}</td>
                      </tr>
                      <tr>
                        <th>注文内容</th>
                        <th>商品名</th>
                        <th>数量</th>
                        <th>価格</th>
                        <th></th>
                      </tr>
                      @foreach($cart_data as $cart)
                      <tr>
                        <td></td>
                        <td>{{ $cart->item->name }}</td>
                        <td>{{ $cart->amount }}</td>
                        <td>{{ $cart->item->price * $cart->amount * 1.1 }}円</td>
                        <td></td>
                      </tr>
                      @endforeach
                      <tr>
                        <td></td>
                        <td>配送料</td>
                        <td></td>
                        <td>{{ $delivery_charge }}円</td>
                      </tr>
                      <tr>
                        <th>合計</th>
                        <td>{{ $billing_amount }}円（税込）</td>
                        <td></td>
                        <td>{!! Form::submit('注文内容を確定する', ['class' => 'btn btn-primary']) !!}</td>
                      </tr>
                    </table>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
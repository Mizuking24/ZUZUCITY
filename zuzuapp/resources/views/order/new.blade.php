@extends('admins.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">お客様情報入力</div>

                <div class="card-body">
                  <form method="POST" action="{{ route('user.order_check') }}">
                    @csrf
                    <table class="table">
                      <tr>
                        <th>氏名</th>
                        <td><input class="form-control" type="text" name="order_name" placeholder="森ケニヤ"></td>
                      </tr>
                      <tr>
                        <th>郵便番号</th>
                        <td><input class="form-control" type="text" name="order_postCode" placeholder="0000000"></td>
                      </tr>
                      <tr>
                        <th>住所</th>
                        <td><textarea class="form-control" name="order_address" placeholder="大阪府大阪市北区0番0号"></textarea></td>
                      </tr>
                      <tr>
                        <th>支払方法</th>
                        <td>
                          <input type="radio" name="payment" value="銀行振込">銀行振込
                          <input type="radio" name="payment" value="クレジット支払い">クレジット支払い
                        </td>
                      </tr>
                      <tr>
                        <th></th>
                        <td><input class="btn btn-secondary" type="submit" value="確認画面へ進む"></td>
                      </tr>
                    </table>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('admins.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品新規作成</div>

                <div class="card-body">
                  <form method="POST" action="{{ route('admin.item_create') }}" enctype="multipart/form-data">
                    @csrf
                    <table class="table">
                      <tr>
                        <th>商品名</th>
                        <td><input class="form-control" type="text" name="item_name" placeholder="バナナ"></td>
                      </tr>
                      <tr>
                        <th>商品説明</th>
                        <td><textarea class="form-control" name="item_intro" placeholder="めっちゃ美味しです。"></textarea></td>
                      </tr>
                      <tr>
                        <th>商品画像</th>
                        <td><input type="file" name="item_image" accept=".png,.jpg,.jpeg,image/png,image/jpg"></td>
                      </tr>
                      <tr>
                        <th>価格</th>
                        <td><input class="form-control" type="text" name="item_price" placeholder="1000"></td>
                      </tr>
                      <tr>
                        <th>ステータス</th>
                          <td>
                            <input type="radio" name="item_status" value="販売中">販売中
                            <input type="radio" name="item_status" value="入荷待ち">入荷待ち
                          </td>
                        </tr>
                      <tr>
                        <th></th>
                        <td><input class="btn btn-secondary" type="submit" value="登録"></td>
                      </tr>
                    </table>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
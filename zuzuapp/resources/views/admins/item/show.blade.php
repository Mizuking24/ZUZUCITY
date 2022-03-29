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
                    <th>
                      <th>商品名</th>
                      <td>{{ $item->name }}</td>
                      <td></td>
                    </tr>
                    <th>
                      <th>商品説明</th>
                      <td>{{ $item->introduction }}</td>
                      <td></td>
                    </tr>
                    <th>
                      <th>価格</th>
                      <td>{{ $item->price }}円（税抜き）</td>
                      <td></td>
                    </tr>
                    <th>
                      <th>販売ステータス</th>
                      @if($item->is_active === 1)
                        <td>販売中</td>
                      @elseif($item->is_active === 0)
                        <td>入荷待ち</td>
                      @endif
                    </tr>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

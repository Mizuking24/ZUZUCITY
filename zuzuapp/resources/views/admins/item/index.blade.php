@extends('admins.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品一覧</div>

                <div class="card-body">
                  <table class="table">
                    <tr>
                      <th>商品名</th>
                      <th>価格</th>
                      <th>販売ステータス</th>
                    </tr>
                    @foreach($items as $item)
                    <tr>
                      {{-- <img src="WTSeHeGPIQsVxIf7Mhaehe8BOVW37LqcVrn8llmp.png"> --}}
                      <td><a href="{{ route('admin.item_show', [ 'id' => $item->id ]) }}">{{ $item->name }}</a></td>
                      <td>{{ $item->price }}円（税抜き）</td>
                      @if($item->is_active === 1)
                        <td>販売中</td>
                      @elseif($item->is_active === 0)
                        <td>入荷待ち</td>
                      @endif
                    </tr>
                    @endforeach
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

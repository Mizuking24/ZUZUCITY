@extends('admins.app')

@section('content')
<div class="container">
  <div class="col-md-10 order-md-1">
    <h3 class="jumbotron-heading">商品一覧</h3>
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            @foreach($items as $item)
              <div class="col-md-3">
                <div class="card mb-3 shadow-sm">
                  <a href="{{ route('user.item_show', ['id' => $item->id]) }}">
                    <img src="{{ asset('/storage/images/' . $item->image_id) }}">
                  </a>
                  <div class="card-body">
                    <p class="card-text">
                      <a href="{{ route('user.item_show', ['id' => $item->id]) }}">{{ $item->name }}</a>
                    </p>
                    <p class="card-text">
                      ¥{{ $item->price }}（税抜き）
                    </p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
  </div>
</div>
@endsection

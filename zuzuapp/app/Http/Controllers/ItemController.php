<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    public function index() {
        $items = Item::get();
        return view('item.index', [
            'items' => $items,
        ]);
    }

    public function show(Request $request) {
        $item = Item::find($request->id);
        $user = Auth::user();
        return view('item.show', [
            'item' => $item,
            'user' => $user,
        ]);
    }
}

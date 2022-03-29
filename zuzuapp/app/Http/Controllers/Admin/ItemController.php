<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index() {
        $items = Item::get();
        return view('admins.item.index', [
            'items' => $items,
        ]);
    }

    public function new() {
        return view('admins.item.new');
    }

    public function create(Request $request) {
        $name = $request->input('item_name');
        $intro = $request->input('item_intro');
        $price = $request->input('item_price');
        $status = $request->input('item_status');
        if($status === "販売中") {
            $status = 1;
        } elseif($status === "入荷待ち") {
            $status = 0;
        }
        $path = $request->item_image->store('public/images');
        $filename = basename($path);
        $item = new Item;
        $item->name = $name;
        $item->introduction = $intro;
        $item->price = $price;
        $item->is_active = $status;
        $item->image_id = $filename;
        $item->save();
        return redirect(route('admin.item_index'));
    }

    public function show(Request $request) {
        $item = Item::find($request->id);
        // $user = Auth::user();
        return view('admins.item.show', [
            'item' => $item,
            // 'user' => $user,
        ]);
    }
}

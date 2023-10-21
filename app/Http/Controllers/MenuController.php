<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use App\Models\Menu;

class MenuController extends Controller
{
    public function index() {

        $menus = Menu::all();

        return view('menu', compact('menus'));

    }

    public function create() {
        return view('menu-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'menu_cat' => 'required|string|max:255',
            'menu_desc' => 'required|string',
            'price' => 'required|numeric',
            'menu_image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('menu_image')) {
            $image = $request->file('menu_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public', $imageName);

            $imageName = str_replace('public/', '', $imageName);
        } else {
            $imageName = 'default.jpg';
        }

        Menu::create([
            'menu_name' => $request->input('menu_name'),
            'menu_cat' => $request->input('menu_cat'),
            'menu_desc' => $request->input('menu_desc'),
            'price' => $request->input('price'),
            'menu_img_path' => $imageName,
        ]);

        return redirect()->route('dashboard')->with('success', 'Menu item added successfully');
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);

        $request->validate([
            'menu_name' => 'required|string|max:255',
            'menu_cat' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        if ($request->input('menu_name') !== $menu->menu_name) {
            $menu->menu_name = $request->input('menu_name');
        }

        if ($request->input('menu_cat') !== $menu->menu_cat) {
            $menu->menu_cat = $request->input('menu_cat');
        }

        if ($request->input('menu_desc') !== $menu->menu_desc) {
            $menu->menu_desc = $request->input('menu_desc');
        }

        if ($request->input('price') !== $menu->price) {
            $menu->price = $request->input('price');
        }

        $menu->save();

        return redirect()->route('dashboard')->with('success', 'Menu item updated successfully');
    }


    public function destroy(Menu $menu) {
        $imagePath = 'public/' . $menu->menu_img_path;
    
        if (Storage::exists($imagePath) && $menu->menu_img_path !== 'default.jpg') {
            Storage::delete($imagePath);
        }
    
        $menu->delete();
    
        return redirect()->route('dashboard')->with('success', 'Menu item deleted successfully');
    }
}

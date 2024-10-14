<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\product;
use Flasher\Toastr\Prime\ToastrInterface;

class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request){

        $category = new Category();
        $category->Category_name= $request->category;
        $category->save();
        toastr()->success('Your payment has been accepted.');
        return redirect()->back();

    }

    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->Success('Category Deleted Successfully.');
         return redirect()->back();

    }

    public function edit_category($id){

        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }


public function update_category( Request $request,$id){
    $data = Category::find($id);
    $data->Category_name =  $request->category;
    $data->save();
    return redirect('view_category');

}

public function add_product(){

    $category = Category::all();
    return view('admin.add_product', compact('category'));
}


public function upload_product(Request $request){
$data = new product;
$data->title = $request->title;
$data->description = $request->description;
$data->image = $request->image;
$data->price = $request->price;
$data->category = $request->category;

$image = $request->image;

if ($image){
    $imageName = time().'.'.$request->image->extension();
    $request->image->move('products', $imageName);

    // Save the image path in the database
    $data->image = $imageName;

$data->quantity= $request->quantity;
$data->save();
return redirect()->back();
}
}

public function view_product() {
    $product = Product::paginate(3);

    return view('admin.view_product', compact('product'));
}



public function delete_product($id){
    $data = product::find($id);
    $data->delete();
    return redirect()->back();
}

public function update_product($id){
    $data = product::find($id);
    return view('admin.update_product', compact('data'));
}

public function edit_product(Request $request, $id)
{
    $data = product::find($id);
    $data->title = $request->title;
    $data->description = $request->description;
    $data->price = $request->price;
    $data->category = $request->category;

    $image = $request->image;
    if ($image) {
        $imageName = time() . '.' . $image->getClientOriginalExtension(); // Corrected method name
        $request->image->move('products', $imageName);

        $data->image = $imageName;
    }

    $data->save();
    return redirect('/view_product');
}


}

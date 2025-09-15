<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductMaster;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function productAdd($id=null) {
        $productData = ProductMaster::find($id);
        $categoryList = Category::select('id','entrydate', 'title', 'image')
        ->whereIn('status', ['0'])
        ->get();
        
        $response = [];
        $response['categorys'] = $categoryList;
        $response['productData'] = $productData;                              
        return view('admin.productadd', $response);
    }

    public function productSubmit(Request $request) {
        $adminId = Auth::guard('admin')->user()->id;
        $editId = $request->editId;        

        $validatedAttrForImage = 'required';
        if ($editId > 0) {
            $validatedAttrForImage = 'nullable';
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required'],
            /* 'price' => ['required', 'numeric'],
            'dp' => ['required', 'numeric'], */
            'description' => ['string'],
            'image' => [$validatedAttrForImage,  'mimes:jpeg,jpg,png,webp,psd','min:1', 'max:15360']
        ]);

        if ($request->hasFile('image')) { 
            $path = $request->file('image')->store('productimg', 'public');
            $data['image'] = $path;
        }

        $data['status'] = '0';
        $data['addedby'] = $adminId;
        $data['category_id'] = $request->category;
        // $data['remarks'] = $request->remarks;
        $data['description'] = $request->description;
        $productMaster = ProductMaster::updateOrCreate(['id' => $editId], $data);

        $response = [];
        $response['status'] = 'Error';
        $response['msg'] = 'Some Error Occurred';
        if ($productMaster) { 
            $response['status'] = 'Success';
            if ($productMaster == $editId) {
                $response['msg'] = 'Product Updated Successfully.';
            }  else {                
                $response['msg'] = 'Product Added Successfully.';
            }         
        }
        return redirect()->route('admin.product.master.report')->with($response);
    }

    public function productDelete($id) {
        $adminId = Auth::guard('admin')->user()->id;
        $data = [];
        $data['statusby'] = $adminId;
        $data['status'] = '1';
        $ProductMasRes = ProductMaster::where('id', '=',$id)->update($data);

        $response = [];
        $response['status'] = 'Error';
        $response['msg'] = 'Master Product Is Not Deleted';
        if ($ProductMasRes > 0) {
            $response['status'] = 'Success';
            $response['msg'] = 'Master Product Is Deleted Successfully.';
        }
        return redirect()->back()->with($response);
    }

    public function productMasterReport() {
        $proMasList = DB::table('product_master as PM')
        ->join('category as CM', 'PM.category_id', '=', 'CM.id')
        ->select('PM.id', 'PM.entrydate', 'PM.name',  'PM.remarks', 'PM.image') 
        ->addSelect('CM.title as category')
        ->whereIn('PM.status', ['0', '2'])       
        ->get();
        
        $response = [];
        $response['proMasList'] = $proMasList;
        return view('admin.product-master-report', $response);
    }

    public function categoryForm($id=null) {
        $categoryData = Category::find($id);
        $response = [];
        $response['categoryData'] = $categoryData;
        return view('admin.categroy-form', $response);
    }

    public function categorySubmit(Request $request) {
        $adminId = Auth::guard('admin')->user()->id;
        $editId = $request->editId;


        $validatedAttrForImage = 'required';
        if ($editId > 0) {
            $validatedAttrForImage = 'nullable';
        }

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => [$validatedAttrForImage,  'mimes:jpeg,jpg,png,webp,psd','min:1', 'max:15360']
        ]);

        if ($request->hasFile('image')) { 
            /* $path = $request->file('image')->store('categoryimg', 'public');
            $data['image'] = $path; */
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('storage/categoryimg', $filename);
            $data['image'] = "categoryimg/". $filename;

            // $filee = $request->image;
        }

        $data['status'] = '0';
        $data['addedby'] = $adminId;
        $category = Category::updateOrCreate(['id' => $editId], $data);

        $response = [];
        $response['status'] = 'Error';
        $response['msg'] = 'Some Error Occurred';
        if ($category) {
            $response['status'] = 'Success';
            if ($category->id == $editId) {
                $response['msg'] = 'Category Updated Successfully.';
            } else {
                $response['msg'] = 'Category Inserted Successfully.';
            }         
        }
        return redirect()->route('admin.product.categroy.report')->with($response);
    }

    public function categoryReport() {
        $categoryList = Category::select('id', 'entrydate', 'title', 'image')
                                ->whereIn('status', ['0', '2'])
                                ->get();
        $response = [];
        $response['categoryList'] = $categoryList;
        return view('admin.categroy-report', $response);                           
    }

    public function categoryDelete($id) {
        $adminId = Auth::guard('admin')->user()->id;
        $data = [];
        $data['statusby'] = $adminId;
        $data['status'] = '1';
        $ProductMasRes = Category::where('id', '=',$id)->update($data);

        $response = [];
        $response['status'] = 'Error';
        $response['msg'] = 'Category Is Not Deleted';
        if ($ProductMasRes > 0) {
            $response['status'] = 'Success';
            $response['msg'] = 'Category Is Deleted Successfully.';
        }
        return redirect()->back()->with($response);
    }

    public function subProdctAdd($id) {
        $productSub = DB::table('product_sub_master as PSM')
            ->join('size as S', 'PSM.size', '=', 'S.id')
            ->select('PSM.entrydate', 'S.size', 'PSM.price', 'PSM.dp','PSM.id')
            ->where('PSM.product_id', '=', $id)
            ->whereIn('PSM.status', ['0', '2'])
            ->get();

        $excludedSizeIds = Product::where('status', '0')->where('product_id', $id)->pluck('size');            

        $sizeData = DB::table('size')
            ->whereNotIn('id', $excludedSizeIds)
            ->get();

        $response = [];
        $response['sizeData'] = $sizeData;
        $response['productId'] = $id;
        $response['productSub'] = $productSub;
        return view('admin.subproductform', $response);
    }

    public function subProductSubmit(Request $request) {
        $adminId = Auth::guard('admin')->user()->id;

        $response = [];
        $response['status'] = 'Error';
        $response['msg'] = 'Some Error Occurred';

        $productId = $request->productId;
        $request->validate([
            'size' => ['required'],
            'price' => ['required', 'numeric'],
            'dp' => ['required', 'numeric'],
        ]);

        $ProductMasterData = ProductMaster::find($productId);

        
        if ($ProductMasterData) {  
            $sizeId = $request->size;    
            $subProduct = Product::where('size', '=', $sizeId)
             ->where('product_id', '=', $productId)
             ->first();

            if ($subProduct) {
                $data = [];
                $data['statusdate'] = now();
                $data['statusby'] = $adminId;
                $data['status'] = '0';
                $data['price'] = $request->price;
                $data['dp'] = $request->dp;
                $subProductRes= Product::where('id', '=', $subProduct->id)->update($data);
            } else {
                $data = [];
                $data['entrydate'] = now();
                $data['product_id'] = $ProductMasterData->id;
                $data['price'] = $request->price;
                $data['dp'] = $request->dp;
                $data['size'] = $sizeId;
                $data['status'] = '0';
                $data['addedby'] = $adminId;
                $subProductRes = Product::insert($data);
            }

            if ($subProductRes) {
                $response['status'] = 'Success';
                $response['msg'] = 'Size Added Successfully';
            }
        }


        return redirect()->route('admin.product.subproduct.add', $productId)->with($response); 
        
    }

    public function subProductDelete($id) {
        $adminId = Auth::guard('admin')->user()->id;
        $data = [];
        $data['statusby'] = $adminId;
        $data['status'] = '1';
        $ProductMasRes = Product::where('id', '=',$id)->update($data);

        $response = [];
        $response['status'] = 'Error';
        $response['msg'] = 'Sub Product Is Not Deleted';
        if ($ProductMasRes > 0) {
            $response['status'] = 'Success';
            $response['msg'] = 'Sub Product Is Deleted Successfully.';
        }
        return redirect()->back()->with($response);
    }

    public function imageAdd($id) {
        $ImageData = ProductImage::where('product_id', $id)
            ->whereIn('status', ['0', '2'])
            ->get();
        $response = [];
        $response['productMasterId'] = $id;
        $response['ImageData'] = $ImageData;
        return view('admin.productimageadd', $response);
    }

    public function imageSubmit(Request $request) {        
        $response = [];
        $response['status'] = 'Error';
        $response['msg'] = 'Some Error Occurred';

        $productId = $request->masterProductId;
        $request->validate([            
            'image' => ['required',  'mimes:jpeg,jpg,png,webp,psd','min:1', 'max:15360']
        ]);

        $ProductMasterData = ProductMaster::find($productId);

        if ($ProductMasterData) {
            $data = [];    
            $data['entrydate'] = now();
            $data['product_id'] = $productId;                
            if ($request->hasFile('image')) { 
                $file = $request->file('image');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move('storage/productimg', $filename);
                $data['image'] = "productimg/". $filename;

                /* $path = $request->file('image')->store('productimg', 'public');
                $data['image'] = $path; */
                
                $productImageRes = ProductImage::insert($data);
                if ($productImageRes) {
                    $response['status'] = 'Success';
                    $response['msg'] = 'Product Image Added Successfully';
                }
            }            
        }

        return redirect()->back()->with($response);
    }

    public function ImageDelete($id) {
        $adminId = Auth::guard('admin')->user()->id;
        $data = [];
        $data['statusby'] = $adminId;
        $data['status'] = '1';
        $data['statusdate'] = now();
        $ProductMasRes = ProductImage::where('id', '=',$id)->update($data);

        $response = [];
        $response['status'] = 'Error';
        $response['msg'] = ' Product Image Is Not Deleted';
        if ($ProductMasRes > 0) {
            $response['status'] = 'Success';
            $response['msg'] = 'Product Image Is Deleted Successfully.';
        }
        return redirect()->back()->with($response);
    }
}

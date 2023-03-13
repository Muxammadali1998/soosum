<?php

namespace App\Http\Controllers;

use App\Models\AboutCompony;
use App\Models\AboutProduct;
use App\Models\Discount;
use App\Models\Fact;
use App\Models\Home;
use App\Models\Instruction;
use App\Models\Message;
use App\Models\Product;
use App\Models\Recommended;
use App\Models\Rule;
use App\Models\Special;
use App\Models\Testimonials;
use App\Models\Sertificat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    public function index()
    {
        $home = Home::first();
        $facts = Fact::all();
        $chegrma = Discount::first();
        $aboutproduct = AboutProduct::all();
        $compony = AboutCompony::first();
        $testimonials = Testimonials::first();
        $qollanma = Instruction::first();
        $recomended = Recommended::all();
        $product = Product::all();
        $special = Special::first();
        $sertificat = Sertificat::select('image')->get();
        $a =['titls'=>$testimonials , 'li'=>$recomended];
        
        
        return response()->json([
        'home'=>$home,
        'chegirma'=>$chegrma, 
        'produkt'=>$product,
        'aboutprodukt'=>$aboutproduct,
        'special'=>$special,
        'compony'=>$compony,
        'testimonials'=>$a,
        'facts'=>$facts,
        'qollanma'=>$qollanma,
        'sertificat'=>$sertificat]);

    }

    public function message(Request $request)
    {
        
        $validated = Validator::make($request->all(),[
            'name' => 'required',
            'phone' => 'required',
        ]);

        if($validated->fails()){
            return response()->json($validated->errors());
        }

        Message::create($request->all());
        return response()->json(true);
    }
}

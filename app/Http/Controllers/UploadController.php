<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;

class UploadController extends Controller
{
    public function index() {
        return view('upload');
    }

    public function store(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'name' => 'required',
            'actual_price' => 'required',
            'bidding_price' => 'required',
            'expiring_date' => 'required',
            'description' => 'required', 
    
        ]);

        // dd($request->hasFile('image'));

        // ensure the request has a file before we attempt anything else.
        if ($request->hasFile('file')) {

            $request->validate([
                'file' => 'mimes:jpeg,jpg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $file = $request-> file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads', $filename);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            // $request->file->store('images', 'public');

            // Store the record, using the new file hashname which will be it's new filename identity.
            $auction = Auction::create([
                'name'=> $request -> name,
                'image'=> $filename,
                'actual_price'=> $request -> actual_price,
                'bidding_price'=> $request -> bidding_price,
                'end_date'=> $request -> expiring_date,
                'description'=> $request -> description,
                'status' => True
            ]);
            // $product->save(); // Finally, save the record.
        }

        return view('upload');

    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Image;
use Storage;
use Session;
use Intervention\Image\ImageManager;
use Imagee;
use Validator;

class UploadController extends Controller
{

	public function index()
	{
		$images = Image::latest('created_at')->get();

		return view('admin.upload.index', compact('images', 'path'));
	}

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'images.*' => 'required|image'
        	]);
    if ($validator->fails()) 
    {
      return redirect('admin/upload')->withErrors($validator)->withInput();
    }

		$files = $request->file('images');
		$path = public_path('uploads/');
		if(!empty($files))
		{
			foreach($files as $file)
			{
				Storage::disk('uploads')->put($filename = str_random(6).'_'.$file->getClientOriginalName(), file_get_contents($file));

				$img = Imagee::make($path . $filename);
				$img->resize(320, null, function($constraint) 
				{
					$constraint->aspectRatio();
				});
				$img->save($path . 'thumbs/' . $filename);

				$image = Image::create(['file' => $filename]);
			}
		}

		Session::flash('flash_message', 'Hurra! Nowe focisze dodane pomyślnie!.');

		return redirect('admin/upload');
	}

	public function destroy($id)
	{
		$path = public_path('uploads/');


		$image = Image::findOrFail($id);
		$filename = $image->file;

		Storage::disk('uploads')->delete([$filename, 'thumbs/' . $filename]);
		$image->delete();

		return redirect('admin/upload');
	}


}

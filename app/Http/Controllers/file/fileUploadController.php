<?php namespace App\Http\Controllers\file;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use App\Http\Controllers\Controller;
use ZipArchive;
use File;

class fileuploadController extends Controller
{
    public function uploadLargeFiles(Request $request)
    {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            // file not uploaded
        }

        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) {
            // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.' . $extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name

            $disk = Storage::disk(config('filesystems.default'));
            $path = $disk->putFileAs('temp/file/upload', $file, $fileName);
        
            if (!$path) {
                // Log or handle the error
                return response()->json(['error' => 'Failed to move file to storage']);
            }
            // delete chunked file
            unlink($file->getPathname());
            // return 'storage/' . $path;

            return response()->json([
                'path' => $path,
                'filename' => $fileName,
            ]);
            return response()->json([
                'path' => 'storage/' . $path,
                'filename' => $fileName,
            ]);
        }

        // otherwise return percentage information
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true,
        ];
    }


  
}

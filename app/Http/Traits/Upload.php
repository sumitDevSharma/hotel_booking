<?php

namespace App\Http\Traits;

use Intervention\Image\Laravel\Facades\Image;

trait Upload
{
    public function makeDirectory($path)
    {
        if (file_exists($path)) return true;
        return mkdir($path, 0755, true);
    }

    public function removeFile($path)
    {
        return file_exists($path) && is_file($path) ? @unlink($path) : false;
    }

    public function uploadImage($file, $location, $size = null, $old = null, $thumb = null, $filename = null)
    {
        
        try{
            $path = $this->makeDirectory($location);
            if (!$path) throw new \Exception('File could not been created.');
            // dd($path);
            if (!empty($old)) {
                $this->removeFile($location . '/' . $old);
                $this->removeFile($location . '/thumb_' . $old);
            }

            if ($filename == null) {
                $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
            }
           
            $image = Image::read($file);
            if (!empty($size)) {
                $size = explode('x', strtolower($size));
                $image->resize($size[0], $size[1]);
            }
            $image->save($location . '/' . $filename);
            if (!empty($thumb)) {
                $thumb = explode('x', $thumb);
                Image::read($file)->resize($thumb[0], $thumb[1])->save($location . '/thumb_' . $filename);
            }
            return $filename;
        }catch (\Exception $e){
            
            return $e->getMessage();
        }
    
    }


}


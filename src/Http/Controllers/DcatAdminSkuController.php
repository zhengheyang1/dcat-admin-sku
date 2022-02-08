<?php

namespace Zhy\Sku\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DcatAdminSkuController extends Controller
{

    public function uploadFile(Request $request)
    {
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $dir = trim($request->get('dir'), '/');
            $disk = $this->disk();

            $newName = $this->generateNewName($file);

            $disk->putFileAs($dir, $file, $newName);

            // 返回格式
            return ['url' => $disk->url("{$dir}/$newName")];
        }
    }


    protected function generateNewName(UploadedFile $file)
    {
        return uniqid(md5($file->getClientOriginalName())).'.'.$file->getClientOriginalExtension();
    }

    /**
     * @return \Illuminate\Contracts\Filesystem\Filesystem
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    protected function disk()
    {
        $disk = request()->get('disk') ?: config('admin.upload.disk');

        return Storage::disk($disk);
    }
}

<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class Upload extends BaseController
{
    protected $helpers = ['form'];

    protected $upload_file_max, $upload_dir, $upload_path, $allow_upload;  

    public function __construct() {
        $this->upload_file_max =  env('app.uploadFileMax', 1000);
        $this->upload_dir =  env('app.publicUploadDir', '/public/uploads/');
        $this->upload_path =  env('app.publicUploadPath', '/uploads/');
        $this->allow_upload =  env('app.allowUpload', true);

        $upload_dir = ROOTPATH . $this->upload_dir;
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $upload_files_dir = ROOTPATH . $this->upload_dir.'files/';
        if (!is_dir($upload_files_dir)) {
            mkdir($upload_files_dir, 0755, true);
        }
        $upload_thumbs_dir = ROOTPATH . $this->upload_dir.'thumbs/';
        if (!is_dir($upload_thumbs_dir)) {
            mkdir($upload_thumbs_dir, 0755, true);
        }
    }
    
    public function index()
    {
        $data['title'] = 'Single Upload';
        $data['active_page'] = 'supg';
        $data['allow_upload'] = $this->allow_upload;
        $data['errors'] = [];
        return view('pages/upload_form', $data);
    }

    public function multiple()
    {
        $data['title'] = 'Multiple Upload';
        $data['active_page'] = 'mupg';
        $data['allow_upload'] = $this->allow_upload;
        $data['errors'] = [];
        return view('pages/upload_form_multiple', $data);
    }

    public function dropzone()
    {
        $data['title'] = 'Dropzone Upload';
        $data['active_page'] = 'dupg';
        $data['allow_upload'] = $this->allow_upload;
        $data['errors'] = [];
        return view('pages/upload_form_dropzone', $data);
    }


    public function uploadImage()
    {
        $noRedirect = $this->request->getPost('no-redirect');

        if($this->allow_upload === false){
            if($noRedirect){
                die('Sorry, you not allow to upload image!');
            }
            return redirect()->back()->with('errors', ['Sorry, you not allow to upload image!']);
        }

        $validationRule = [
            'file' => [
                'label' => 'Image file',
                'rules' => 'uploaded[file]'
                    . '|is_image[file]'
                    . '|mime_in[file,image/jpg,image/jpeg,image/gif,image/png]'
                    . '|max_size[file,'.$this->upload_file_max.']'
            ],
        ];
        if (! $this->validate($validationRule)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $image = \Config\Services::image();

        // # Multiple upload
        $files = $this->request->getFileMultiple('file');
        if($files){
            $data = [];
            foreach ($files as $key => $file) {
                if ($file->isValid() && ! $file->hasMoved()) {
                    
                    $newName = $file->getRandomName();
                    $data[] = [
                        'name' =>  $file->getName(),
                        'ext' => $file->getClientExtension(),
                        'type' => $file->getClientMimeType(),
                        'new_filename' => $newName,
                        'new_path' => base_url() . $this->upload_path .'files/'. $newName,
                    ];
                    $file->move(ROOTPATH . $this->upload_dir.'files/', $newName);
                    $filepath = ROOTPATH . $this->upload_dir.'files/'.$newName;
                    
                    $image->withFile($filepath)
                    ->fit(250, 250, 'center')
                    ->save(ROOTPATH . $this->upload_dir.'thumbs/'.$newName);

                    if($this->allow_upload === 'mock'){
                        unlink($filepath);
                        unlink(ROOTPATH . $this->upload_dir.'thumbs/'.$newName);
                    }
                }
            }

            if($noRedirect){
                exit;
            }
            return redirect()->back()->with('success', $data);
        }

        // # Single upload
        $file = $this->request->getFile('file');

        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $data = [
                'name' =>  $file->getName(),
                'ext' => $file->getClientExtension(),
                'type' => $file->getClientMimeType(),
                'new_filename' => $newName,
                'new_path' => base_url() . $this->upload_path .'files/'. $newName,
            ];
            $file->move(ROOTPATH . $this->upload_dir.'files/', $newName);
            $filepath = ROOTPATH . $this->upload_dir.'files/'.$newName;

            $image->withFile($filepath)
                    ->fit(250, 250, 'center')
                    ->save(ROOTPATH . $this->upload_dir.'thumbs/'.$newName);
            
            if($this->allow_upload === 'mock'){
                unlink($filepath);
                unlink(ROOTPATH . $this->upload_dir.'thumbs/'.$newName);
            }

            return redirect()->back()->with('success', $data);
        }

        return redirect()->back()->with('errors', ['The file has already been moved.']);
    }

    public function uploadPdf()
    {
        $noRedirect = $this->request->getPost('no-redirect');

        if($this->allow_upload === false){
            if($noRedirect){
                die('Sorry, you not allow to upload pdf file!');
            }
            return redirect()->back()->with('errors', ['Sorry, you not allow to upload pdf file!']);
        }

        $validationRule = [
            'file' => [
                'label' => 'PDF file',
                'rules' => 'uploaded[file]'
                    . '|mime_in[file,application/pdf]'
                    . '|max_size[file,'.$this->upload_file_max.']'
            ],
        ];
        if (! $this->validate($validationRule)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        // # Multiple upload
        $files = $this->request->getFileMultiple('file');
        if($files){
            $data = [];
            foreach ($files as $key => $file) {
                if ($file->isValid() && ! $file->hasMoved()) {
                    
                    $newName = $file->getRandomName();
                    $data[] = [
                        'name' =>  $file->getName(),
                        'ext' => $file->getClientExtension(),
                        'type' => $file->getClientMimeType(),
                        'new_filename' => $newName,
                        'new_path' => base_url() . $this->upload_path.'files/'.$newName,
                    ];
                    $file->move(ROOTPATH . $this->upload_dir.'files/', $newName);
                    $filepath = ROOTPATH . $this->upload_dir.'files/'.$newName;

                    if($this->allow_upload === 'mock'){
                        unlink($filepath);
                    }
                }
            }

            if($noRedirect) { 
                exit;
            }

            return redirect()->back()->with('success', $data);
        }

        // # Single upload
        $file = $this->request->getFile('file');

        if ($file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $data = [
                'name' =>  $file->getName(),
                // 'originalName' => $file->getClientName(),
                // 'tempfile' => $file->getTempName(),
                'ext' => $file->getClientExtension(),
                'type' => $file->getClientMimeType(),
                'new_filename' => $newName,
                'new_path' => base_url() . $this->upload_path.'files/'.$newName,
            ];
            $file->move(ROOTPATH . $this->upload_dir.'files/', $newName);
            $filepath = ROOTPATH . $this->upload_dir.'files/'.$newName;

            if($this->allow_upload === 'mock'){
                unlink($filepath);
            }

            return redirect()->back()->with('success', $data);
        }
        
        return redirect()->back()->with('errors', ['The file has already been moved.']);
    }

}
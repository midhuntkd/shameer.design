<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HomeBannerModel;

class HomeBannerController extends BaseController
{
    public function index()
    {
        $model = new HomeBannerModel();
        $banners = $model->orderBy('sort_order', 'ASC')->findAll();

        return view('admin/banners/index', [
            'banners' => $banners,
            'pageTitle' => 'Home Banners',
        ]);
    }

    public function create()
    {
        return view('admin/banners/form', [
            'banner' => null,
            'action' => 'admin/banners/store',
            'method' => 'create',
            'pageTitle' => 'Create Banner',
        ]);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|min_length[2]',
            'year' => 'permit_empty|max_length[20]',
            'type' => 'permit_empty|max_length[100]',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,2048]',
            'link_url' => 'permit_empty|valid_url',
            'sort_order' => 'permit_empty|integer',
            'is_active' => 'permit_empty|in_list[0,1]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('image');
        $imagePath = moveUploadedFile($file, 'banners');
        if ($imagePath === null) {
            return redirect()->back()->withInput()->with('error', 'Failed to upload banner image.');
        }

        $model = new HomeBannerModel();
        $model->insert([
            'title' => $this->request->getPost('title'),
            'year' => $this->request->getPost('year') ?: null,
            'type' => $this->request->getPost('type') ?: null,
            'image_path' => $imagePath,
            'link_url' => $this->request->getPost('link_url') ?: null,
            'sort_order' => (int)($this->request->getPost('sort_order') ?: 0),
            'is_active' => (int)($this->request->getPost('is_active') ?: 0),
        ]);

        return redirect()->to('admin/banners')->with('success', 'Banner created.');
    }

    public function edit($id)
    {
        $model = new HomeBannerModel();
        $banner = $model->find($id);

        if (!$banner) {
            return redirect()->to('admin/banners')->with('error', 'Banner not found.');
        }

        return view('admin/banners/form', [
            'banner' => $banner,
            'action' => 'admin/banners/update/' . $id,
            'method' => 'edit',
            'pageTitle' => 'Edit Banner',
        ]);
    }

    public function update($id)
    {
        $rules = [
            'title' => 'required|min_length[2]',
            'year' => 'permit_empty|max_length[20]',
            'type' => 'permit_empty|max_length[100]',
            'image' => 'permit_empty|is_image[image]|max_size[image,2048]',
            'link_url' => 'permit_empty|valid_url',
            'sort_order' => 'permit_empty|integer',
            'is_active' => 'permit_empty|in_list[0,1]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new HomeBannerModel();
        $banner = $model->find($id);
        if (!$banner) {
            return redirect()->to('admin/banners')->with('error', 'Banner not found.');
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'year' => $this->request->getPost('year') ?: null,
            'type' => $this->request->getPost('type') ?: null,
            'link_url' => $this->request->getPost('link_url') ?: null,
            'sort_order' => (int)($this->request->getPost('sort_order') ?: 0),
            'is_active' => (int)($this->request->getPost('is_active') ?: 0),
        ];

        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newPath = moveUploadedFile($file, 'banners');
            if ($newPath !== null) {
                $data['image_path'] = $newPath;
                removeUploadedFile($banner['image_path'] ?? null);
            }
        }

        $model->update($id, $data);

        return redirect()->to('admin/banners')->with('success', 'Banner updated.');
    }

    public function delete($id)
    {
        $model = new HomeBannerModel();
        $banner = $model->find($id);
        if ($banner) {
            removeUploadedFile($banner['image_path'] ?? null);
            $model->delete($id);
        }

        return redirect()->to('admin/banners')->with('success', 'Banner deleted.');
    }
}

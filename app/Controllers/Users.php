<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('users/index', [
            'title' => 'User Accounts',
            'users' => $this->userModel->findAll()
        ]);
    }

    public function createForm()
    {
        return view('users/new', [
            'title' => 'Add New User'
        ]);
    }

    public function create()
    {
        $rules = [
            'username' => 'required|min_length[4]|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|min_length[2]|max_length[100]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $avatarName = $this->uploadAvatar();

        if ($avatarName === false) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->userModel->insert([
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'avatar' => $avatarName,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/users')
            ->with('success', 'User added successfully.');
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);

        if (! $user) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('users/edit', [
            'title' => 'Edit User',
            'user' => $user
        ]);
    }

    public function update($id)
    {
        $rules = [
            'username' => 'required|min_length[4]|max_length[50]|is_unique[users.username,id,' . $id . ']',
            'full_name' => 'required|min_length[2]|max_length[100]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name')
        ];

        $avatarName = $this->uploadAvatar();

        if ($avatarName === false) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        if ($avatarName !== null) {
            $data['avatar'] = $avatarName;
        }

        $this->userModel->update($id, $data);

        return redirect()->to('/users')
            ->with('success', 'User updated successfully.');
    }

    private function uploadAvatar()
    {
        $file = $this->request->getFile('avatar');

        if ($file === null || $file->getError() === UPLOAD_ERR_NO_FILE) {
            return null;
        }

        $rules = [
            'avatar' => 'uploaded[avatar]|max_size[avatar,2048]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]'
        ];

        if (! $this->validate($rules)) {
            return false;
        }

        $temporaryFolder = WRITEPATH . 'uploads/';
        $publicFolder = FCPATH . 'uploads/';

        if (! is_dir($temporaryFolder)) {
            mkdir($temporaryFolder, 0777, true);
        }

        $newName = $file->getRandomName();

        $file->move($temporaryFolder, $newName);

        service('image')
            ->withFile($temporaryFolder . $newName)
            ->fit(250, 250, 'center')
            ->save($publicFolder . $newName, 85);

        return $newName;
    }
}
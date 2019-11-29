<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileFormRequest;

class UserController extends Controller {

    public function profile() {
        return view('site.profile.profile');
    }

    public function profileUpdate(UpdateProfileFormRequest $request) {
        $user = auth()->user();

        $data = $request->all();

        if ($data['password'] != null)
            $data['password'] = bcrypt($data['password']);
        else
            unset($data['password']);

        $update = $user->update($data);

        if ($update)
            return redirect()->route('profile')->with('success', 'Atualizado com sucesso');

        return redirect()->back()->with('error', 'Falha ao atualizar..');
    }

}

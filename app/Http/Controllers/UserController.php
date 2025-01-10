<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all(); 
        return view('home', compact('users')); 
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // Validação
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser um texto.',
            'name.max' => 'O nome não pode ter mais que 255 caracteres.',

            'email.required' => 'O campo e-mail é obrigatório.',
            'email.string' => 'O campo e-mail deve ser um texto.',
            'email.email' => 'Informe um endereço de e-mail válido.',
            'email.max' => 'O e-mail não pode ter mais que 255 caracteres.',
            'email.unique' => 'Este e-mail já está cadastrado.',

            'password.required' => 'O campo senha é obrigatório.',
            'password.string' => 'A senha deve ser um texto.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
        ]);

        // Criação do usuário
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('home')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Validação dos campos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser um texto.',
            'name.max' => 'O nome não pode ter mais que 255 caracteres.',

            'email.required' => 'O campo e-mail é obrigatório.',
            'email.string' => 'O campo e-mail deve ser um texto.',
            'email.email' => 'Informe um endereço de e-mail válido.',
            'email.max' => 'O e-mail não pode ter mais que 255 caracteres.',
            'email.unique' => 'Este e-mail já está cadastrado.',

            'password.string' => 'A senha deve ser um texto.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
        ]);

        // Atualização dos dados
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('home')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id); 
        $user->delete(); 

        return redirect()->route('home')->with('success', 'Usuário excluído com sucesso!');
    }
}

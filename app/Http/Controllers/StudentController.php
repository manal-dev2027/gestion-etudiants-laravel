<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{   
    public function index()
{
    $search = request('search');

    $students = Student::query()
        ->when($search, function ($query, $search) {
            $query->where('first_name', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })
        ->latest()
        ->get();

    return view('students.index', compact('students', 'search'));
}
    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        
    $validated = $request->validate([
     'last_name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\'-]+$/u'],
     'first_name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\'-]+$/u'],
     'email' => 'required|email|unique:students,email',
     'phone' => ['nullable', 'regex:/^[0-9+\s()-]{6,20}$/'],
     'birth_date' => 'nullable|date|before_or_equal:today',
], [
     'last_name.regex' => 'Le nom doit contenir uniquement des lettres.',
     'first_name.regex' => 'Le prénom doit contenir uniquement des lettres.',
     'phone.regex' => 'Le téléphone doit contenir un numéro valide.',
     'birth_date.date' => 'Veuillez entrer une date valide.',
     'birth_date.before_or_equal' => 'La date de naissance ne peut pas être dans le futur.',
]);
        Student::create($validated);

        return redirect('/students')->with('success', 'Étudiant ajouté avec succès.');
    }

    public function show(string $id)
{
    $student = Student::findOrFail($id);

    return view('students.show', compact('student'));
}

    public function edit(string $id)
{
    $student = Student::findOrFail($id);

    return view('students.edit', compact('student'));
}

    public function update(Request $request, string $id)
{
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'last_name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\'-]+$/u'],
        'first_name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\'-]+$/u'],
        'email' => 'required|email|unique:students,email,' . $student->id,
        'phone' => ['nullable', 'regex:/^[0-9+\s()-]{6,20}$/'],
        'birth_date' => 'nullable|date_format:Y-m-d|before_or_equal:today',
    ]);

    $student->update($validated);

    return redirect('/students')->with('success', 'Étudiant modifié avec succès.');
}

    public function destroy(string $id)
{
    $student = Student::findOrFail($id);

    $student->delete();

    return redirect('/students')->with('success', 'Étudiant supprimé avec succès.');
}
}

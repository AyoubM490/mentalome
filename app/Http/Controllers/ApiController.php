<?php

namespace App\Http\Controllers;

use App\Models\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ApiController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'gene_ids' => 'required',
            'disease' => 'required',
            'experiment' => 'required',
            'SRA' => 'required'
        ]);

        Api::create($attributes);

        return redirect('/');
    }
}

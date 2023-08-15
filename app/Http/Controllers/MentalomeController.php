<?php

namespace App\Http\Controllers;

use App\Models\Mentalome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class MentalomeController extends Controller
{
    public function __invoke()
    {
        $gene_ids = DB::table('mentalomes')->select('gene_ids')->distinct()->paginate(80);
        $selected_gene_ids = DB::table('mentalomes')->select('gene_ids')->distinct()->whereIn('gene_ids', ['A1BG', 'A1BG-AS1', 'A1CF', 'A2M', 'A2M-AS1', 'A2ML1', 'A2MP1', 'A3GALT2', 'A4GALT', 'A4GNT', 'AA06', 'AAAS', 'AACS', 'AACSP1', 'AADAC'])->get();
        $diseases = DB::table('mentalomes')->select('disease')->distinct()->get();
        $experiments = DB::table('mentalomes')->select('experiment')->distinct()->get();
        $sras = DB::table('mentalomes')->select('sra')->distinct()->get();
        $abbreviations = $this->getValues()->select('Abbreviation')->distinct()->get();
        $gene_ids_search = Mentalome::query()
            ->when(request('search'), function($query, $search) {
                $query->where('gene_ids', 'like', '%' . $search . '%');
            })
            ->paginate(10)
            ->withQueryString()
            ->through(fn($mentalome) => [
                'gene_id' => $mentalome->gene_ids
            ]);


        return Inertia::render('Mentalome', [
            'gene_ids' => $gene_ids,
            'selected_gene_ids' => $selected_gene_ids,
            'diseases' => $diseases,
            'experiments' => $experiments,
            'sras' => $sras,
            'abbreviations' => $abbreviations,
            'values' => $this->getValues()->get(),
            'gene_ids_search' => $gene_ids_search,
            'filters' => request()
        ]);
    }

    protected function getValues() {
        $gene_ids = json_decode(DB::table('apis')->latest()->select('gene_ids')->first()->gene_ids, true);
        $disease = DB::table('apis')->latest()->select('disease')->first();
        $experiments = DB::table('apis')->latest()->select('experiment')->first();
        $sras = DB::table('apis')->latest()->select('SRA')->first();

        if ($experiments?->experiment === 'All') {
            $experiments = DB::table('mentalomes')->select('experiment')->distinct()->get()->pluck('experiment')->toArray();
        }

        if ($sras?->SRA === 'All') {
            $sras = DB::table('mentalomes')->select('sra')->distinct()->get()->pluck('sra');
        } else {
            $sras = [$sras?->SRA];
        }

//        dd(DB::table('mentalomes')->whereIn('gene_ids', $gene_ids)->whereIn('experiment', [$experiments->experiment])->whereIn('sra', $sras)->where('disease', '=', $disease?->disease));
//        $experiments = is_array($experiments) ? $experiments : $experiments->toArray();
        if (is_array($experiments)) {
            $values = DB::table('mentalomes')->whereIn('gene_ids', $gene_ids)->whereIn('experiment', $experiments)->whereIn('sra', $sras)->where('disease', '=', $disease?->disease);
        } else {
            $values = DB::table('mentalomes')->whereIn('gene_ids', $gene_ids)->whereIn('experiment', [$experiments->experiment])->whereIn('sra', $sras)->where('disease', '=', $disease?->disease);
        }

        return $values;
    }
}

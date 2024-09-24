<?php


namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqType;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('faqs.index', compact('faqs'));
    }
   public function showCreateForm()
{
    $faqTypes = \App\Models\FaqType::all(); 
    return view('admin.faqs.create', compact('faqTypes'));
}
public function create(Request $request)
{
    $request->validate([
        'faq_type' => 'required|string|max:255', 
        'display_name' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    Faq::create([
        'faq_type' => $request->faq_type, 
        'display_name' => $request->display_name,
        'description' => $request->description,
    ]);

    return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully!');
}

public function search(Request $request)
{
    $searchTerm = $request->get('query');
   
    $faqs = Faq::where('display_name', 'LIKE', "%{$searchTerm}%")
                ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                ->get(['display_name', 'description']);  

    if ($request->ajax()) {
        return response()->json($faqs);
    }

    return view('faqs.search', compact('faqs', 'searchTerm'));
}



    public function adminIndex()
    {
        $faqs = Faq::with('type')->get();
        $faqTypes = FaqType::all();
        return view('admin.faqs.index', compact('faqs', 'faqTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'display_name' => 'required|string|max:255',
            'description' => 'required|string',
            'faq_type_id' => 'required|exists:faq_types,id',
        ]);

        Faq::create($request->all());
        return redirect()->route('admin.faqs.index');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        $faqTypes = FaqType::all();
        return view('admin.faqs.edit', compact('faq', 'faqTypes'));
    }

    public function update(Request $request, $id)
{
    
    $request->validate([
        'display_name' => 'required|string|max:255',
        'description' => 'required|string',
        'faq_type' => 'required', 
    ]);


    $faq = Faq::findOrFail($id);
    
    
    $faq->update($request->all());

    
    return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully!');
}

    public function listSpecialFaqs()
    {
        
        $faqs = Faq::whereIn('faq_type', ['Glossary', 'Abbreviation'])->get();

        return view('faqs.special', ['faqs' => $faqs]);
    }

    public function destroy($id)
{
    $faq = Faq::findOrFail($id);

    
    $faq->delete();

   
    return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully!');
}

}

<?php

// app/Http/Controllers/FaqController.php
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
    $faqTypes = \App\Models\FaqType::all(); // Assuming you have a FaqType model
    return view('admin.faqs.create', compact('faqTypes'));
}
public function create(Request $request)
{
    $request->validate([
        'faq_type' => 'required|string|max:255', // Validate the string
        'display_name' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    // Create the FAQ entry
    Faq::create([
        'faq_type' => $request->faq_type, // Store the string value directly
        'display_name' => $request->display_name,
        'description' => $request->description,
    ]);

    return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully!');
}

public function search(Request $request)
{
    $searchTerm = $request->get('query');
    
    // Searching FAQs based on the display name
    $faqs = Faq::where('display_name', 'LIKE', "%{$searchTerm}%")
                ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                ->get(['display_name', 'description']); // Get only necessary fields

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
    // Validate the input
    $request->validate([
        'display_name' => 'required|string|max:255',
        'description' => 'required|string',
        'faq_type' => 'required', // No need to validate as integer since it can be string
    ]);

    // Find the FAQ by ID
    $faq = Faq::findOrFail($id);
    
    // Update the FAQ with all the request data
    $faq->update($request->all());

    // Redirect to the FAQ index page after successful update
    return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully!');
}

    public function listSpecialFaqs()
    {
        // Retrieve FAQs where faq_type is either 'Glossary' or 'Abbreviation'
        $faqs = Faq::whereIn('faq_type', ['Glossary', 'Abbreviation'])->get();

        // Return a view, passing the retrieved FAQs to the view
        return view('faqs.special', ['faqs' => $faqs]);
    }

    public function destroy($id)
{
    $faq = Faq::findOrFail($id);

    // Delete the FAQ
    $faq->delete();

    // Redirect back to the FAQ index page with a success message
    return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully!');
}

}

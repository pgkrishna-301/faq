@extends('layouts.app')

@section('title', 'Edit FAQ')

@section('content')
<div class="faq-edit-container">
    <h1>Edit FAQ</h1>
    <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="display_name">Display Name</label>
            <input type="text" class="form-control" name="display_name" value="{{ $faq->display_name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" required>{{ $faq->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="faq_type_id">FAQ Type</label>
            <select class="form-control" name="faq_type">
                <!-- Static options -->
                <option value="tooltip" {{ $faq->faq_type == 'tooltip' ? 'selected' : '' }}>Tool-tip</option>
                <option value="abbreviation" {{ $faq->faq_type == 'abbreviation' ? 'selected' : '' }}>Abbreviation</option>
                <option value="glossary" {{ $faq->faq_type == 'glossary' ? 'selected' : '' }}>Glossary</option>
                <option value="demo" {{ $faq->faq_type == 'demo' ? 'selected' : '' }}>Demo</option>
                <!-- Dynamic options from the database -->
                @foreach($faqTypes as $type)
                    <option value="{{ $type->id }}" {{ $faq->faq_type == $type->id ? 'selected' : '' }}>{{ $type->display_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update FAQ</button>
    </form>
</div>

<style>
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        overflow: hidden; /* Prevent scrolling */
        font-family: Arial, sans-serif;
        color: #333;
        background-image: url('/images/bg%20(1).jpg'); /* Replace with your image path */
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        animation: moveBackground 20s ease infinite;
    }

    @keyframes moveBackground {
        0% { background-position: 0% 0%; }
        50% { background-position: 100% 100%; }
        100% { background-position: 0% 0%; }
    }

    .faq-edit-container {
        max-width: 600px;
        height: 80%; /* Set a height to center vertically */
        margin: auto;
        background-color: rgba(0, 0, 0, 0.7);
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
        justify-content: center; /* Center content vertically */
        animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    h1 {
        text-align: center;
        font-size: 28px;
        margin-bottom: 20px;
        color: #fff; /* Change h1 color to white */
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        color: white; /* Set label text color to white */
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        resize: none; /* Prevent resizing for textarea */
        transition: border-color 0.3s, box-shadow 0.3s; /* Transition for smooth effect */
    }

    .form-control:hover,
    .form-control:focus {
        border-color: #007BFF; /* Change border color on hover and focus */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Add shadow on hover and focus */
        outline: none; /* Remove default outline */
    }
    
    .btn-primary {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
@endsection

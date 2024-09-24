<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add FAQ</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/create.css') }}" rel="stylesheet">
 
</head>
<body>
<div class="container">
    <h2 class="text-center my-4">Add FAQ</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.faqs.create') }}" method="POST" class="faq-form">
        @csrf
        <div class="mb-3">
            <label for="faq_type" class="form-label">FAQ Type</label>
            <select class="form-select" id="faq_type" name="faq_type" required>
                <option value="">Select FAQ Type</option>
                <option value="Tool-tip">Tool-tip</option>
                <option value="Abbreviation">Abbreviation</option>
                <option value="Glossary">Glossary</option>
                <option value="Demo">Demo</option>
            </select>
            @error('faq_type')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="display_name" class="form-label">Question</label>
            <input type="text" class="form-control" id="display_name" name="display_name"  required>
            @error('display_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Answer</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create FAQ</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

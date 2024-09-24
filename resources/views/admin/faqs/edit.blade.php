@extends('layouts.app')

@section('title', 'Edit FAQ')

@section('content')
<link href="{{ asset('css/edit.css') }}" rel="stylesheet">
<body>
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
                <option value="tooltip" {{ $faq->faq_type == 'tooltip' ? 'selected' : '' }}>Tool-tip</option>
                <option value="abbreviation" {{ $faq->faq_type == 'abbreviation' ? 'selected' : '' }}>Abbreviation</option>
                <option value="glossary" {{ $faq->faq_type == 'glossary' ? 'selected' : '' }}>Glossary</option>
                <option value="demo" {{ $faq->faq_type == 'demo' ? 'selected' : '' }}>Demo</option>
                @foreach($faqTypes as $type)
                    <option value="{{ $type->id }}" {{ $faq->faq_type == $type->id ? 'selected' : '' }}>{{ $type->display_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update FAQ</button>
    </form>
</div>


@endsection

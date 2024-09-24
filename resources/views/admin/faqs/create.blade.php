
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add FAQ</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            color: black; /* Set body text color to black */
        }

        .faq-form {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .faq-form .form-label {
            font-weight: bold;
            color: black; /* Set label text color to black */
        }

        .faq-form .form-control {
            border: 1px solid #007bff;
            transition: border-color 0.3s;
        }

        .faq-form .form-control:focus {
            border-color: #0056b3;
            box-shadow: 0 0 5px rgba(0, 86, 179, 0.5);
        }

        .faq-form .form-select {
            border: 1px solid #007bff; /* Border color */
            border-radius: 5px; /* Rounded corners */
            padding: 10px; /* Padding for better spacing */
            background-color: #fff; /* Background color */
            color: black; /* Text color */
            transition: border-color 0.3s, box-shadow 0.3s; /* Smooth transition */
        }

        .faq-form .form-select:hover {
            border-color: #0056b3; /* Darker border on hover */
            box-shadow: 0 0 5px rgba(0, 86, 179, 0.5); /* Shadow effect on hover */
            cursor: pointer; /* Pointer cursor on hover */
        }

        .faq-form .form-select:focus {
            border-color: #0056b3; /* Darker border on focus */
            outline: none; /* Remove default outline */
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transition: background-color 0.3s;
        }

        .text-danger {
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }
    </style>
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
            <label for="display_name" class="form-label">Display Name</label>
            <input type="text" class="form-control" id="display_name" name="display_name" required>
            @error('display_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create FAQ</button>
    </form>
</div>

<!-- Bootstrap and jQuery JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


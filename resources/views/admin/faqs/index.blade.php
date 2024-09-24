<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage FAQs</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{ asset('css/admin_index.css') }}" rel="stylesheet"> <!-- Load your custom CSS -->

</head>
<body>

<div class="container">
    <h1>Manage FAQs</h1>

    <button class="btn btn-primary mb-3" id="addFaqButton">Add FAQ</button>

    <!-- FAQ Table -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>FAQ Type</th>
                    <th>Display Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($faqs as $faq)
                <tr>
                    <td>{{ $faq->faq_type }}</td>
                    <td>{{ $faq->display_name }}</td>
                    <td>{{ $faq->description }}</td>
                    <td>
                        <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this FAQ?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<!-- Add FAQ Modal -->
<div class="modal fade" id="addFaqModal" tabindex="-1" role="dialog" aria-labelledby="addFaqModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFaqModalLabel">Add FAQ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="faqFormContainer">
                <!-- AJAX loaded form will be inserted here -->
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap and jQuery JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Custom JS -->
<script src="{{ asset('js/script.js') }}"></script> <!-- Load your custom JS -->

<script>
    $(document).ready(function() {
        $('#addFaqButton').click(function() {
            // Load the FAQ creation form via AJAX
            $.ajax({
                url: '{{ route("admin.faqs.create.form") }}',
                method: 'GET',
                success: function(data) {
                    $('#faqFormContainer').html(data);
                    $('#addFaqModal').modal('show');
                },
                error: function() {
                    alert('Could not load the form. Please try again later.');
                }
            });
        });
    });
</script>

</body>
</html>

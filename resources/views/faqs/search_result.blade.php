@if($faqs->isNotEmpty())
    @foreach($faqs as $faq)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $faq->display_name }}</h5>
                <p class="card-text">{{ $faq->description }}</p>
            </div>
        </div>
    @endforeach
@else
    <p>No FAQs found.</p>
@endif

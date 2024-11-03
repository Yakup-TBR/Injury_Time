<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FAQ - InKostel</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <meta property="og:title" content="FAQ - InKostel">
    <meta property="og:description" content="Find answers to your questions about InKostel.">
    <meta property="og:image" content="{{ asset('path/to/your/image.jpg') }}">
    <meta property="og:url" content="{{ request()->url() }}">
    <style>
      /* Set background color for the entire page */
      body {
        background-color: #E7FAF6;
      }

      /* Default (inactive) badge color */
      .accordion-button .badge {
        background-color: #CFE2FF;
        color: #000;
      }

      /* Active badge color when FAQ is open */
      .accordion-button:not(.collapsed) .badge {
        background-color: #fff;
        color: #000;
      }
    </style>
  </head>
  <body>
    <div class="container my-5">
      <h1 class="text-center mb-4">Frequently Asked Questions</h1>
      <div class="accordion accordion-flush" id="faqAccordion">
        @foreach($faqs as $faq)
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $faq->id_faq }}">
              <button class="accordion-button collapsed" type="button" 
                      data-bs-toggle="collapse" 
                      data-bs-target="#collapse{{ $faq->id_faq }}" 
                      aria-expanded="false" 
                      aria-controls="collapse{{ $faq->id_faq }}" 
                      aria-label="Toggle {{ $faq->pertanyaan }}">
                {{ $faq->pertanyaan }} 
                <span class="badge ms-2" style="border-radius: 15px; border: 1px solid;">
                  {{ $faq->kategori }}
                </span>
              </button>
            </h2>
            <div id="collapse{{ $faq->id_faq }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id_faq }}" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                {{ $faq->jawaban }}
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>

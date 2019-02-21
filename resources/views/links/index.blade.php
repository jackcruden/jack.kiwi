@extends('layouts.app')

@section('title', 'Links')

@section('content')
    <h1>
        Links
    </h1>

    <form method="post" action="/links" class="w-full flex">
        @csrf
        <div class="flex-1 mr-3">
            <input type="text" name="url" placeholder="https://..." class="x-input w-full">
        </div>
        <div class="flex-1 flex">
            <div class="flex-1 mr-3">
                <input type="text" name="name" placeholder="name (optional)" class="x-input w-full">
            </div>
            <button type="submit" class="x-button">Create</button>
        </div>
    </form>

    <div class="mt-4">
        @if(!count($links))
            No links.
        @else
            @foreach($links as $link)
                <div class="flex py-4 border-b">
                    <div class="flex-1 mr-3">
                        {{ $link->url }}
                    </div>
                    <div class="flex-1">
                        <a href="{{ config('app.url').'/'.$link->name }}">
                            {{ $link->name }}
                        </a>
                    </div>
                    <div onclick="copyToClipboard('{{ config('app.url').'/'.$link->name }}')">
                        <button>
                            Copy
                        </button>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection

@section('footer')
    <script>
        function copyToClipboard(text) {
            const el = document.createElement('textarea');  // Create a <textarea> element
            el.value = text;                                 // Set its value to the string that you want copied
            el.setAttribute('readonly', '');                // Make it readonly to be tamper-proof
            el.style.position = 'absolute';
            el.style.left = '-9999px';                      // Move outside the screen to make it invisible
            document.body.appendChild(el);                  // Append the <textarea> element to the HTML document
            const selected =
                document.getSelection().rangeCount > 0        // Check if there is any content selected previously
                ? document.getSelection().getRangeAt(0)     // Store selection if found
                : false;                                    // Mark as false to know no selection existed before
            el.select();                                    // Select the <textarea> content
            document.execCommand('copy');                   // Copy - only works as a result of a user action (e.g. click events)
            document.body.removeChild(el);                  // Remove the <textarea> element
            if (selected) {                                 // If a selection existed before copying
                document.getSelection().removeAllRanges();    // Unselect everything on the HTML document
                document.getSelection().addRange(selected);   // Restore the original selection
            }
        }
    </script>
@endsection

<div class="container">
    <div id="main-header">
        <p>
            <a id="main-header-logo" href="/">#FloppyDev</a>
        </p>

        <div id="main-header-contact-details">
            @if (!empty(config('contact.email')))
                <p><a href="mailto:{{ config('contact.email') }}">Contact me</a></p>
            @endif
        </div>
    </div>
</div>
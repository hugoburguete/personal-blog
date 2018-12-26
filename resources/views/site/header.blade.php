<div class="container">
    <div id="main-header">
        <p>
            <a id="main-header-logo" href="/">#FloppyDev</a>
        </p>

        <div id="main-header-contact-details">
            
            @if (!empty(config('contact.email')))
                <a href="mailto:{{ config('contact.email') }}">
                    <i class="demo-icon icon-mail"></i>
                </a>
            @endif
        </div>
    </div>
</div>
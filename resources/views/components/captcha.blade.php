
{{-- <div class="captcha-container">
    <div id="turnstile-container"></div>
</div> --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {

        turnstile.render('#turnstile-container', {
            sitekey: '{{ config('services.turnstile.site_key') }}',

            callback: function(token) {
                console.log('CAPTCHA verified');
            },

            'expired-callback': function() {
                console.log('CAPTCHA expired');
            },

            'error-callback': function() {
                console.log('CAPTCHA error');
            }
        });

    });
</script>

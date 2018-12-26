(function($) {
    $(document).ready(function($) {
        // Sticky header
        let scroll = $(window).scrollTop();
        doHeaderAnimation(scroll);

        // Logo animation
        initTypeWritter({
            elementId: 'main-header-logo',
            delay: 100,
        });
    });
    $(window).on('scroll', function(event) {
        let scroll = $(this).scrollTop();
        doHeaderAnimation(scroll);
    });
    
    function doHeaderAnimation(scroll) {
        const scrollOffset = 63;
        if (scroll > scrollOffset && $('body').hasClass('is-scrolled')) { return; }
    
        if (scroll <= scrollOffset) {
            $('body').removeClass('is-scrolled');
        } else {
            $('body').addClass('is-scrolled');
        }
    }

    // Typewritter logo
    function initTypeWritter(config) {
        setupTypewritter(config);

        let element = document.getElementById(config.elementId);
        let spanList = element.getElementsByTagName('span');

        let queue  = new Promise(function(resolve) {
            setTimeout(() => {
                makeElementVisible(spanList[0]);
                resolve();
            }, config.delay);
        });

        for (let i = 1; i < spanList.length; i++) {
            queue = queue.then(function() {
                return new Promise(function(resolve) {
                    setTimeout(() => {
                        makeElementVisible(spanList[i]);
                        resolve();
                    }, config.delay);
                });
            });
        };
    }

    function setupTypewritter(config) {
        // Grab the text
        let element = document.getElementById(config.elementId);
        let text = element.innerHTML;
        let newText = '';

        // Let's divide the text into spans
        for (let i = 0; i < text.length; i++) {
            newText += '<span>' + text.charAt(i) + '</span>';
        }

        // Reassign the text with spans
        element.innerHTML = newText;
    }

    function makeElementVisible(element) {
        element.className += 'visible';
    }
})(jQuery);



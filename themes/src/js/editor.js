function multiBlockStyles(stylename, label, blocks) {
    blocks.forEach((block) => {

        wp.blocks.registerBlockStyle(block, {
            name: stylename,
            label: label,
        });

    });
}


wp.domReady(() => {


    /** **************************
     * C U S T O M   S T Y L E S
     *************************** */


    /*** Layouts ***/
    multiBlockStyles('display-none', 'Ausblenden',
        [
            'core/group',
            'core/columns',
            'core/column',
            'core/paragraph',
            'core/heading',
            'core/list',
            'core/buttons',
            'core/button',
            'core/image',
            'core/gallery',
            'core/spacer',
        ]);

    multiBlockStyles('mobile-only', 'Mobile Only',
        [
            'core/group',
            'core/columns',
            'core/column',
            'core/paragraph',
            'core/heading',
            'core/list',
            'core/buttons',
            'core/button',
            'core/image',
            'core/gallery',
            'core/spacer',
        ]);

    multiBlockStyles('rounded', 'Rounded',
        [
            'core/group',
            'core/columns',
            'core/column',
            'core/paragraph',
            'core/heading',
            'core/image',
            'core/video',
            'core/cover'
        ]);

    multiBlockStyles('mobile-only', 'Mobile Only',
        [
            'core/group',
            'core/columns',
            'core/column',
            'core/paragraph',
            'core/heading',
            'core/image',
            'core/video',
            'core/cover',
            'core/buttons',
            "core/spacer"

        ]
    )
    multiBlockStyles('mobile-off', 'Mobile Off',
        [
            'core/group',
            'core/columns',
            'core/column',
            'core/paragraph',
            'core/heading',
            'core/image',
            'core/video',
            'core/cover',
            'core/buttons',
            "core/spacer"

        ]
    )
    multiBlockStyles('tablet-only', 'Tablet Only',
        [
            'core/group',
            'core/columns',
            'core/column',
            'core/paragraph',
            'core/heading',
            'core/image',
            'core/video',
            'core/cover',
            'core/buttons',
            "core/spacer"

        ]
    )
    multiBlockStyles('tablet-off', 'Tablet Off',
        [
            'core/group',
            'core/columns',
            'core/column',
            'core/paragraph',
            'core/heading',
            'core/image',
            'core/video',
            'core/cover',
            'core/buttons',
            "core/spacer"

        ]
    )

    wp.blocks.registerBlockStyle('core/group', {
        name: 'section-half-lighted-horizontal',
        label: 'Section Half Horizontal Lighted',
    });

    wp.blocks.registerBlockStyle('core/group', {
        name: 'section-half-lighted-horizontal-top',
        label: 'Section Half Horizontal Lighted Top',
    });

    wp.blocks.registerBlockStyle('core/group', {
        name: 'section-half-lighted-right',
        label: 'Section Half Right',
    });

    wp.blocks.registerBlockStyle('core/group', {
        name: 'section-half-lighted-left',
        label: 'Section Half Left',
    });







    /* I M A G E S */

    wp.blocks.registerBlockStyle('core/image', {
        name: 'fancy-img-rounded',
        label: 'Fancy Rounded',
    });
    wp.blocks.registerBlockStyle('core/image', {
        name: 'fancy-img-rounded-2',
        label: 'Fancy Rounded-2',
    });
    wp.blocks.registerBlockStyle('core/image', {
        name: 'img-top-rounded',
        label: 'Top Rounded',
    });




    wp.blocks.registerBlockStyle('core/cover', {
        name: 'no-section-padding',
        label: 'No Section Padding',
    });

    /*** Lists **/
    wp.blocks.registerBlockStyle('core/list', {
        name: 'highlights',
        label: 'Highlights',
    });
    wp.blocks.registerBlockStyle('core/list', {
        name: 'check',
        label: 'Check',
    });

    wp.blocks.registerBlockStyle('core/columns', {
        name: 'reverse',
        label: 'Reverse Columns on Mobile',
    });

    /*** Buttons ***/
    wp.blocks.registerBlockStyle('core/button', {
        name: 'btn-primary',
        label: 'Primary',
    });

    wp.blocks.registerBlockStyle('core/button', {
        name: 'btn-secondary',
        label: 'Secondary',
    });


    /*** headings ***/

    wp.blocks.registerBlockStyle('core/paragraph', {
        name: 'h1',
        label: 'H1-Style',
    });
    wp.blocks.registerBlockStyle('core/paragraph', {
        name: 'h2',
        label: 'H2-Style',
    });
    wp.blocks.registerBlockStyle('core/paragraph', {
        name: 'h3',
        label: 'H3-Style',
    });
    wp.blocks.registerBlockStyle('core/heading', {
        name: 'h1',
        label: 'H1-Style',
    });
    wp.blocks.registerBlockStyle('core/heading', {
        name: 'h2',
        label: 'H2-Style',
    });
    wp.blocks.registerBlockStyle('core/heading', {
        name: 'h3',
        label: 'H3-Style',
    });


    /*** animates ***/

    multiBlockStyles('scroll-in-right not-animated', 'Scroll In Right', [
        'core/image',
        'core/heading',
        'core/paragraph',
        'core/column',
        'core/group'
    ]);
    multiBlockStyles('scroll-in-left not-animated', 'Scroll In left', [
        'core/image',
        'core/heading',
        'core/paragraph',
        'core/column',
        'core/group'
    ]);
    multiBlockStyles('stagger-up not-animated', 'Stagger Up', [
        'core/heading',
        'core/paragraph'
    ]);
    multiBlockStyles('delayed-fade-in', 'Delayed Fade In', [
        'core/group',
        'core/columns']);
    multiBlockStyles('typewriting', 'Typewriting', [
        'core/heading',
        'core/paragraph']);
    multiBlockStyles('wave-chars', 'Wave Chars', [
        'core/heading',
        'core/paragraph']);




    wp.blocks.unregisterBlockStyle('core/image', 'default');
    wp.blocks.unregisterBlockStyle('core/image', 'rounded');
    // wp.blocks.unregisterBlockStyle('core/button', 'outline');
    wp.blocks.unregisterBlockStyle('core/button', 'squared');
    wp.blocks.unregisterBlockStyle('core/button', 'fill');


    /*** Common Blocks ***/
    //wp.blocks.unregisterBlockType('core/media-text');
    //wp.blocks.unregisterBlockType('core/paragraph');
    //wp.blocks.unregisterBlockType('core/image');
    //wp.blocks.unregisterBlockType('core/heading');
    //wp.blocks.unregisterBlockType('core/gallery');
    //wp.blocks.unregisterBlockType('core/list');
    //wp.blocks.unregisterBlockType('core/quote');
    wp.blocks.unregisterBlockType('core/audio');
    //wp.blocks.unregisterBlockType('core/cover');
    //wp.blocks.unregisterBlockType('core/file');
    //wp.blocks.unregisterBlockType('core/video');

    /*** Formatting ***/
    wp.blocks.unregisterBlockType('core/code');
    //wp.blocks.unregisterBlockType('core/classic');
    //wp.blocks.unregisterBlockType('core/html');
    wp.blocks.unregisterBlockType('core/preformatted');
    wp.blocks.unregisterBlockType('core/pullquote');
    wp.blocks.unregisterBlockType('core/table');
    wp.blocks.unregisterBlockType('core/verse');

    /*** Layout Elements ***/
    wp.blocks.unregisterBlockType('core/nextpage');
    //wp.blocks.unregisterBlockType('core/spacer');
    //wp.blocks.unregisterBlockType('core/buttons');
    //wp.blocks.unregisterBlockType('core/columns');
    //wp.blocks.unregisterBlockType('core/group');
    //wp.blocks.unregisterBlockType('core/media-text');
    wp.blocks.unregisterBlockType('core/more');
    //wp.blocks.unregisterBlockType('core/reusable');
    //wp.blocks.unregisterBlockType('core/separator');

    /*** Theme Blocks ***/
    //wp.blocks.unregisterBlockType('core/site-logo');
    wp.blocks.unregisterBlockType('core/site-tagline');
    wp.blocks.unregisterBlockType('core/site-title');
    wp.blocks.unregisterBlockType('core/query');
    // wp.blocks.unregisterBlockType('core/post-title');
    wp.blocks.unregisterBlockType('core/post-content');
    wp.blocks.unregisterBlockType('core/post-date');
    wp.blocks.unregisterBlockType('core/post-excerpt');
    wp.blocks.unregisterBlockType('core/post-featured-image');
    //wp.blocks.unregisterBlockType('core/post-terms');
    //wp.blocks.unregisterBlockType('core/post-archivetitle');
    wp.blocks.unregisterBlockType('core/loginout');
    //wp.blocks.unregisterBlockType('core/page-list');

    /*** Widgets ***/
    //wp.blocks.unregisterBlockType('core/shortcode');
    //wp.blocks.unregisterBlockType('core/archives');
    wp.blocks.unregisterBlockType('core/calendar');
    //wp.blocks.unregisterBlockType('core/categories');
    wp.blocks.unregisterBlockType('core/latest-comments');
    wp.blocks.unregisterBlockType('core/latest-posts');
    wp.blocks.unregisterBlockType('core/rss');
    wp.blocks.unregisterBlockType('core/search');
    wp.blocks.unregisterBlockType('core/social-links');
    //wp.blocks.unregisterBlockType('core/tag-cloud');

    /*** Embeds ***/
    //wp.blocks.unregisterBlockVariation('core/embed', 'youtube');
    wp.blocks.unregisterBlockVariation('core/embed', 'amazon-kindle');
    wp.blocks.unregisterBlockVariation('core/embed', 'animoto');
    wp.blocks.unregisterBlockVariation('core/embed', 'cloudup');
    wp.blocks.unregisterBlockVariation('core/embed', 'crowdsignal');
    wp.blocks.unregisterBlockVariation('core/embed', 'dailymotion');
    wp.blocks.unregisterBlockVariation('core/embed', 'flickr');
    wp.blocks.unregisterBlockVariation('core/embed', 'imgur');
    wp.blocks.unregisterBlockVariation('core/embed', 'issuu');
    wp.blocks.unregisterBlockVariation('core/embed', 'kickstarter');
    wp.blocks.unregisterBlockVariation('core/embed', 'meetup-com');
    wp.blocks.unregisterBlockVariation('core/embed', 'mixcloud');
    wp.blocks.unregisterBlockVariation('core/embed', 'reddit');
    wp.blocks.unregisterBlockVariation('core/embed', 'reverbnation');
    wp.blocks.unregisterBlockVariation('core/embed', 'screencast');
    wp.blocks.unregisterBlockVariation('core/embed', 'scribd');
    wp.blocks.unregisterBlockVariation('core/embed', 'slideshare');
    wp.blocks.unregisterBlockVariation('core/embed', 'smugmug');
    wp.blocks.unregisterBlockVariation('core/embed', 'soundcloud');
    wp.blocks.unregisterBlockVariation('core/embed', 'speaker-deck');
    wp.blocks.unregisterBlockVariation('core/embed', 'spotify');
    wp.blocks.unregisterBlockVariation('core/embed', 'tiktok');
    wp.blocks.unregisterBlockVariation('core/embed', 'ted');
    wp.blocks.unregisterBlockVariation('core/embed', 'twitter');
    wp.blocks.unregisterBlockVariation('core/embed', 'tumblr');
    wp.blocks.unregisterBlockVariation('core/embed', 'videopress');
    wp.blocks.unregisterBlockVariation('core/embed', 'vimeo');
    wp.blocks.unregisterBlockVariation('core/embed', 'wordpress');
    wp.blocks.unregisterBlockVariation('core/embed', 'wordpress-tv');
});
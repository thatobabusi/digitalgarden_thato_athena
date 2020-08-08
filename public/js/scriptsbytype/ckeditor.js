CKEDITOR.editorConfig = function( config ) {
    config.toolbarGroups = [
        { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
        { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
        { name: 'forms', groups: [ 'forms' ] },
        '/',
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
        { name: 'links', groups: [ 'links' ] },
        { name: 'insert', groups: [ 'insert' ] },
        '/',
        { name: 'styles', groups: [ 'styles' ] },
        { name: 'colors', groups: [ 'colors' ] },
        { name: 'tools', groups: [ 'tools' ] },
        { name: 'others', groups: [ 'others' ] },
        { name: 'about', groups: [ 'about' ] }
    ];
};

CKEDITOR.addCss(
    'figure[class*=easyimage-gradient]::before { content: ""; position: absolute; top: 0; bottom: 0; left: 0; right: 0; }' +
    'figure[class*=easyimage-gradient] figcaption { position: relative; z-index: 2; }' +
    '.easyimage-gradient-1::before { background-image: linear-gradient( 135deg, rgba( 115, 110, 254, 0 ) 0%, rgba( 66, 174, 234, .72 ) 100% ); }' +
    '.easyimage-gradient-2::before { background-image: linear-gradient( 135deg, rgba( 115, 110, 254, 0 ) 0%, rgba( 228, 66, 234, .72 ) 100% ); }'
);

/*CKEDITOR.replace('summary', {
    extraPlugins: 'easyimage',
    removePlugins: 'image',
    removeDialogTabs: 'link:advanced',
    height: 150,
    //cloudServices_uploadUrl: 'https://33333.cke-cs.com/easyimage/upload/',
    // Note: this is a token endpoint to be used for CKEditor 4 samples only.
    // Images uploaded using this token may be deleted automatically at any moment.
    // To create your own token URL please visit https://ckeditor.com/ckeditor-cloud-services/.
    //cloudServices_tokenUrl: 'https://33333.cke-cs.com/token/dev/ijrDsqFix838Gh3wGO3F77FSW94BwcLXprJ4APSp3XQ26xsUHTi0jcb1hoBt',
    easyimage_styles: {
        gradient1: {
            group: 'easyimage-gradients',
            attributes: {
                'class': 'easyimage-gradient-1'
            },
            label: 'Blue Gradient',
            icon: 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/easyimage/icons/gradient1.png',
            iconHiDpi: 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/easyimage/icons/hidpi/gradient1.png'
        },
        gradient2: {
            group: 'easyimage-gradients',
            attributes: {
                'class': 'easyimage-gradient-2'
            },
            label: 'Pink Gradient',
            icon: 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/easyimage/icons/gradient2.png',
            iconHiDpi: 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/easyimage/icons/hidpi/gradient2.png'
        },
        noGradient: {
            group: 'easyimage-gradients',
            attributes: {
                'class': 'easyimage-no-gradient'
            },
            label: 'No Gradient',
            icon: 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/easyimage/icons/nogradient.png',
            iconHiDpi: 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/easyimage/icons/hidpi/nogradient.png'
        }
    },
    easyimage_toolbar: [
        'EasyImageFull',
        'EasyImageSide',
        'EasyImageGradient1',
        'EasyImageGradient2',
        'EasyImageNoGradient',
        'EasyImageAlt'
    ]
});*/

/*CKEDITOR.replace('body', {
    extraPlugins: 'easyimage',
    removePlugins: 'image',
    removeDialogTabs: 'link:advanced',
    height: 630,
    //cloudServices_uploadUrl: 'https://33333.cke-cs.com/easyimage/upload/',
    // Note: this is a token endpoint to be used for CKEditor 4 samples only.
    // Images uploaded using this token may be deleted automatically at any moment.
    // To create your own token URL please visit https://ckeditor.com/ckeditor-cloud-services/.
    //cloudServices_tokenUrl: 'https://33333.cke-cs.com/token/dev/ijrDsqFix838Gh3wGO3F77FSW94BwcLXprJ4APSp3XQ26xsUHTi0jcb1hoBt',
    easyimage_styles: {
        gradient1: {
            group: 'easyimage-gradients',
            attributes: {
                'class': 'easyimage-gradient-1'
            },
            label: 'Blue Gradient',
            icon: 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/easyimage/icons/gradient1.png',
            iconHiDpi: 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/easyimage/icons/hidpi/gradient1.png'
        },
        gradient2: {
            group: 'easyimage-gradients',
            attributes: {
                'class': 'easyimage-gradient-2'
            },
            label: 'Pink Gradient',
            icon: 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/easyimage/icons/gradient2.png',
            iconHiDpi: 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/easyimage/icons/hidpi/gradient2.png'
        },
        noGradient: {
            group: 'easyimage-gradients',
            attributes: {
                'class': 'easyimage-no-gradient'
            },
            label: 'No Gradient',
            icon: 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/easyimage/icons/nogradient.png',
            iconHiDpi: 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/easyimage/icons/hidpi/nogradient.png'
        }
    },
    easyimage_toolbar: [
        'EasyImageFull',
        'EasyImageSide',
        'EasyImageGradient1',
        'EasyImageGradient2',
        'EasyImageNoGradient',
        'EasyImageAlt'
    ]
});*/

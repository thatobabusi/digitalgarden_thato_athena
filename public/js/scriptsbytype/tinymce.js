tinymce.init({
    selector: "textarea",
    plugins: [
        "autoresize", "advlist autolink lists charmap print preview", "searchreplace visualblocks code",
        "table contextmenu paste searchreplace preview", "image imagetools", "anchor", "link", "media",
        "visualblocks", "fullpage", "fullscreen",  "hr", "code", "emoticons", "insertdatetime", "wordcount", "imagetools"
    ],

    //external_plugins: {"nanospell": "{{ URL::asset('vendor/nanospell/plugin.js') }}"},

    toolbar: "nanospell | searchreplace | preview | undo redo | styleselect | formatselect | " +
        "bold italic strikethrough forecolor backcolor| " +
        "alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | " +
        "anchor | link | image | media | visualblocks | wordcount | fullpage | fullscreen | hr | code | " +
        "emoticons | contextmenu | insertdatetime | layer | removeformat",

    height: 400,
    autoresize_min_height: 500,
    paste_data_images: true,

    statusbar:  true,

    nanospell_server: "php",
    nanospell_dictionary: "af, en, en_uk, en_us, fr, pt, pt_br, se",
    nanospell_compact_menu: false,
});

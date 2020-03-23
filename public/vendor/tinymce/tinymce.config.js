tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists charmap print preview",
        "searchreplace visualblocks code",
        "table contextmenu paste searchreplace preview",
        "autoresize", "image"
    ],
    toolbar: "image | nanospell | searchreplace | preview | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
    height: 350,
    paste_data_images: true,
    autoresize_min_height: 350,
    statusbar: false,
    /*menubar: "edit, view",*/
    external_plugins: { "nanospell": "../nanospell/plugin.js" },
    nanospell_server: "php",
    nanospell_compact_menu: false,
    nanospell_dictionary: "en, af, en_us, en_uk" //"af, en, en_uk, en_us, fr, pt, pt_br, se",
});

<!doctype html>
<html lang="en">
<head>
    <title>Thato VueJS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://unpkg.com/vue-router"></script>

    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</head>
<body>

    <div id='vue-app'></div>
    <script type='text/javascript'>
    const titleComponent = '<h1>@{{ title }}</h1>';
    var app = new Vue(
    {
      el: '#vue-app',
      template: titleComponent,
      data: function () { return { title: 'Stranger Vue things' }; }
    });
    </script>


{{--<script type="text/javascript" src="{{ asset('app-vuejs/vue_component.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('app-vuejs/vue_template.js') }}"></script>--}}


</body>
</html>

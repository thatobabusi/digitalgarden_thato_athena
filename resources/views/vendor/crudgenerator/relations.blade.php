<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud Generator</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form action="#" method="post">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Create Relation</h4>
            </div>
            <div class="card-body container">
                @include('crudgenerator::errors')
                <div class="mt-4">
                    <div class="form-group">
                        <div class="input-group">
                            <select name="model1" class="form-control" required>
                                @foreach ($models as $model)
                                    <option value="{{ $model }}" {{ (old("model1") == $model ? "selected":"")}}>{{ $model }}</option>
                                @endforeach
                            </select>
                            <select name="relation" class="form-control" required>
                                <option value="1-1" {{ (old("relation") == "1-1" ? "selected":"")}}>has one</option>
                                <option value="1-*" {{ (old("relation") == "1-+" ? "selected":"")}}>has many</option>
                                <option value="*-*" {{ (old("relation") == "+-+" ? "selected":"")}}>many to many
                                </option>
                            </select>
                            <select name="model2" id="" class="form-control" required>
                                @foreach ($models as $model)
                                    <option value="{{ $model }}" {{ (old("model2") == $model ? "selected":"")}}>{{ $model }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <input type="checkbox" name="create_field" id="1">
                        <label for="1">Create relation field (such as user_id in second model) - Only applicable for has
                            one & has many</label>
                    </div>
                    <div>
                        <input type="checkbox" name="create_table" id="2">
                        <label for="2">Create pivot table - Only applicable for many to many</label>
                    </div>
                    <div>
                        <input type="checkbox" name="migrate" id="3" checked>
                        <label for="3">Migrate after migration creation</label>
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add relation</button>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>

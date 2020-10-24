<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <div class="form-group">

            <div class="row col-md-12">

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.user.fields.name') }}</label>
                    <p class="text">{{$user->name}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.user.fields.email') }}</label>
                    <p class="text">{{$user->email}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.user.fields.email_verified_at') }}</label>
                    <p class="text">{{$user->email_verified_at}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.user.fields.password') }}</label>
                    <p class="text">***Just a placeholder, would never display this***</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.user.fields.created_at') }}</label>
                    <p class="text">{{$user->created_at}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.user.fields.updated_at') }}</label>
                    <p class="text">{{$user->updated_at}}</p>
                </div>
            </div>

        </div>
    </div>
</div>

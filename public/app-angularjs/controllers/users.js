app.controller('usersController', function ($scope, $http, API_URL) {

    //fetch users listing from

    $http({
        method: 'GET',
        url: API_URL + "users"
    }).then(function (response) {

        $scope.users = response.data.users;
        console.log(response);

    }, function (error) {

        console.log(error);

        alert('This is embarassing. An error has occurred. Please check the log for details');
    });

    //show modal form

    $scope.toggle = function (modalstate, id) {
        $scope.modalstate = modalstate;
        $scope.user = null;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New User";
                break;
            case 'edit':
                $scope.form_title = "User Detail";
                $scope.id = id;
                $http.get(API_URL + 'users/' + id)
                    .then(function (response) {
                        console.log(response);
                        $scope.user = response.data.user;
                    });
                break;
            default:
                break;
        }

        console.log(id);
        $('#myModal').modal('show');
    }

    //save new record and update existing record
    $scope.save = function (modalstate, id) {
        var url = API_URL + "users";
        var method = "POST";

        //append user id to the URL if the form is in edit mode
        if (modalstate === 'edit') {
            url += "/" + id;

            method = "PUT";
        }

        $http({
            method: method,
            url: url,
            data: $.param($scope.user),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).then(function (response) {

            console.log(response);
            location.reload();

        }), (function (error) {

            console.log(error);
            alert('This is embarassing. An error has occurred. Please check the log for details');
        });
    }

    //delete record
    $scope.confirmDelete = function (id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {

            $http({
                method: 'DELETE',
                url: API_URL + 'users/' + id
            }).then(function (response) {
                console.log(response);
                location.reload();
            }, function (error) {
                console.log(error);
                alert('Unable to delete');
            });
        } else {
            return false;
        }
    }
});

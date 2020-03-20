app.controller('blogPostsController', function ($scope, $http, API_URL) {

    //fetch users listing from
    $http({
        method: 'GET',
        url: API_URL + "blogPosts"
    }).then(function (response) {

        //$scope.images = response.data.images;
        //$scope.images = response.data.images[Math.floor(Math.random() * $scope.quotes.length)];
        $scope.posts = response.data.posts;
        $scope.featured_post = response.data.featured;
        console.log(response);

    }, function (error) {

        console.log(error);

        alert('This is embarassing. An error has occurred. Please check the log for details');
    });

    //show modal form

    $scope.toggle = function (modalstate, id) {
        $scope.modalstate = modalstate;
        $scope.posts = null;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New posts";
                break;
            case 'edit':
                $scope.form_title = "posts Detail";
                $scope.id = id;
                $http.get(API_URL + 'blogPosts/' + id)
                    .then(function (response) {
                        console.log(response);
                        $scope.post = response.data.post;
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
        var url = API_URL + "blogPosts";
        var method = "POST";

        //append user id to the URL if the form is in edit mode
        if (modalstate === 'edit') {
            url += "/" + id;

            method = "PUT";
        }

        $http({
            method: method,
            url: url,
            data: $.param($scope.post),
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
                url: API_URL + 'blogPosts/' + id
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

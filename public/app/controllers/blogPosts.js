app.controller('blogPostsController', function ($scope, $http, API_URL) {
    //fetch blogPosts listing from
    $http({
        method: 'GET',
        url: API_URL + "blogPosts"
    }).then(function (response) {
        $scope.page_header = response.data.page_header;
        $scope.page_title = response.data.page_title;
        $scope.featuredBlogPost = response.data.featuredBlogPost;
        $scope.blogPosts = response.data.blogPosts;
        $scope.blogPostCategories = response.data.blogPostCategories;
        $scope.blogPostTags = response.data.blogPostTags;
        $scope.blogPostDistinctArchiveYearAndMonthsArray = response.data.blogPostDistinctArchiveYearAndMonthsArray;
        console.log(response);
    }, function (error) {
        console.log(error);
        alert('An error has occurred. Please check the log for details 1');
    });

    /*$http({
        method: 'GET',
        url: API_URL + "blogPostCategories/category"
    }).then(function (response) {
        $scope.page_header = response.data.page_header;
        $scope.page_title = response.data.page_title;
        $scope.featuredBlogPost = response.data.featuredBlogPost;
        $scope.blogPosts = response.data.blogPosts;
        $scope.blogPostCategories = response.data.blogPostCategories;
        $scope.blogPostTags = response.data.blogPostTags;
        $scope.blogPostDistinctArchiveYearAndMonthsArray = response.data.blogPostDistinctArchiveYearAndMonthsArray;
        console.log(response);
    }, function (error) {
        console.log(error);
        alert('An error has occurred. Please check the log for details 2');
    });

    $http({
        method: 'GET',
        url: API_URL + "blogPostTags/tag"
    }).then(function (response) {
        $scope.page_header = response.data.page_header;
        $scope.page_title = response.data.page_title;
        $scope.featuredBlogPost = response.data.featuredBlogPost;
        $scope.blogPosts = response.data.blogPosts;
        $scope.blogPostCategories = response.data.blogPostCategories;
        $scope.blogPostTags = response.data.blogPostTags;
        $scope.blogPostDistinctArchiveYearAndMonthsArray = response.data.blogPostDistinctArchiveYearAndMonthsArray;
        console.log(response);
    }, function (error) {
        console.log(error);
        alert('An error has occurred. Please check the log for details 3');
    });*/

    //show modal form
    $scope.toggle = function (modalstate, id) {
        $scope.modalstate = modalstate;
        $scope.blogPost = null;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Blog Post";
                break;
            case 'edit':
                $scope.form_title = "Blog Post Detail";
                $scope.id = id;
                $http.get(API_URL + 'blogPosts/' + id)
                    .then(function (response) {
                        console.log(response);
                        $scope.blogPost = response.data.blogPost;
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
            data: $.param($scope.blogPost),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).then(function (response) {
            console.log(response);
            location.reload();
        }), (function (error) {
            console.log(error);
            alert('An error has occurred. Please check the log for details');
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

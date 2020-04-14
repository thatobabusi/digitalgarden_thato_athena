app.controller('blogPostsController', function ($scope, $http, API_URL) {
    //fetch blogPosts listing from

    let slug = $('#hidden_slug').val();
    console.log('blogPosts by tag ' + slug);

    $http({
        method: 'GET',
        url: API_URL + "blogPostTags/tag/"+slug,
    }).then(function (response) {
        $scope.testdata = response.data.testdata;
        $scope.page_header = response.data.page_header;
        $scope.page_title = response.data.page_title;
        $scope.featuredBlogPost = response.data.featuredBlogPost;
        $scope.blogPosts = response.data.blogPosts;
        $scope.blogPostCategories = response.data.blogPostCategories;
        $scope.blogPostTags = response.data.blogPostTags;
        $scope.blogPostDistinctArchiveYearAndMonthsArray = response.data.blogPostDistinctArchiveYearAndMonthsArray;
        //console.log(response);
    }, function (error) {
        //console.log(error);
        alert('An error has occurred. Please check the log for details 2');
    });

});

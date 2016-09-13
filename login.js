app.provider('loginData', function () {
    console.log("provider");
    this.self = this;
    var api_url = "login_handler.php";
    this.$get = function ($http, $q, $log) {
        console.log("$get");
        return {
            callApi: function ($scope, user) {
                var data = $.param({username: user.username, password: user.password});
                var user_info = user;
                console.log("user: ", user.username, 'password: ', user.password);
                var defer = $q.defer();
                $http({
                    url: api_url,
                    method: "POST",
                    dataType: 'json',
                    // headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data: data
                }).then(function success(response) {
                    console.log("success: ", response.data.success);
                    console.log("response: " , response);
                    if (response.data.success == true) {
                        populate_user_profile_info(username);
                        // window.location.replace("index.php");
                    }
                    defer.resolve(response);

                }), function error(response) {
                    $log.error("$http fail: ", response);
                    defer.reject("Error msg here");
                };
                return defer.promise;
            }
        }
    };
});

function populate_user_profile_info(username) {
    var data = $.param({username: username});
    $http({
        url: 'user_session.php',
        method: 'POST',
        data: data,
        dataType: 'json'
    }).then(function success(response) {
        console.log("get user info is success: ", response);

    }), function error(repsonse) {
        $log.error("$http fail: ", response);
        defer.reject("Error msg here");
    }
}


//Include your service in the function parameter list along with any other services you may want to use
app.controller('loginController', function (loginData, $scope) {
    //Create a variable to hold this, DO NOT use the same name you used in your provider
    var new_self = this;
    //Add an empty data object to your controller, make sure to call it 'data'
    $scope.data = {};
    //Add a function called getData to your controller to call the SGT API
    this.getData = function (user) {
        console.log("get data fn, this is user: ", user);
        loginData.callApi($scope, user)
            .then(function success(response) {
                new_self.data = response.data;
            })
    };
});
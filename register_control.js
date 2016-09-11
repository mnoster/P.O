app.provider('registerData', function () {
    console.log(" register provider");
    this.self = this;
    var api_url = "register_handler.php";
    this.$get = function ($http, $q, $log) {
        console.log("$get");
        return {
            callApi: function ($scope,signup) {
                var data = $.param({username: signup.username, email:signup.email, password: signup.password, password2: signup.password2});
                var user_info = signup;
                console.log("user: " , signup.username, 'password: ', signup.password);
                var defer = $q.defer();
                $http({
                    url: api_url,
                    method: "POST",
                    dataType: 'json',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data: data
                }).then(function success(response) {
                    console.log("success: " , response.data.success);
                    if(response.data.success == true){
                        window.location.replace("index.php");
                    }
                    defer.resolve(response)
                }), function error(response) {
                    $log.error("$http fail: ", response);
                    defer.reject("Error msg here");
                };
                return defer.promise;
            }
        }
    };
});

//Config your provider here to set the api_key and the api_url
// app.config(function ($httpProvider){
//    $httpProvider.defaults.headers.post =  {'Content-Type': 'application/x-www-form-urlencoded'};
//     // $httpProvider.defaults.
// });
//Include your service in the function parameter list along with any other services you may want to use
app.controller('registerController', function (registerData, $scope) {
    //Create a variable to hold this, DO NOT use the same name you used in your provider
    var new_self = this;
    //Add an empty data object to your controller, make sure to call it 'data'
    $scope.data = {};
    //Add a function called getData to your controller to call the SGT API
    this.sendData = function (signup){
        console.log("get data fn, this is user: " , signup);
        registerData.callApi($scope,signup)
            .then(function success(response){
                new_self.data = response.data;
            })
    };
});

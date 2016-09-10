var app = angular.module("psychoApp", ["ngRoute"]);

app.config(function($routeProvider){
    $routeProvider
        .when('/',{
            templateUrl: '/Psychorigins Alpha/home.php'
            // controller: 'mainController'
        })
        .when('/about',{
            templateUrl: '/Psychorigins Alpha/About.php'
            // controller:'secondController'
        })
        .when('/form',{
            templateUrl: '/Psychorigins Alpha/Form.php'
            // controller: 'thirdController'
        })
        .when('/login',{
            templateUrl: '/Psychorigins Alpha/login.php'
            // controller: 'thirdController'
        })
        .when('/register',{
            templateUrl: '/Psychorigins Alpha/register.php'
            // controller: 'thirdController'
        })
        .when('/contact',{
            templateUrl: '/Psychorigins Alpha/contact.php'
            // controller: 'thirdController'
        })
        .when('/FAQ',{
            templateUrl: '/Psychorigins Alpha/FAQ.php'
            // controller: 'thirdController'
        })
        .when('/dashboard',{
            templateUrl: '/Psychorigins Alpha/dashboard.php'
            // controller: 'thirdController'
        })
        .when('/create_client',{
            templateUrl: '/Psychorigins Alpha/create_client.php'
        })
        .when('/login',{
            templateUrl: '/Psychorigins Alpha/login.php'
        })
        .otherwise({
            redirectTo: '/'
        });
});
app.provider('loginData', function () {
    console.log("provider");
    this.self = this;
    var api_url = "login_handler.php";
    this.$get = function ($http, $q, $log) {
        console.log("$get");
        return {
            callApi: function ($scope,user) {
                var data = $.param({username: user.username,password: user.password});
                var user_info = user;
                console.log("user: " , user.username, 'password: ', user.password);
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
//
// });
//Include your service in the function parameter list along with any other services you may want to use
app.controller('loginController', function (loginData, $scope) {
    //Create a variable to hold this, DO NOT use the same name you used in your provider
    var new_self = this;
    //Add an empty data object to your controller, make sure to call it 'data'
    $scope.data = {};
    //Add a function called getData to your controller to call the SGT API
    this.getData = function (user){
        console.log("get data fn, this is user: " , user);
        loginData.callApi($scope,user)
            .then(function success(response){
                new_self.data = response.data;
            })
    };

});
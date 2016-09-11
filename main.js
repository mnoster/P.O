var app = angular.module("psychoApp", ["ngRoute"]);
app.config(function ($httpProvider){
    $httpProvider.defaults.headers.post =  {'Content-Type': 'application/x-www-form-urlencoded'};
});

app.config(function($routeProvider){
    $routeProvider
        .when('/',{
            templateUrl: '/P.O/home.php'
            // controller: 'mainController'
        })
        .when('/about',{
            templateUrl: '/P.O/About.php'
            // controller:'secondController'
        })
        .when('/form',{
            templateUrl: '/P.O/Form.php'
            // controller: 'thirdController'
        })
        .when('/login',{
            templateUrl: '/P.O/login.php'
            // controller: 'thirdController'
        })
        .when('/register',{
            templateUrl: '/P.O/register.php'
            // controller: 'thirdController'
        })
        .when('/contact',{
            templateUrl: '/P.O/contact.php'
            // controller: 'thirdController'
        })
        .when('/FAQ',{
            templateUrl: '/P.O/FAQ.php'
            // controller: 'thirdController'
        })
        .when('/dashboard',{
            templateUrl: '/P.O/dashboard.php'
            // controller: 'thirdController'
        })
        .when('/my_forms',{
            templateUrl: '/P.O/my_forms.php'
            // controller: 'thirdController'
        })
        .when('/create_client',{
            templateUrl: '/P.O/create_client.php'
        })
        .when('/my_clients',{
            templateUrl: '/P.O/my_clients.php'
        })
        .when('/select_form',{
            templateUrl: '/P.O/select_form.php'
        })
        .when('/logout',{
            templateUrl: '/P.O/logout.php'
            // controller: 'logoutController'
        })
        .when('/login',{
            templateUrl: '/P.O/login.php'
        })
        .when('/form1',{
            templateUrl: '/P.O/form1.php'
        })
        .when('/edit_form1',{
            templateUrl: '/P.O/edit_form1.php'
        })
        .when('/form2',{
            templateUrl: '/P.O/form2.php'
        })
        .when('/edit_form2',{
            templateUrl: '/P.O/edit_form2.php'
        })
        .when('/form3',{
            templateUrl: '/P.O/form3.php'
        })
        .when('/edit_form3',{
            templateUrl: '/P.O/edit_form3.php'
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
                    // headers: {'Content-Type': 'application/x-www-form-urlencoded'},
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

app.provider('logoutData', function () {
    console.log("logout provider");
    var api_url = "logout_handler.php";
    this.$get = function ($http, $log) {
        $http.post(api_url)
            .then((function success(response){
                console.log("this is logout: ",response);
            }));
    }
});

app.controller('logoutController', function () {
    //Add a function called getData to your controller to call the SGT API
    this.logout_user = function (logoutData){
        logoutData.callApi();
    };
});

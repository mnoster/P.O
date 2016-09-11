
app.config(function ($httpProvider){
   $httpProvider.defaults.headers.post =  {'Content-Type': 'application/x-www-form-urlencoded'};
});
app.controller('logoutController', function () {
    $scope.data = {};
    //Add a function called getData to your controller to call the SGT API
    this.logout_user = function (){
        logoutData.callApi()
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
                console.log(response);
            }));
    }
});

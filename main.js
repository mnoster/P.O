var app = angular.module("psychoApp", ["ngRoute"]);
// document.getElementById('client-id').tablesorter();

app.config(function ($httpProvider) {
    $httpProvider.defaults.headers.post = {'Content-Type': 'application/x-www-form-urlencoded'};
    // $httpProvider.defaults.dataType.post = 'json';

});

app.config(function ($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: '/P.O/home.php'
            // controller: 'mainController'
        })
        .when('/about', {
            templateUrl: '/P.O/About.php'
            // controller:'secondController'
        })
        .when('/form', {
            templateUrl: '/P.O/Form.php'
            // controller: 'thirdController'
        })
        .when('/login', {
            templateUrl: '/P.O/login.php'
            // controller: 'thirdController'
        })
        .when('/register', {
            templateUrl: '/P.O/register.php'
            // controller: 'thirdController'
        })
        .when('/contact', {
            templateUrl: '/P.O/contact.php'
            // controller: 'thirdController'
        })
        .when('/FAQ', {
            templateUrl: '/P.O/FAQ.php'
            // controller: 'thirdController'
        })
        .when('/compliance', {
            templateUrl: '/P.O/Compliance.php'
        })
        .when('/dashboard', {
            templateUrl: '/P.O/dashboard.php'
            // controller: 'thirdController'
        })
        .when('/my_forms', {
            templateUrl: '/P.O/my_forms.php'
            // controller: 'thirdController'
        })
        .when('/create_client', {
            templateUrl: '/P.O/create_client.php'
        })
        .when('/my_clients', {
            templateUrl: '/P.O/my_clients.php'
        })
        .when('/select_form', {
            templateUrl: '/P.O/select_form.php'
        })
        .when('/logout', {
            templateUrl: '/P.O/logout.php'
            // controller: 'logoutController'
        })
        .when('/login', {
            templateUrl: '/P.O/login.php'
        })
        .when('/form1', {
            templateUrl: '/P.O/form1.php'
        })
        .when('/edit_form1', {
            templateUrl: '/P.O/edit_form1.php'
        })
        .when('/form2', {
            templateUrl: '/P.O/form2.php'
        })
        .when('/edit_form2', {
            templateUrl: '/P.O/edit_form2.php'
        })
        .when('/form3', {
            templateUrl: '/P.O/form3.php'
        })
        .when('/edit_form3', {
            templateUrl: '/P.O/edit_form3.php'
        })
        .otherwise({
            redirectTo: '/'
        });
});
//-------------login----------------------
app.provider('loginData', function () {
    console.log("provider");
    var self = this;
    var api_url = "login_handler.php";
    self.populate_user_profile_info = function (username, $http) {
        var data = $.param({username: username});
        console.log("username: ", username);
        $http({
            url: 'user_session.php',
            method: 'POST',
            data: data,
            dataType: 'json'
        }).then(function success(response) {
            console.log("get user info is success: ", response);

        }), function error(response) {
            $log.error("$http fail: ", response);
        }
    };
    this.$get = function ($http, $q, $log) {
        console.log("$get");
        return {
            callApi: function ($scope, user) {
                var data = $.param({username: user.username, password: user.password});
                var user_info = user;
                var defer = $q.defer();
                $http({
                    url: api_url,
                    method: "POST",
                    dataType: 'json',
                    // headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data: data
                }).then(function success(response) {
                    console.log("success: ", response.data.success);
                    console.log("response: ", response);
                    if (response.data.success == true) {
                        self.populate_user_profile_info(user.username, $http);
                        data = " ";
                        user_info = " ";
                        window.location.replace("index.php");
                    }
                    defer.resolve(response);

                }), function error(response) {
                    $log.error("$http fail: ", response);
                    defer.reject("Error msg here");
                };
                return defer.promise;
            }
        };
    };

});
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

//-------------------logout data-------------------------

app.controller('logoutController', function () {
    //Add a function called getData to your controller to call the SGT API
    this.logout_user = function () {
        logoutData.callApi()
            .then(function success(response) {
                new_self.data = response.data;
            })
    };
});

app.provider('logoutData', function () {
    console.log("logout provider");
    var api_url = "logout_handler.php";
    this.$get = function ($http, $log) {
        $http.post(api_url)
            .then((function success(response) {
                console.log(response);
            }));
    }
});

//------------form Controller------------
app.controller('formController', function ($scope) {
    var new_self = this;
    var country = [];
    $scope.states = ['Alabama', 'Alaska', 'American Samoa', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'District of Columbia', 'Federated States of Micronesia', 'Florida', 'Georgia', 'Guam', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Marshall Islands', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Northern Mariana Islands', 'Ohio', 'Oklahoma', 'Oregon', 'Palau', 'Pennsylvania', 'Puerto Rico', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virgin Island', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'];
    $scope.gender = ['male', 'female', 'transgender man', 'transgender woman', 'other'];
    $scope.relationship_status = ['single', 'married', 'divorced', 'widowed'];
    $scope.education = ['Less than high school', 'Some high school', 'High school graduate', 'Associates', 'Bachelors', 'Masters', 'Phd'];
    $scope.sexual_orientation = ['straight', 'lesbian', 'bisexual', 'gay', 'queer', 'asexual'];
    $scope.children = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
    $scope.therapy_years = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60];
    $scope.adopted = ['yes', 'no'];
    $scope.ethnicity = ['Chinese', 'Japanese', 'Acholi', 'Akan', 'Albanian', 'Amhara', 'Arab', 'Arminian', 'Assyrian', 'Azerbaijanis', 'Balochis', 'Bamars', 'Bambara', 'Bashkris', 'Basque', 'Bemba', 'Bengali', 'Berbers', 'Beti-Pahuin', 'Bihari', 'Bosniaks', 'Brahui', 'Bulgarian', 'Catalan', 'Chuvash', 'Circassian', 'Chewa', 'Croats', 'Czechs', 'Danes', 'Dinka', 'Dutch', 'English', 'Estonian', 'Faroese', 'Finn', 'French', 'Frisians', 'Fula', 'Ganada', 'German', 'Greek', 'Georgian', 'Gujarati', 'Igbo', 'Hindunstani', 'Hui', 'Hungarian', 'Icelander', 'Irish', 'Italian', 'Javanese', 'Jewish', 'Kazakh', 'Kongo', 'Korean', 'Kurd', 'Lebanese', 'Macedonian', 'Malays', 'Marathi', 'Nepali', 'Persian', 'Polish', 'Portugese', 'Punjab', 'Romanian', 'Russian', 'Scottish', 'Serbian', 'Sinhalese', 'Slovik', 'Spanish', 'Swedish', 'Tajik', 'Thai', 'Turkish', 'Ukrainian', 'Vietnamese', 'Welsh', 'French', 'Filipian', 'Brazilian', 'Peruvian', 'Canadian', 'Jamacian', 'Ecuadorian', 'Mexican', 'Iranian', 'Egyptian', 'Greek', 'Syrian', 'Bolivian'];
    //Add an empty data object to your controller, make sure to call it 'data'
    $scope.data = {};
    //Add a function called getData to your controller to call the SGT API
    this.getData = function (form) {
        console.log("get data fn, this is user: ", form);
        form.callApi($scope, form)
            .then(function success(response) {
                new_self.data = response.data;
            })
    };
});
//-----------client form controller------------
app.provider('clientData', function () {
    console.log(" client provider");
    var self = this;
    var active = null;
    var api_url = "add_client_handler.php";
    this.delete_user = function ($index) {
    };
    this.$get = function ($http, $q, $log) {
        console.log("clientData provider");
        return {
            callApi: function ($scope, client) {
                if (!client.active) {
                    active = false;
                }
                else {
                    active = client.active;
                }
                $scope.data = $.param({
                    first_name: client.first_name,
                    last_name: client.last_name,
                    active: client.active,
                    form: client.form
                });
                if (!client.first_name || !client.last_name || !client.active || !client.form) {
                    console.log('fill out all the fields');
                    self.display_errors = false;
                    return;
                }
                var user_info = client;
                console.log("first name: ", client.first_name, 'last name: ', client.last_name, 'form type: ', client.form);
                var defer = $q.defer();
                $http({
                    url: api_url,
                    method: "POST",
                    dataType: 'json',
                    data: $scope.data
                }).then(function success(response) {
                    if (response.data.message == "success") {
                        console.log('client.first_name: ', client.first_name);
                        $scope.data.first_name = client.first_name;
                        $scope.data.last_name = client.last_name;
                        $scope.data.active = client.active;
                        $scope.data.form = client.form;
                        window.location.reload();
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
//-----this will make http call and display it in client list form
app.factory('getClients', function ($http) {
    var link = 'get_clients_handler.php';
    var client = null;
    var client_obj = [];
    var full_name = null;
    return {
        callApi: function ($scope) {
            $http({
                url: link,
                dataType: 'json',
                method: 'POST'
            }).then(function success(response) {
                client = response.data.client;
                full_name = client.full_name;
                for (var i = 0; i < full_name.length; i++) {
                    client_obj.push({
                        full_name: full_name[i],
                        date_added: client.date_added[i],
                        active: client.active[i],
                        form: client.form[i]
                    });
                }
                $('.page-header').append($("<h4>Number of Clients: " + full_name.length + "</h4>").css({'float': 'right'}));
                $scope.clientArray = client_obj;
            });
        }
    }
});

//Include service in the function parameter list along with any other services
app.controller('clientController', function (clientData, $scope, getClients) {
    //Create a variable to hold this, DO NOT use the same name you used in your provider
    var new_self = this;
    var self = this;
    self.clientArray;
    this.display_errors = true;
    this.form_options = ["Form 1", "Form 2", "Form 3"];
    //Add an empty data object to your controller, make sure to call it 'data'
    $scope.data = {};
    //Add a function called getData to your controller to call the SGT API
    this.getClientData = function () {
        getClients.callApi($scope, self.clientArray)
    };
    this.getClientData();
    //Add a function called getData to your controller to call the SGT API
    this.sendClient = function (client) {
        console.log("get data fn, this is user: ", client);
        clientData.callApi($scope, client, self.display_errors)
            .then(function success(response) {
                new_self.data = response.data;
            })
    };
});
//This is the controller and http service that is called when you click next on create client page

app.factory('clientSetup',function($http,$log){
    var self = this;
    var link = 'clientSetup_handler';
    $log.info("ClientSetup Service");

    return{
        callApi: function ($scope,data){
            self.client_data = $.param({
                first_name: self.first_name,
                last_name: self.last_name,
                notes: self.notes
            });
            $http({
                url:link,
                dataType:'json',
                data: self.client_data,
                method:'POST'
            }).then(function success(response){
                console.log("clientSetup success")
            })
        }
    }
});




app.controller('clientSetupController', function ($scope, clientSetup) {
    var self = this;
    self.data = null;
    this.client_first_name = null;
    this.client_last_name = null;
    this.client_notes = null;
    this.sessionName = function () {
        clientSetup.callApi($scope, self.data)
    }
});
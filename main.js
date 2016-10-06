var app = angular.module("psychoApp", ["ngRoute"]);
// document.getElementById('client-id').tablesorter();

app.config(function ($httpProvider) {
    $httpProvider.defaults.headers.post = {'Content-Type': 'application/x-www-form-urlencoded'};
    // $httpProvider.defaults.dataType.post = 'json';

});
app.directive('diagnosis', function () {
    return {
        restrict: 'AE',
        priority: 1001,
        templateUrl: 'diagnosis.html'
    }
});
// this will route the view to whatever specified template URL when an href to that page is clicked on
app.config(function ($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: '/P.O/home.php'

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
        .when('/pdf_form', {
            templateUrl: '/P.O/pdf_form.php'
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
            .then(function success(response) {
                console.log(response);
            });
    }
});


//-----------client form------------
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
                client_obj = [];
                client = response.data.client;
                full_name = client.full_name;
                for (var i = 0; i < full_name.length; i++){
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
//----this is the service that will be used to get the form data of the client that is clicked on
app.factory('getFormInfo',function($http,$log){
    $log.info('getFormInfo Service');
    var link = 'getFormInfo.php';
    return{
        callApi: function ($scope,formName,date){
            $log.info(' Call APi getFormInfo Service');

            var data = $.param({
                name: formName,
                date:date
            });
            console.log('data: ' ,data);
            $http({
                url:link,
                dataType: 'json',
                method: 'post',
                data: data
            }).then(function success(response){
                // if(response.data.status == 'success'){
                //     window.location.replace('index.php#/pdf_form.php');
                // }
            });
        }
    }
});
//----This is the controller for both the clientData provider service and the getClients service

app.controller('clientController', function (clientData, $scope, getClients,getFormInfo) {
    //Create a variable to hold this, DO NOT use the same name you used in your provider
    var new_self = this;
    var self = this;
    self.clientArray;
    this.display_errors = true;
    this.form_options = ["Form 1", "Form 2", "Form 3"];
    //Add an empty data object to your controller
    $scope.data = {};
    this.getForm = function(formName, date){
        getFormInfo.callApi($scope, formName,date)
    };
    //Add a function called getData to your controller to call the PHP API
    this.getClientData = function () {
        getClients.callApi($scope, self.clientArray)
    };
    this.getClientData();
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
    var link = 'clientSetup_handler.php';
    $log.info("ClientSetup Service");
    return{
        callApi: function ($scope, data){
           if(data.first_name == '' || data.last_name == ''){

           }
            console.log("first name: " , data.first_name);
            var setupData = $.param({
                first_name: data.first_name,
                last_name : data.last_name,
                notes:data.notes
            });
            $http({
                url:link,
                dataType:'json',
                data: setupData,
                method:'POST'
            }).then(function success(response){
                console.log("clientSetup success: " ,response);
            })
        }
    }
});
app.controller('clientSetupController', function ($scope, clientSetup) {
    var self = this;
    self.data = null;
    this.sessionName = function () {
        self.client_data = {
            first_name: self.first_name,
            last_name: self.last_name,
            notes: self.notes
        };
        clientSetup.callApi($scope,self.client_data);
            // .then(function(response){
            //     console.log("success for call api promise");
            // })
    }
});


//This is the controller and http service that is called when you click the FORM 1,2, or 3 on Select_form.php
app.factory('selectForm',function($http,$log){
    var self = this;
    var link = 'formSelect_handler.php';

    $log.info("Form Setup Service");
    return{
        callApi: function ($scope, data){
            var form = $.param(
                data
            );
            console.log("form number: " , data);
            $http({
                url:link,
                dataType:'json',
                data: form,
                method:'POST'
            }).then(function success(response){
                console.log("form select success: " ,response);
            })
        }
    }
});
app.controller('selectFormController', function ($scope, selectForm) {
    var self = this;
    self.data = null;
    this.form1 = 'Form 1';
    this.form2 = 'Form 2'; //form2.php has not been made yet, expect error
    this.form3 = 'Form 3'; //form3.php has not been made yet, expect error
    this.form_type = function (form_number){
        console.log("form number: ", form_number);
        self.client_form = {
            form: form_number
        };
        selectForm.callApi($scope,self.client_form);
        // .then(function(response){
        //     console.log("success for call api promise");
        // })
    }
});


//------------form Submission service------------
app.factory('formSubmit',function($http,$log,$q){

    var self = this;
    var link = 'form_handler.php';
    var link2 = 'all_form_data_handler.php';
    $log.info("formSubmit Service");
    return{
        callApi: function ($scope,form){
            console.log('selected age: ' , form);
            var defer = $q.defer();
            $http({
                url:link,
                dataType:'json',
                method:'POST'
            }).then(function success(response){
                console.log("success response: " , response);
                if(response.data.status == 'success'){
                    defer.resolve(response)
                }
                else{
                    console.log("Error in the api");
                }
            }), function error(response) {
                $log.error("$http fail: ", response);
                defer.reject("Error response");
            };
            return defer.promise;
        },
        callApi2:function($scope,form){
            console.log('form data second api call: ' , form);
            var submitData = $.param({form});
            var defer = $q.defer();
            $http({
                url:link2,
                dataType:'json',
                data: submitData,
                method:'POST'
            }).then(function success(response){
                    console.log("call api 2 connected: " , response);
                    defer.resolve(response)

            }), function error(response) {
                $log.error("$http fail: ", response);
                defer.reject("Error response");
            };
            return defer.promise;
        }
    }


});
//this controller contains all the data that is necessary for the client form
app.controller('formController', function ($scope,$log,formSubmit,$location) {
    var self = this;
    self.numberOfFields = false;
    $scope.states = ['none', 'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'District of Columbia', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Marshall Islands', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Northern Mariana Islands', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Puerto Rico', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virgin Island', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'];
    $scope.country = ["Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)",
        "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of",
        "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island",
        "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States",
        "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Zambia", "Zimbabwe"];
    $scope.gender = ['male', 'female', 'transgender man', 'transgender woman', 'other'];
    $scope.relationship_status = ['single','significant other','married','separated', 'divorced', 'widowed'];
    $scope.education = ['Less than high school', 'Some high school', 'High school graduate', 'Associates', 'Bachelors', 'Masters', 'Phd'];
    $scope.sexual_orientation = ['straight', 'lesbian', 'bisexual', 'gay', 'queer', 'asexual'];
    $scope.children = [0,1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
    $scope.therapy_years = [0,1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60];
    $scope.age = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110];
    $scope.adopted = ['yes', 'no'];
    $scope.order = ['1st','2nd','3rd','4th','5th','6th','7th','8th'];
    $scope.ethnicity = ['Chinese', 'Japanese', 'Acholi', 'Akan', 'Albanian', 'Amhara', 'Arab', 'Arminian', 'Assyrian', 'Azerbaijanis', 'Balochis', 'Bamars', 'Bambara', 'Bashkris', 'Basque', 'Bemba', 'Bengali', 'Berbers', 'Beti-Pahuin', 'Bihari', 'Bosniaks', 'Brahui', 'Bulgarian', 'Catalan', 'Chuvash', 'Circassian', 'Chewa', 'Croats', 'Czechs', 'Danes', 'Dinka', 'Dutch', 'English', 'Estonian', 'Faroese', 'Finn', 'French', 'Frisians', 'Fula', 'Ganada', 'German', 'Greek', 'Georgian', 'Gujarati', 'Igbo', 'Hindunstani', 'Hui', 'Hungarian', 'Icelander', 'Irish', 'Italian', 'Javanese', 'Jewish', 'Kazakh', 'Kongo', 'Korean', 'Kurd', 'Lebanese', 'Macedonian', 'Malays', 'Marathi', 'Nepali', 'Persian', 'Polish', 'Portugese', 'Punjab', 'Romanian', 'Russian', 'Scottish', 'Serbian', 'Sinhalese', 'Slovik', 'Spanish', 'Swedish', 'Tajik', 'Thai', 'Turkish', 'Ukrainian', 'Vietnamese', 'Welsh', 'French', 'Filipian', 'Brazilian', 'Peruvian', 'Canadian', 'Jamacian', 'Ecuadorian', 'Mexican', 'Iranian', 'Egyptian', 'Greek', 'Syrian', 'Bolivian'];
    $scope.past_diagnosis =  ["Absence seizure","Abulia","Acute Stress Disorder","Adjustment Disorders","Agoraphobia","Akiltism","Alcohol Addiction", "Alzheimer’s Disease", "Amnesia", "Amphetamine Addiction", "Anorexia Nervosa", "Anterograde Amnesia", "Antisocial personality disorder", "Anxiety Disorder", "Anxiolytic related disorders", "Asperger’s Syndrome", "Attention Deficit Disorder", "Attention Deficit Hyperactivity Disorder", "Autism Spectrum Disorder", "Autophagia", "Avoidant Personality Disorder",
        "Barbiturate related disorders", "Benzodiazepine-related disorders", "Bereavement", "Bibliomania", "Binge Eating Disorder", "Bipolar disorder I", "Bipolar disorder II", "Body Dysmorphic Disorder", "Borderline intellectual functioning", "Borderline Personality Disorder", "Breathing-Related Sleep Disorder", "Brief Psychotic Disorder", "Bruxism", "Bulimia Nervosa",
        "Caffeine Addiction", "Cannabis Addiction", "Catatonic disorder", "Catatonic schizophrenia", "Childhood amnesia", "Childhood Onset Fluency Disorder", "Circadian Rhythm Disorders", "Claustrophobia", "Cocaine related disorders", "Communication disorder", "Conduct Disorder", "Conversion Disorder", "Cotard delusion", "Cyclothymia",
        "Delerium","Delusional Disorder","Dementia", "Dependent Personality Disorder or Asthenic Personality Disorder ", "Depersonalization disorder or Derealization", "Depressive personality disorder", "Derealization disorder", "Dermotillomania", "Desynchronosis", "Developmental coordination disorder", "Diogenes Syndrome", "Disorder of written expression", "Dispareunia", "Dissocial Personality Disorder", "Dissociative Amnesia", "Dissociative Fugue", "Dissociative Identity Disorder or Multiple Personality Disorder", "Down syndrome", "Dyslexia", "Dyspareunia", "Dysthymia or Persistent Depressive Disorder",
        "Eating disorder NOS", "Ekbom’s Syndrome (Delusional Parasitosis)", "Encopresis", "Enuresis (bedwetting)", "Erotomania", "Exhibitionistic Disorder", "Expressive language disorder",
        "Factitious Disorder", "Female Sexual Disorders", "Fetishistic Disorder", "Folie à deux", "Fregoli delusion", "Frotteuristic Disorder", "Fugue State",
        "Ganser syndrome", "Gambling Addiction", "Gender Dysphoria or Gender Identity Disorder", "Generalized Anxiety Disorder", "General adaptation syndrome", "Grandiose delusions",
        "Hallucinogen Addiction", "Haltlose personality disorder", "Histrionic Personality Disorder", "Primary hypersomnia", "Huntington’s Disease", "Hypoactive sexual desire disorder", "Hypochondriasis", "Hypomania", "Hyperkinetic syndrome", "Hypersomnia", "Hysteria",
        "Impulse control disorder", "Impulse control disorder NOS", "Inhalant Addiction", "Insomnia", "Intellectual Development Disorder", "Intermittent Explosive Disorder",
        "Joubert syndrome",
        "Kleptomania", "Korsakoff’s syndrome",
        "Lacunar amnesia", "Language Disorder", "Learning Disorders",
        "Major Depression or Depression", "Male Sexual Disorders", "Malingering", "Mathematics disorder", "Medication-related disorder", "Melancholia", "Intellectual Development Disorder", "Misophonia", "Morbid jealousy", "Munchausen Syndrome", "Munchausen by Proxy",
        "Narcissistic Personality Disorder", "Narcolepsy", "Neglect of child", "Neuroleptic-related disorder", "Nightmare Disorder", "Non Rapid Eye Movement",
        "Obsessive-Compulsive Disorder", "Obsessive-Compulsive Personality Disorder", "Oneirophrenia", "Onychophagia", "Opioid Addiction", "Oppositional Defiant Disorder", "Orthorexia",
        "Pain disorder", "Panic attacks", "Panic Disorder", "Paranoid Personality Disorder", "Parkinson’s Disease", "Partner relational problem", "Passive-aggressive personality disorder", "Pathological gambling", "Pedophilic Disorder", "Perfectionism", "Persecutory delusion", "Personality change due to a general medical condition", "Personality disorder", "Pervasive developmental disorder (PDD)", "Phencyclidine related disorder", "Phobic disorder", "Phonological disorder", "Physical abuse", "Pica", "Polysubstance related disorder", "Postpartum Depression", "Post-traumatic embitterment disorder (PTED)", "Post Traumatic Stress Disorder (PSTD)", "Premature ejaculation", "Premenstrual Dysphoric Disorder", "Psychogenic amnesia", "Psychological factor affecting medical condition", "Psychoneurotic personality disorder", "Psychotic disorder", "Pyromania",
        "Reactive Attachment Disorder", "Reading disorder", "Recurrent brief depression", "Relational disorder", "REM Sleep Behavior Disorder", "Restless Leg Syndrome", "Retrograde amnesia", "Rumination syndrome",
        "Sadistic personality disorder", "Schizoaffective Disorder", "Schizoid Personality Disorder", "Schizophrenia", "Schizophreniform disorder", "Schizotypal Personality Disorder", "Seasonal Affective Disorder", "Sedative, Hypnotic, or Anxiolytic Addiction", "Selective Mutism", "Self-defeating personality disorder", "Separation Anxiety Disorder", "Sexual Disorders Female", "Sexual Disorders Male", "Sexual Addiction", "Sexual Masochism Disorder", "Sexual Sadism Disorder", "Shared Psychotic Disorder", "Sleep Arousal Disorders", "Sleep Paralysis", "Sleep Terror Disorder or Nightmare Disorder", "Social Anxiety Disorder", "Somatization Disorder", "Specific Phobias", "Stendhal syndrome", "Stereotypic movement disorder", "Stimulant Addiction", "Stuttering or Childhood Onset Fluency Disorder", "Substance related disorder",
        "Tardive dyskinesia", "Tobacco Addiction", "Tourettes Syndrome", "Transient tic disorder", "Transient global amnesia", "Transvestic Disorder", "Trichotillomania",
        "Vaginismus", "Voyeuristic Disorder"
    ];
    $scope.num_of_diagnosis = [0,1,2,3,4,5,6,7,8];
    $scope.treatment_types = ["none","Anti-anxiety Agents","Anti-psychotics","Anti-depressants","Anti-obsessive Agents","Anti-Panic Agents","Mood Stabilizers","Stimulants","other"];
    $scope.therapy_types = ["none","Arts Therapy", "Behavioural activation", "Behavioral Therapy", "Cognitive Behavioural Therapy (CBT)","Counselling","Couples therapy","Family therapy", "Group therapy","Humanistic Therapy", "Interpersonal therapy","Mindfulness-based therapies","other","Psychotherapy",];
    $scope.employment = ['Employed','Unemployed','Full-time Student','Part-time Student','Retired','Disabled'];
    $scope.religion = ['None','Atheist/Agnostic','Buddhist','Catholic','Christian','Hindu','Jewish','Mormon','Muslim','Orthodox','Other','Protestant','Scientologist'];
    $scope.holdNumber = [];
    $scope.data = {};
    self.goHome = function () {
        // $location.url('index.php');
        window.location.replace('index.php');

    };
    this.displayDiagnosisFields = function(num){
        if(num == 0){
            self.oneField = false;
            self.twoFields = false;
            self.threeFields = false;
            self.fourFields = false;
            self.fiveFields = false;
            self.sixFields = false;
            self.sevenFields = false;
            self.eightFields = false;
        }else if(num == 1){
            self.oneField = true;
            self.twoFields = false;
            self.threeFields = false;
            self.fourFields = false;
            self.fiveFields = false;
            self.sixFields = false;
            self.sevenFields = false;
            self.eightFields = false;
        }else if(num == 2){
            self.oneField = true;
            self.twoFields = true;
            self.threeFields = false;
            self.fourFields = false;
            self.fiveFields = false;
            self.sixFields = false;
            self.sevenFields = false;
            self.eightFields = false;
        }else if(num == 3){
            self.oneField = true;
            self.twoFields = true;
            self.threeFields = true;
            self.fourFields = false;
            self.fiveFields = false;
            self.sixFields = false;
            self.sevenFields = false;
            self.eightFields = false;
        }else if(num == 4){
            self.oneField = true;
            self.twoFields = true;
            self.threeFields = true;
            self.fourFields = true;
            self.fiveFields = false;
            self.sixFields = false;
            self.sevenFields = false;
            self.eightFields = false;
        }else if(num == 5){
            self.oneField = true;
            self.twoFields = true;
            self.threeFields = true;
            self.fourFields = true;
            self.fiveFields = true;
            self.sixFields = false;
            self.sevenFields = false;
            self.eightFields = false;
        }else if(num == 6){
            self.oneField = true;
            self.twoFields = true;
            self.threeFields = true;
            self.fourFields = true;
            self.fiveFields = true;
            self.sixFields = true;
            self.sevenFields = false;
            self.eightFields = false;
        }else if(num == 7){
            self.oneField = true;
            self.twoFields = true;
            self.threeFields = true;
            self.fourFields = true;
            self.fiveFields = true;
            self.sixFields = true;
            self.sevenFields = true;
            self.eightFields = false;
        }else if(num == 8){
            self.oneField = true;
            self.twoFields = true;
            self.threeFields = true;
            self.fourFields = true;
            self.fiveFields = true;
            self.sixFields = true;
            self.sevenFields = true;
            self.eightFields = true;
        }
    };
    //Added function called submitData to call the API
    this.submitData = function (form) {
        console.log("submit data function");
        formSubmit.callApi($scope,form)
            .then(function success(response) {
                console.log('response promise: ' , response);
                self.submitAllData(form);

            })
    };
    self.submitAllData = function(form){
        formSubmit.callApi2($scope,form)
            .then(function success(response){
                console.log('all form data submitted correctly: ' , response);
                if(response.data.status == true){
                    
                }
            })
    }
});
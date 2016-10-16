$(document).ready(function(){
    getData('science');
    console.log("loaded");
});

function getData(query){
    console.log("getData function call");
    $.ajax({
        url:"http://api.springer.com/metadata/json?api_key=aad28331d38b527c831274156fde309c&q=" +query+ "&s=1&p=13",
        success:function(response){
            console.log('success: ' , JSON.parse(response ));
            var allData = JSON.parse(response);
            $('.content').append(allData);
            
        },
        error: function(response){
            console.log('error: ' , response);
        }
    })
}

<!-- From this...  -->
<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            text-align: center;
        }
        svg{
            padding-left:520px;
        }
    </style>
</head>
<body>
<script src='http://d3js.org/d3.v3.min.js'></script>

<script>
    var nums = [80, 53, 125, 90, 28, 97];
    var nums2 =[80, 53, 125, 90, 28, 97];

    var svg = d3.select('body').append('svg')
        .attr('height', 700)
        .attr('width', 700);

    var bars = svg.selectAll('rect')
        .data(nums);

    var circ = svg.selectAll('circle')
        .data(nums2);

    var text = svg.selectAll('text')
        .data(nums2);

//    var poly = svg.selectAll('polygon')
//        .data(nums2);

    bars.enter().append('rect');
    circ.enter().append('circle');
    text.enter().append('text');
//    poly.enter().append('polygon');


    d3.selectAll('rect','circle')
        .attr('width', 20)
        .attr('height', 20);

    d3.selectAll('text')
        .attr('width', 20)
        .attr('height', 20);



//d represents the current data point, and i the current index
    bars.attr('x', function(d, i) {
        return 70*i;
    });
    circ.attr('cx', function(d, i) {
        return 72*i;
    });
    circ.attr('r', function(d, i) {
        return .2*d;
    });
    circ.attr('fill', function(d, i) {
        return 'green';
    });
    text.attr('dy', function(d,i){
        return '.3em';
    });
    text.attr('x', function(d,i){
        return '50%';
    });
    text.attr('y', function(d,i){
        return '50%';
    });
    text.attr('text-anchor','middle');

//    line.attr('y2', function(d,i){
//        return 5 * d;
//    });
//    line.attr('stroke', function(d,i){
//        return 'black';
//    });
//    line.attr('stroke-width', function(d,i){
//        return .8 * d;
//    });



//    poly.attr('x', function(d, i) {
//        return 80*i;
//    });
//    poly.attr('stroke-width', function(d, i) {
//        return .03*d;
//    });
//    poly.attr('stroke', function(d, i) {
//        return 'black';
//    });
//    poly.attr('points', function(d, i) {
//        return '05,30 15,10 25,30';
//    });
//    poly.attr('fill', function(d, i) {
//        return 'yellow';
//    });
//this binds the data from nums array to the height attr
    bars.attr('height', function(d, i) {
        return d;
    });
    circ.attr('height', function(d, i) {
        return d;
    });

//this will invert the graph so it's upright
    bars.attr('y', function(d, i) {
        return 700 - d;
    });
    circ.attr('cy', function(d, i) {
        return 600 - d;
    });
    circ.attr('text', function(d, i) {
        return  d;
    });


//    poly.attr('y', function(d, i) {
//        return 600 - d;
//    });


</script>
</body>
</html>


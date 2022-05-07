// arrVal - takes amount of the option's votes
var arrVal = [];
// text - text of each option 
var text = [];
// div to display statistics
var div = $('.card');
// total amount od votes
var total = 0;
$('.votes').each(function() {
    var i = parseInt($(this).text());
    arrVal.push(i);
    total += i;
    text.push($(this).attr('data-text'));
});
$(arrVal).each(function (index){
    var procent = arrVal[index]/total * 100;
    if(procent>0){
        $(div).append('<div title="'+arrVal[index]+'" style="width:' + procent + '%; background-color:black;color:white;height:40px;margin-bottom:10px;">'+Math.round(procent)+'% |'+text[index]+'</div>')
    }
});
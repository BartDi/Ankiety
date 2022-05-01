var i = 3;
$(document).on('click','.add',function(e){
    var but = $('.addDiv');
    if(i==21){
        but.after('<p style="color:red;">Zaloguj się aby móc dodać więcej pól</p>');
    }else if(i<21){
        but.before('<input type="text" class="option" name="options[]" placeholder="Opcja '+i+'">');
        // $('.option')[0].remove();
    }
    i += 1;
});
var ileWierszy = 2; 
$(document).on('click', '.add2', function(e){
    var number = $('.numberAdd').val();
    var but = $('.addDiv');
    if(number != ""){
        for(var j = 1; j <= number; j++){
            ileWierszy += 1;
            if(ileWierszy<21){
                but.before('<input type="text" class="option" name="options[]" placeholder="Opcja '+ileWierszy+'">');
            }
            else if(ileWierszy == 21){
                but.after('<p style="color:red;">Zaloguj się aby móc dodać więcej pól</p>');
            }
        }
    }
    if(number == ""){
        console.log('wpisz');
    }

});
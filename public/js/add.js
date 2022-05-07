// i - amount of options, default value of options is 2 so next is 3
var i = 3;
// function which add option once
$(document).on('click','.add',function(e){
    var but = $('.addDiv');
    if(i==21){
        but.after('<p style="color:red;">Zaloguj się aby móc dodać więcej pól</p>');
    }else if(i<21){
        but.before('<div class="inputDiv"><input type="text" class="option" name="options[]" placeholder="Opcja '+i+'"><i class="fa-solid fa-trash-can text-danger bin" style="padding-left:5px;"></i></div>');
        // $('.option')[0].remove();
    }
    i += 1;
});
// function which add the amount of options
$(document).on('click', '.add2', function(){
    var number = $('.numberAdd').val();
    var but = $('.addDiv');
    if(number != ""){
        for(var j = 1; j <= number; j++){
            if(i<21){
                but.before('<div class="inputDiv"><input type="text" class="option" name="options[]" placeholder="Opcja '+i+'"><i class="fa-solid fa-trash-can text-danger bin" style="padding-left:5px;"></i></div>');
            }
            else if(i == 21){
                but.after('<p style="color:red;">Zaloguj się aby móc dodać więcej pól</p>');
            }
            i += 1;
        }
    }

});
// function to remove option after click the bin icon
$(document).on('click', '.bin', function(e){
    var div = $(this).parent();
    if(div.hasClass("inputDiv")){
        div.remove();
        i -= 1;
    }
});
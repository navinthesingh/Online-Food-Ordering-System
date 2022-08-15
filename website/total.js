
//specifies which class this variable needs to detect
var quantityInput = document.getElementsByClassName('quantity');

//loops all the existing quantity input
for (var i = 0; i < quantityInput.length; i++){
    var input = quantityInput[i]

    //whenever a quantity is changed, it will enable the function
    input.addEventListener('change', quantityChanged)
}


function quantityChanged(event){
    
    var input = event.target;

    //ensures that the quantity value can not be less than 0
    if (input.value < 0) {
        input.value = 0;
    }

    total();
}


//enables when the quantity is changed and calulates the total
function total(){
    var total = 0;

    //determines the elements that are targeted with the specified class
    var rows = document.getElementsByClassName('price');
    
    //loops throught the amount of existing elements present with said class
    for (var i = 0; i < rows.length; i++){

        //specifying the particular price that is targetting during the loop
        var priceElement = document.getElementsByClassName('price')[i]

        //specifying the particular quantity that is targetting during the loop
        var quantityElement = document.getElementsByClassName('quantity')[i]
        
        //specifies the inner content of the element, replacing string characters with spaces and change it to a float number
        var price = parseFloat(priceElement.innerText.replace('RM',''));

        //obtains the value of the element
        var quantity = quantityElement.value;
        
        //calculate the total
        total = total + (price * quantity);
        
    }
    
    //round up the total to the nearest 1 decimal
    total = Math.round(total * 10) / 10;
    
    //determines whether the total has decimals or not and display it accordingly
    if (total % 1 != 0) {
        document.getElementById('total').innerText = 'RM ' + total + '0';
    }
    else {
        document.getElementById('total').innerText = 'RM ' + total + '.00';
    }
    

}

//the onclick function of the submit button to determine whether the users have put in the required, relevant information
function afterPurchase() {

    var total = document.getElementById('total').innerText;
    var name = document.getElementById('name').value;
    var credit = document.getElementById('credit').value;
    var cvv = document.getElementById('cvv').value;
    var exp = document.getElementById('exp').value;
    var exp2 = document.getElementById('exp2').value;
    var address = document.getElementById('address').value;
    var phone = document.getElementById('phone').value;

    //if the total is not changed, it will alert the users
    if (total == 'RM 0.00'){
        alert("Order is empty!");
    }

    else if (!name || !credit || !address || !cvv || !exp || !exp2 || !phone ){
        alert("Required field empty!");
    }
    
    else {
        alert("Thank you for ordering!");
    }
    
}



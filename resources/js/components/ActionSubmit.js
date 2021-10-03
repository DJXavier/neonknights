let slotMax = 3;
let currentSlot = 0;

var slotId = [false,false,false];

function CheckAvailability(neededSlot){
    if(neededSlot + currentSlot > slotMax){
        alert("Hi, one week can only get maximum of three slots arranged, so please remove one or more actions.");
        return false;
    }else{
        currentSlot += neededSlot;
        return true;
    }
    
}

function FormSubmit(event) {
    if (currentSlot != 3) {
        alert('You have not selected enough actions for the week.');
    } else {
        event.target.submit();
    }
}

function addActionClickListener(buttonName, hiddenInputName, neededSlot){
    if(document.getElementById(buttonName).style.backgroundColor!='red')
    {
        for(var i = 0; i< 3;i++){
            if(slotId[i]==false){
                if(CheckAvailability(neededSlot)){
                    var input = document.createElement("input");
                    input.name="action"+i;
                    input.id="action"+i;
                    input.value=buttonName;
                    input.class="form-control-plaintext text-md";
                    input.style="pointer-events:none";

                    var divRowStart = document.createElement("div");
                    divRowStart.class = "form-group row";
                    divRowStart.id="div"+i;
                    divRowStart.name="div"+i;

                    var deleteButton = document.createElement("input");
                    deleteButton.type="button"; 
                    deleteButton.class="btn btn-primary";
                    deleteButton.value="remove";
                    deleteButton.id="deleteButton"+i;
                    deleteButton.onclick=function ($neededSlot) {
                        var actionToDelete = document.getElementById('action'+i.toString());
                        var divToDelete = document.getElementById('div'+i.toString());
                        var buttonToDelete = document.getElementById('deleteButton'+i.toString());
                        actionToDelete.remove();
                        divToDelete.remove();
                        buttonToDelete.remove();
                        currentSlot -= neededSlot;
                        slotId[i] = false;

                    };
                    slotId[i] = true;
                    console.log(input.id);
                    document.getElementById('displayPanel').appendChild(divRowStart);
                    document.getElementById('displayPanel').appendChild(input);
                    document.getElementById('displayPanel').appendChild(deleteButton);

                    break;
                }
            }
        } 
    } 
}

function toggleOnJoust(){
    document.getElementById('joustAcceptButton').value='yes'; 
}
function toggleOffJoust(){
    document.getElementById('joustAcceptButton').value='no'; 
}

export { addActionClickListener };
'use strict';

function viewChange(){
    if(document.getElementById('composition_select')){
        id = document.getElementById('composition_select').value;
        if(id == '0'){
            document.getElementById('composition_reg').style.display = "none";
            document.getElementById('composition_solo').style.display = "none";
            document.getElementById('composition_2piece').style.display = "none";
            document.getElementById('composition_3piece').style.display = "none";
            document.getElementById('composition_4piece').style.display = "none";
            document.getElementById('composition_5piece').style.display = "none";
            document.getElementById('composition_6piece').style.display = "none";
            document.getElementById('composition_other').style.display = "none";
        }
        else if(id == 'registered_comp'){
            document.getElementById('composition_reg').style.display = "";
            document.getElementById('composition_solo').style.display = "none";
            document.getElementById('composition_2piece').style.display = "none";
            document.getElementById('composition_3piece').style.display = "none";
            document.getElementById('composition_4piece').style.display = "none";
            document.getElementById('composition_5piece').style.display = "none";
            document.getElementById('composition_6piece').style.display = "none";
            document.getElementById('composition_other').style.display = "none";
        }
        else if(id == 'solo'){
            document.getElementById('composition_reg').style.display = "none";
            document.getElementById('composition_solo').style.display = "";
            document.getElementById('composition_2piece').style.display = "none";
            document.getElementById('composition_3piece').style.display = "none";
            document.getElementById('composition_4piece').style.display = "none";
            document.getElementById('composition_5piece').style.display = "none";
            document.getElementById('composition_6piece').style.display = "none";
            document.getElementById('composition_other').style.display = "none";
        }
        else if(id == '2piece'){
            document.getElementById('composition_reg').style.display = "none";
            document.getElementById('composition_solo').style.display = "none";
            document.getElementById('composition_2piece').style.display = "";
            document.getElementById('composition_3piece').style.display = "none";
            document.getElementById('composition_4piece').style.display = "none";
            document.getElementById('composition_5piece').style.display = "none";
            document.getElementById('composition_6piece').style.display = "none";
            document.getElementById('composition_other').style.display = "none";
        }
        else if(id == '3piece'){
            document.getElementById('composition_reg').style.display = "none";
            document.getElementById('composition_solo').style.display = "none";
            document.getElementById('composition_2piece').style.display = "none";
            document.getElementById('composition_3piece').style.display = "";
            document.getElementById('composition_4piece').style.display = "none";
            document.getElementById('composition_5piece').style.display = "none";
            document.getElementById('composition_6piece').style.display = "none";
            document.getElementById('composition_other').style.display = "none";
        }
        else if(id == '4piece'){
            document.getElementById('composition_reg').style.display = "none";
            document.getElementById('composition_solo').style.display = "none";
            document.getElementById('composition_2piece').style.display = "none";
            document.getElementById('composition_3piece').style.display = "none";
            document.getElementById('composition_4piece').style.display = "";
            document.getElementById('composition_5piece').style.display = "none";
            document.getElementById('composition_6piece').style.display = "none";
            document.getElementById('composition_other').style.display = "none";
        }
        else if(id == '5piece'){
            document.getElementById('composition_reg').style.display = "none";
            document.getElementById('composition_solo').style.display = "none";
            document.getElementById('composition_2piece').style.display = "none";
            document.getElementById('composition_3piece').style.display = "none";
            document.getElementById('composition_4piece').style.display = "none";
            document.getElementById('composition_5piece').style.display = "";
            document.getElementById('composition_6piece').style.display = "none";
            document.getElementById('composition_other').style.display = "none";
        }
        else if(id == '6piece'){
            document.getElementById('composition_reg').style.display = "none";
            document.getElementById('composition_solo').style.display = "none";
            document.getElementById('composition_2piece').style.display = "none";
            document.getElementById('composition_3piece').style.display = "none";
            document.getElementById('composition_4piece').style.display = "none";
            document.getElementById('composition_5piece').style.display = "none";
            document.getElementById('composition_6piece').style.display = "";
            document.getElementById('composition_other').style.display = "none";
        }
        else if(id == 'other'){
            document.getElementById('composition_reg').style.display = "none";
            document.getElementById('composition_solo').style.display = "none";
            document.getElementById('composition_2piece').style.display = "none";
            document.getElementById('composition_3piece').style.display = "none";
            document.getElementById('composition_4piece').style.display = "none";
            document.getElementById('composition_5piece').style.display = "none";
            document.getElementById('composition_6piece').style.display = "none";
            document.getElementById('composition_other').style.display = "";
        }
    }

    document.getElementById("composition_select").onchange = viewChange();
}

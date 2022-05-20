require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//人数と編成内容を格納 -- [1]
const compCategory =
    {

    };

    function viewChange(){
        if(document.getElementById('composition_select')){
            id = document.getElementById('composition_select').value;
            if(id == 'select1'){
                document.getElementById('Box1').style.display = "";
                document.getElementById('Box2').style.display = "none";
                document.getElementById('Box3').style.display = "none";
            }else if(id == 'select2'){
                document.getElementById('Box1').style.display = "none";
                document.getElementById('Box2').style.display = "";
                document.getElementById('Box3').style.display = "none";
            }
            else if(id == 'select3'){
                document.getElementById('Box1').style.display = "none";
                document.getElementById('Box2').style.display = "none";
                document.getElementById('Box3').style.display = "";
            }
        }

    window.onload = viewChange;
    }

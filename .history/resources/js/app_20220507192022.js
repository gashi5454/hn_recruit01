require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//人数と編成内容を格納 -- [1]
const compCategory =
    {
        "solo": [
            "ボーカル", "ギター＆ボーカル", "ベース＆ボーカル",
            "ウクレレ＆ボーカル","キーボード＆ボーカル"
        ],
        "2piece": [
            "ボーカル２人","ギター２人","ギター＆ボーカル２人", "ギター＆ボーカル、ボーカル",
            "キーボード２人","キーボード＆ボーカル２人", "キーボード＆ボーカル、ボーカル",
            "ウクレレ２人","ウクレレ＆ボーカル２人", "ウクレレ＆ボーカル、ボーカル"
        ],
        "3piece": [
            'ギター＆ボーカル、ベース、ドラム','ベース＆ボーカル、ギター、ドラム',
            'キーボード＆ボーカル、ベース、ドラム','ドラム＆ボーカル、ギター、ベース',
            'ボーカル、ギター、ドラム','ボーカル、ベース、ドラム',
            'ギター、キーボード、ドラム','キーボード、ベース、ドラム'
        ],
        "4piece": [
            "ボーカル、ギター、ベース、ドラム", "ボーカル、キーボード、ベース、ドラム",
            "ギター＆ボーカル、ギター、ベース、ドラム", "ギター＆ボーカル、キーボード、ベース、ドラム",
            "ベース＆ボーカル、ギター２人、ドラム","ベース＆ボーカル、ギター、キーボード、ドラム",
            "キーボード＆ボーカル、ギター、ベース、ドラム","ドラム＆ボーカル、ギター２人、ベース",
            "ドラム＆ボーカル、ギター、キーボード、ベース"
        ],
        "5piece": [
            "ボーカル、ギター２人、ベース、ドラム",
            "ボーカル、ギター、キーボード、ベース、ドラム",
            "ボーカル、ギター、ベース、ドラム、パーカッション",
        ],
        "6piece": [
            "ボーカル、ギター２人、キーボード、ベース、ドラム",
            "ギター＆ボーカル、ギター２人、ベース、ドラム",
            "ボーカル、ギター２人、ベース、ドラム、パーカッション",
        ],
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

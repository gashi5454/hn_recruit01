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

//選択されたカテゴリーを受け取って処理をする -- [4]
const setCompCategory(selectedCategory){
const selectCompCategory = document.getElementById('composition'); //2つめのセレクトボックスを取得し
menuList.disabled = false; //選択可能な状態にする

  //選択されたカテゴリーのメニュー一覧に対して処理をする
    compCategory[selectedCategory].forEach((menu, index) => {
    const option = document.createElement('option'); //option要素を新しく作る
    option.value = index; //option要素の値に、メニューを識別できる番号を指定する
    option.innerHTML = menu; //ユーザー向けの表示としてメニュー名を指定する
    selectCompCategory.appendChild(option); //セレクトボックスにoption要素を追加する
    });
}

//カテゴリーを選ぶためのセレクトボックスを指定 -- [2]
const categorySelect = document.getElementById('composition_select');

//なんらかのカテゴリーが選択されたら（change）、処理を行う -- [3]
categorySelect.addEventListener('change', (e) => {
    setCompCategory(e.target.value);  //選択されたカテゴリーを引数として関数に渡す
//※e.target.valueはcategorySelectで選択された値
})

//カウンター
//個数の背景色を変更する
document.getElementById('counterOutput').style.backgroundColor = '#FFCCCC';


var counterOutput = document.getElementById("counterOutput");

// 加算機能
var plusButton = document.getElementById("plusButton");
var onClickPlusButton = () => {
  counterOutput.value++;
};
plusButton.addEventListener("click", onClickPlusButton);

// 減算機能
var minusButton = document.getElementById("minusButton");
var onClickMinusButton = () => {
  if (counterOutput.value >= 1) {
    counterOutput.value--; // カウント数が1以上のときだけ減算する
  }
};
minusButton.addEventListener("click", onClickMinusButton);

document.form1.action = 'menu.php';


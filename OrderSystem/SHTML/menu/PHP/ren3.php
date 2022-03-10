<!DOCTYPE html>
<html lang="ja">
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", () => {
  const amount1 = document.querySelector("#amount_1");
  const amount2 = document.querySelector("#amount_2");
  const appendOption = document.querySelector("#appendOption");
  const itemUmai = document.querySelector("#itemUmai");
  const itemBlackThunder = document.querySelector("#itemBlackThunder");
  const taxSelectors = document.querySelectorAll("input[name=tax]");
  const taxRules = document.querySelectorAll("input[name=taxRule]");
  const result = document.querySelector("#result");
  const observationTargets = [amount1, amount2, appendOption,itemUmai,itemBlackThunder]
    .concat(Array.from(taxSelectors))
    .concat(Array.from(taxRules));

  const calcurate = () => {
    let totlaAmount = 0;
    totlaAmount += Number(amount1.value);
    totlaAmount += Number(amount2.value);
    totlaAmount += Number(appendOption.value);
    
    if (itemUmai.checked) {
      totlaAmount += Number(itemUmai.value);
    }
    if (itemBlackThunder.checked) {
      totlaAmount += Number(itemBlackThunder.value);
    }

    const tax = document.querySelector("input[name=tax]:checked");
    const taxRule = document.querySelector("input[name=taxRule]:checked");
    const isAddTax = tax && Number(tax.value);
    if (isAddTax) {
      // 総額での計算のみ対応（個別計算は手間だったので省略）
      let taxAmount = totlaAmount * 8 / 100;

      // 小数の処理ルール
      const rule = taxRule ? taxRule.value : "ceil";
      switch (rule) {
        case 'round':
          taxAmount = Math.round(taxAmount);
          break;
        case 'ceil':
          taxAmount = Math.ceil(taxAmount);
          break;
        case 'floor':
          taxAmount = Math.floor(taxAmount);
          break;
      }

      // 消費税を加算
      totlaAmount += taxAmount;
    }

    result.value = totlaAmount;
  };

  observationTargets.forEach(elm => {
    elm.addEventListener("input", calcurate);
  });
  calcurate();
});


</script>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>呼び出しページ</title>
    <link href="..//CSS/common.css" rel="stylesheet" type="text/css">
    <link href="..//CSS/call.css" rel="stylesheet" type ="text/css">

</head>
<body>
<main>
  <section class="section">
    <div class="container">
      <form action="">
        <div class="field">
          <label class="label">金額１</label>
          <div class="control">
            <input type="number" class="input" id="amount_1" placeholder="金額を入力">
          </div>
        </div>

        <div class="field">
          <label class="label">金額２</label>
          <div class="control">
            <input type="number" class="input" id="amount_2" placeholder="金額を入力">
          </div>
        </div>

       
        <div class="field">
          <label class="label">結果</label>
          <div class="control">
            <input type="number" class="input" id="result" placeholder="計算結果が入ります" readonly>
          </div>
        </div>

      </form>
    </div>
  </section>
</main>
    <footer class="wrap">
		<p><small>&copy;Copyright SAGAMIYA All rights reserved.</small>
		<p>
	</footer>
</body>
</html>
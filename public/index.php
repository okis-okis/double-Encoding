<h1>Home page</h1>

<form action='/work/' method='post'>
    <p>
        <h3>
            Enter, please, value for send. Range of value from 80 to 200.
        </h3>
        <input type='text' name='countTest' placeholder="80">
    </p>

    <p>
        <button name='valueTest' type="submit"> Send value </button>
    </p>

    <p>
        <button name='autoTest' type="submit"> System (auto) test </button>
    </p>

    <p>
        <?=$_POST['errors'] ?? null?>
    </p>

    <h3>Count of right answers: <?=$_POST['countRightAnswers']??null?>/<?=count($this->params)?></h3>

    <?php foreach($this->params as $val) {?>
    <?php if(isset($val['decValue'])) { ?>
        <h3>
            Test:
        </h3>

        <h4>
            <p>
                Value: <?=$val['value']??null?>
            </p>
            <p>
                Binary: <?=$val['binValue']??null?>
            </p>
            <p>
                Double code: <?=$val['doubleCode']??null?>
            </p>
            <p>
                Add noise to code: <?=$val['noiseCode']??null?>
            </p>
            <p>
                Check code on errors: <?=$val['checkCode']??null?>
            </p>
            <p>
                System send again data/code
            </p>
            <p>
                System get message: <?=$val['doubleCode']??null?>
            </p>
            <p>
                Convert from double code to decimal <?=$val['fromDoubleCode']??null?>
            </p>
            <p>
                Decimal: <?=$val['decValue']??null?>
            </p>
            <p>
                Result of transfer: <?=$val['result']??null?>
            </p>
        </h4>
    <?php }}?>
    
</form>
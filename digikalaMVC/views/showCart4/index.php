
<form action="showcart4/saveorder" method="post">

    <style>

        #main::after {
            content: " ";
            clear: both;
            display: block;
        }

        #main {
            font-family: yekan;
        }

        .head {
            float: right;
            margin-top: 36px;
            width: 100%;
        }

        .head h4 {
            font-size: 12.5pt;
            font-family: yekan;
            margin-top: 5px;
            padding-right: 10px;
            float: right;
        }

        .btn_green {
            background: #36be2b none repeat scroll 0 0;
            box-shadow: 1px 1px 3px #ccc;
            color: #fff;
            display: block;
            font-family: yekan;
            font-size: 11pt;
            height: 37px;
            line-height: 34px;
            text-align: center;
            width: 170px;
            border-radius: 4px;
        }

        .head .btn_green {
            float: left;
            margin-left: 5px;
            margin-top: 8px;
        }

    </style>

    <div id="main" style="width: 1200px;margin:10px auto;padding: 5px;background: #fff;">


        <style>

            .order-steps {

                padding-left: 10px;
                padding-right: 200px;
                padding-top: 53px;
                height: 100px;
                font-family: yekan;
            }

            .order-steps .dashed {

                float: right;
                margin-top: 12px;
                margin-left: 4px;
            }

            .order-steps .dashed span {
                width: 11px;
                height: 3px;
                background: blue;
                display: block;
                float: right;
                margin-left: 3px;
            }

            .order-steps ul {

            }

            .order-steps ul li {

                display: block;
                float: right;
                height: 1px;
                position: relative;
                width: 180px;

            }

            .order-steps ul li .circle {

                width: 19px;
                height: 19px;
                display: block;
                border: 3px solid #ccc;
                border-radius: 100%;
                position: absolute;
            }

            .order-steps ul li.active .circle {

                border: 3px solid #2396f3;
                background: #2396f3 url(public/images/slices.png) no-repeat -810px -476px;
                border-radius: 100%;
                position: absolute;
            }

            .order-steps ul li .line {

                width: 128px;
                height: 2px;
                display: block;
                background: #ccc;
                position: absolute;
                right: 36px;
                top: 15px;

            }

            .order-steps ul li.active .line {

                background: #2396f3;

            }

            .order-steps ul li .title {

                font-size: 11.7pt;
                position: absolute;
                right: -41px;
                top: 27px;
                width: 146px;
            }

            .order-steps ul li.active .title {

                color: #2396f3;
            }

        </style>

        <div class="order-steps">
            <div class="dashed">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul>
                <li class="active"><span class="circle"></span><span class="line"></span><span
                        class="title">
???????? ???? ???????? ????????
                                    </span></li>
                <li class="active"><span class="circle"></span><span class="line"></span><span class="title">
?????????????? ?????????? ??????????
            </span></li>
                <li class="active"><span class="circle"></span><span class="line"></span><span class="title">
?????????????? ??????????
            </span></li>
                <li><span class="circle"></span><span class="line"></span><span class="title">
?????????????? ????????????
            </span></li>


            </ul>
            <div class="dashed">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>


        <?php
        $Status=$data['status'] ;
        if($Status!=''){
            ?>

            <style>
                #ErrorPayment{
                    border:1px solid red;
                    text-align: center;
                    padding: 10px;
                    font-size: 13pt;
                    color:red;
                    font-family: yekan;
                }
            </style>

            <div id="ErrorPayment">

                ??????!
                <?php


                $ErrorArray=unserialize(zarinpalErrors);
                $Error=$ErrorArray[$Status];
                echo $Error;


                ?>

            </div>

        <?php } ?>


        <div class="head">
            <h4>
                ???? ??????????
            </h4>
            <span onclick="submitForm()" class="btn_green" style="cursor: pointer;">
?????????? ????????
        </span>
        </div>

        <style>
            .discount_code {
                width: 100%;
                float: right;
                margin-top: 20px;
                font-size: 10.7pt;
                border: 1px solid #eee;
            }

            .discount_code input {
                width: 180px;
                height: 27px;
                border: 1px solid #eee;
            }

            .discount_code td {
                padding: 8px;
            }

            .btn_blue {
                background: #6c59f3 none repeat scroll 0 0;
                box-shadow: 1px 1px 3px #ccc;
                color: #fff;
                display: block;
                font-family: yekan;
                font-size: 11pt;
                height: 37px;
                line-height: 34px;
                text-align: center;
                width: 170px;
                border-radius: 4px;
                margin: auto;
            }

        </style>

        <table cellspacing="0" class="discount_code">
            <tr>
                <td>


                    ???? ?????????? ???????? ???????? ????????

                    ?????? ???????? ?????????? ???? ???? ?????????? ???????? ???????? ?????????????? ?????????? ???????????? ???? ???? ???? ???????? ???????? ?? ???? ???????????? ???????? ?????? ????????
                    ???? ???? ?????????? ???????? ???????????? ?????? ?????? ?????????????
                </td>
                <td>
                    <input type="text" id="code" name="code">
                </td>
                <td>
                <span style="cursor: pointer;" class="btn_blue" onclick="checkCode();">
?????? ???? ??????????
                </span>

                </td>
            </tr>
        </table>


        <div class="head">
            <h4>
                ???????? ????????
            </h4>

        </div>


        <table cellspacing="0" class="discount_code">
            <tr>
                <td>


                    ???????? ???????? ???????? ????????
                    .
                    ?????? ???????? ?????????? ???? ???? ?????????? ???????? ???????? ?????????????? ?????????? ???????????? ???? ???? ???? ???????? ???????? ?? ???? ???????????? ???????? ?????? ????????
                    ???? ???? ?????????? ???????? ???????????? ?????? ?????? ?????????????
                </td>
                <td>
                    <input type="text">
                </td>
                <td>
                <span class="btn_blue">
?????? ???? ????????
                </span>

                </td>
            </tr>
        </table>


        <table cellspacing="0" class="discount_code">
            <tr style="background: #ddfed8;">
                <td style="width: 1000px;">

                    ???????? ???? ???????? ????????????:

                </td>

                <td>
               <span id="totalprice">

               </span>
                    ??????????
                </td>

            </tr>
        </table>


        <div class="head">
            <h4>
                ???????? ????????????
            </h4>

        </div>


        <style>
            .pardakht_type {
                float: right;
                width: 100%;
                margin-top: 20px;

            }

            .pardakht_type tr:first-child td {
                border-top: 1px solid #eee;
            }

            .pardakht_type tr:first-child td:first-child {
                border-right: 1px solid #eee;
            }

            .pardakht_type td {
                border-left: 1px solid #eee;
                border-bottom: 1px solid #eee;
                padding: 5px;
            }

            .pardakht_type .circle {
                width: 15px;
                height: 15px;
                border: 1px solid #ccc;
                border-radius: 100%;
                position: relative;
                display: block;
                margin-left: 6px;
                margin-top: 4px;
                cursor: pointer;
            }

            .circle.active {
                background: #515ff8;
                border: none;
                position: relative;
            }

            .circle.active tr:first-child td:first-child {
                background: #f7fff7;
            }

            .circle.active::after {
                background: #fff none repeat scroll 0 0;
                border-radius: 100%;
                content: " ";
                display: block;
                width: 5px;
                height: 5px;
                position: absolute;
                right: 5px;
                top: 5px;
            }

            .circle.active {
                background: #515ff8;
                border: none;
                position: relative;
            }

            .circle.active::after {
                background: #fff none repeat scroll 0 0;
                border-radius: 100%;
                content: " ";
                display: block;
                width: 5px;
                height: 5px;
                position: absolute;
                right: 5px;
                top: 5px;
            }

            .circle_container{
                float: right;
            }

            .circle_container input[type=radio]{
                display: none;
            }

        </style>

        <table cellspacing="0" class="active pardakht_type">
            <tr>

                <td class="girande" colspan="3">
                    ???????????? ???????? ????????????:

                    <br>


                    <div style="float: right;margin-left: 5px;">
                        <div class="circle_container">
                            <input type="radio" name="paytype" value="1">
                            <span class="circle" style="float: right;"></span>
                        </div>
                        <span style="float: right;font-size: 10pt;">
 ???????? ??????
</span>
                    </div>

                    <div style="float: right;">
                        <div class="circle_container">
                            <input type="radio" name="paytype" value="2">
                            <span class="circle" style="float: right;"></span>
                        </div>

                        <span style="float: right;font-size: 10pt;">
                        ?????????? ??????

</span>
                    </div>
                    <div style="float: right;margin-right: 30px;">
                        <div class="circle_container">
                            <input type="radio" name="paytype" value="3">
                            <span class="circle" style="float: right;"></span>
                        </div>
                        <span style="float: right;font-size: 10pt;">
?????????? ??????????????
</span>

                    </div>

                </td>

            </tr>

        </table>
        <table cellspacing="0" class="active pardakht_type">
            <tr>
                <td style="width: 60px;position: relative;" rowspan="3">
                    <div class="circle_container">
                        <input type="radio" name="paytype" value="4">
                        <span class="circle"></span>
                    </div>
                </td>
                <td class="girande" colspan="3">


                    ???????? ???? ????????

                    ?????? ???? ???????????? ?????? ?????????? ?????? ???? ?????????? ???????????? ?????? ???????? ???? ???????? ???????????? ?????????? ?? ???????????? ???? 24 ???????? ???? ????
                    ?????????? ?????????????? ???? ???? ?????? ????????????.


                </td>

            </tr>

        </table>


        <table cellspacing="0" class="active pardakht_type">
            <tr>
                <td style="width: 60px;position: relative;" rowspan="3">
                    <div class="circle_container">
                        <input type="radio" name="paytype" value="5">
                        <span class="circle"></span>
                    </div>
                </td>
                <td class="girande" colspan="3">

                    ?????????? ???? ????????

                    ?????? ???? ???????????? ?????? ?????????? ?????? ???? ???? ???????? ???????????? ???? ?????? ???????? ???? ???????? ???????? ???? ?????????? ?????????? ???????? ?? ???? ????????????
                    24 ???????? ???? ???? ?????????? ?????????????? ???? ???? ?????? ????????????

                </td>

            </tr>

        </table>


        <div style="float: left;width: 100%;margin-top: 50px;">
        <span class="btn_green" onclick="submitForm()" style="float: left;cursor: pointer;">
?????????? ????????
        </span>
        </div>

    </div>

    <script>
        function submitForm() {
            $('form').submit();
        }
    </script>


    <style>
        .red {

            box-shadow: 1px 1px 3px red;
        }

        .green {

            box-shadow: 1px 1px 3px green;

        }
    </style>

    <script>


        $('.circle').click(function(){

            var parentDiv=$(this).parent('div');
            $('input[name=paytype]').attr('checked',false);
            parentDiv.find('input[name=paytype]').attr('checked',true);

        });

        function calculateTotalPrice() {

            var url = 'showcart4/calculatetotalprice';
            var code = $('#code').val();
            var data = {'code': code};
            $.post(url, data, function (msg) {
                console.log(msg);
                $('#totalprice').text(msg);
            })
        }

        calculateTotalPrice();

        function checkCode() {
            var code = $('#code').val();
            var url = 'showcart4/checkcode/' + code;
            var data = {};
            $.post(url, data, function (msg) {
                console.log(msg);

                if (msg[0] != 0) {
                    $('#code').addClass('green').removeClass('red');
                } else {
                    $('#code').addClass('red').removeClass('green');
                }
                $('#totalprice').text(msg[1]);

            }, 'json')
        }

        $('.selectlist').click(function () {
            var ulTag = $('ul', this);
            ulTag.slideToggle(200);
        });

        $('.selectlist ul li').click(function () {
            var txt = $(this).text();
            $('.selectlist .zamanattitle').text(txt);
        });


        $('.circle').click(function () {

            $('.circle').removeClass('active');
            $(this).addClass('active');
        })

    </script>

</form>














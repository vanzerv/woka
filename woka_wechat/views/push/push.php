<?php
use yii\helpers\Url;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
    <title>韵达快递-下单</title>
    <link href="css/style.css" rel="stylesheet" />
</head>
<body>
    <div class="push_top">
        <div class="push_top_line">
            <div class="left">
                <img src="/img/ji.png" />
            </div>
            <a href="<?php  echo Url::toRoute("push/address?type=1");?>">
                <?php
                if(empty($jiAddress))
                {?>

                <div class="left_middle">
                    添加寄件人信息
                </div>
                <div class="right">
                    >
                </div>

                <?php }else{ ?>

                <div class="left_middle">
                    <input type="hidden" name="jiaddress" value="<?=$jiAddress->address_id;?>" />
                    <div class="name"><?php echo $jiAddress->name; ?></div>
                    <div class="address"><?php echo $jiAddress->address.'    '.$jiAddress->addressInfo; ?></div>
                </div>
                <div class="right">
                    >
                </div>

                <?php  }                
                
                ?>
            </a>
        </div>
        <div class="push_top_line" style="border-bottom: 0px;">

            <div class="left">
                <img src="/img/shou.png" />
            </div>
            <a href="<?php  echo Url::toRoute("push/address?type=2");?>">
                <?php
                if(empty($shouAddress))
                {?>

                <div class="left_middle">
                    添加收件人信息
                </div>
                <div class="right">
                    >
                </div>

                <?php }else{ ?>

                <div class="left_middle">
                    <input type="hidden" name="shouaddress" value="<?=$shouAddress->address_id;?>" />
                    <div class="name"><?php echo $shouAddress->name; ?></div>
                    <div class="address"><?php echo $shouAddress->address.'    '.$shouAddress->addressInfo; ?></div>
                </div>
                <div class="right">
                    >
                </div>

                <?php  }                
                
                ?>
            </a>
        </div>
        <!--    <div class="push_top_line" style="border-bottom:0px;">
                <div class="left">
                    <img src="/img/shou.png" />
                </div>
                <div class="left_middle">
                    <div class="name" >yyangjian</div>
                    <div class="address" >shandongshenglinyishi</div>
                </div>
                <div class="right">
                    >
                </div>
            </div> -->
    </div>
    <div class="push_mddile">

        <div class="push_mddile_line">
            <div class="left">
                重量预估(KG)
            </div>
            <div class="right">
                <button>-</button>
                <input type="text" value="1" readonly="readonly" />
                <button>+</button>
            </div>
            <style>
                .push_mddile .push_mddile_line .right button {
                    display: inline-block;
                    margin: 0px;
                    background-color: #FFFFFF;
                    border: 1px solid #B0B0B0;
                    color: #B0B0B0;
                    width: 2rem;
                    padding: 0px;
                    height: 2rem;
                    line-height: 1.8rem;
                    text-align: center;
                    float: right;
                }

                .push_mddile .push_mddile_line .right input {
                    width: 50px;
                    margin: 0px;
                    height: 1.9rem;
                    color: #B0B0B0;
                    text-align: center;
                    line-height: 1.8rem;
                    border: 1px solid #B0B0B0;
                    border-left: 0px;
                    border-right: 0px;
                    float: right;
                }
            </style>
        </div>
        <div class="push_mddile_line">
            <div class="left">
                快件类型
            </div>
            <div class="right">
                <select name="type" style="color: #B0B0B0;">
                    <?php                      
                    foreach($invoices as $key=>$row)
                    {
                        if($key != 0)
                        {
                            
                    ?>
                    <option value="<?=$key?>"><?=$row?></option>
                    <?php }
                    }
                    
                    ?>

                </select>
            </div>

        </div>

    </div>

    <div class="push_bottom">
        <p>
            禁忌物品：危险品、液态品、有价证券、货币等、增值税发票信函和其他具有信函性质的物品。
        </p>
    </div>
    <div class="push_submit_div">
        <button type="submit">
            提交
        </button>
        <p>提交即同意<a href="#">《韵达快递合约条款》</a></p>
    </div>

    <style>
        .push_submit_div {
            margin-top: 1rem;
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

            .push_submit_div button {
                background-color: #FF9C12;
                color: #F2F2F2;
                width: 100%;
                text-align: center;
                line-height: 3rem;
                font-size: 1.4rem;
                font-weight: 600;
                border: 0px;
                border-radius: 0.3rem;
            }

            .push_submit_div p {
                width: 100%;
                text-align: center;
                margin-top: 7px;
                color: #BABABA;
            }

                .push_submit_div p a {
                    color: #FF9C12;
                }

        .push_bottom p {
            width: auto;
            padding-top: 0.5rem;
            padding-left: 0.5rem;
            padding-right: 0.5rem;
            color: #BABABA;
            font-size: 0.8rem;
        }
    </style>


    <style>
        .push_mddile {
            background-color: #ffffff;
            padding: 0.7rem;
            padding-bottom: 0rem;
            padding-top: 0rem;
            border-top: 1px solid #F2F2F2;
            border-bottom: 1px solid #F2F2F2;
        }

            .push_mddile .push_mddile_line {
                overflow: hidden;
                width: 100%;
                height: 2rem;
                padding-top: 1rem;
                padding-bottom: 1rem;
                border-bottom: 1px solid #F2F2F2;
            }

                .push_mddile .push_mddile_line .left {
                    color: #B0B0B0;
                    line-height: 2rem;
                    font-size: 1.4rem;
                    display: inline-block;
                    float: left;
                    text-align: left;
                }

                .push_mddile .push_mddile_line .right {
                    color: #B0B0B0;
                    line-height: 2rem;
                    font-size: 1.4rem;
                    display: inline-block;
                    float: right;
                    text-align: right;
                }
    </style>


    <style>
        .push_top {
            background-color: #ffffff;
            padding: 0.7rem;
            padding-bottom: 0rem;
            padding-top: 0rem;
        }

            .push_top .push_top_line {
                overflow: hidden;
                width: 100%;
                height: 3rem;
                padding-top: 1rem;
                padding-bottom: 1rem;
                border-bottom: 1px solid #F2F2F2;
            }

                .push_top .push_top_line .left {
                    height: 100%;
                    width: 4rem;
                    display: inline-block;
                    text-align: center;
                    float: left;
                }

                    .push_top .push_top_line .left img {
                        height: 100%;
                        width: auto;
                    }

                .push_top .push_top_line .left_middle {
                    color: #B0B0B0;
                    height: 100%;
                    width: auto;
                    display: inline-block;
                    line-height: 3rem;
                    font-size: 1.2rem;
                }

                .push_top .push_top_line .right {
                    color: #B0B0B0;
                    height: 100%;
                    width: auto;
                    display: inline-block;
                    float: right;
                    line-height: 3rem;
                }

                .push_top .push_top_line .name {
                    height: auto;
                    font-size: 1rem;
                    line-height: 1rem;
                    margin-bottom: 1rem;
                }

                .push_top .push_top_line .address {
                    white-space: nowrap;
                    height: auto;
                    font-size: 1rem;
                    line-height: 1rem;
                }
    </style>

</body>
</html>

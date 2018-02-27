<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>订单详情</title>
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/dingdanxiangqing.css">
    <script src="/kuaidian/Public/merch/js/jquery-1.12.4.min.js"></script>
</head>
<body style="font-size: 12px;">
    <div class="header">
        <div class="head">
            <div class="zuo">
                <input type="text" placeholder="订单号/手机号">
            </div>

            <div class="you">
                <button>检索</button>
            </div>
        </div>
    </div>

    <div class="tabPanel">
        <ul class="ul">
            <li class="hit">新订单</li>
            <li>进行中</li>
            <li>已完成</li>
            <li>取消单</li>
            <li>未使用</li>
        </ul>
        <div class="panes">
           <div class="bao">
               <div class="pane" style="display:block;">
                  <div class="xin">
                      <span>新订单&nbsp;<?php echo ($count); ?>&nbsp;单,总额&nbsp;<?php echo ($total_price); ?>&nbsp;元</span>
                  </div>
                  <?php if(is_array($order_info)): foreach($order_info as $key=>$info): ?><div class="he">
                         <div class="top">
                             <div class="jiu">
                                 <div class="can">
                                     <span>就餐号</span>
                                 </div>

                                 <div class="hh">
                                     <span><?php echo ($info["jch"]); ?></span>
                                 </div>
                             </div>

                             <div class="hao">
                                 <span>订单号:<?php echo ($info["order_code"]); ?></span>
                             </div>
                         </div>

                         <div class="name">
                             <div class="sex">
                                 <span><?php echo ($info["buyer_name"]); ?></span>
                             </div>

                             <div class="tel">
                                 <span>13800000000</span>
                             </div>

                             <div class="tu">
                                 <div class="ttu">
                                     <a href="tel:13716172720">
                                         <img src="/kuaidian/Public/merch/images/phone.png" alt="">
                                     </a>
                                 </div>
                             </div>

                             <div class="zw">
                                 <div class="wei">
                                     <span>座位</span>
                                 </div>

                                 <div class="hha">
                                     <span><?php echo ($info["zhuo_hao"]); ?></span>
                                 </div>
                             </div>
                         </div>

                         <div class="navMenubox">
                             <div id="slimtest">
                                 <ul class="navMenu">
                                     <li>
                                         <a href="javascript:;" class="afinve">
                                             <div class="pp2">
                                                 <div class="zz2">
                                                     <span>商品</span>
                                                 </div>

                                                 <div class="ycc">
                                                     <span></span>
                                                 </div>

                                                 <div class="yy2">
                                                     <span onclick="javascript:this.innerHTML=(this.innerHTML=='展开'?'收起':'展开');">展开</span>
                                                 </div>
                                             </div>
                                         </a>
                                         <ul class="sub-menu">
                                            <?php if(is_array($info["goods_info"])): foreach($info["goods_info"] as $key=>$goods_info): ?><li>
                                                  <a href="javascript:;">
                                                      <div class="hee">
                                                          <div class="cai">
                                                               <span><?php echo ($goods_info["goods_name"]); ?></span>
                                                          </div>

                                                          <div class="ll">
                                                               <span>X<?php echo ($goods_info["goods_num"]); ?></span>
                                                          </div>

                                                          <div class="qian2">
                                                               <span><?php echo ($goods_info["goods_price"]); ?></span>
                                                          </div>
                                                      </div>
                                                  </a>
                                              </li><?php endforeach; endif; ?>
                                               <li>
                                                  <a href="javascript:;">
                                                      <div class="hee">
                                                          <div class="cai">
                                                               <span>餐具</span>
                                                          </div>

                                                          <div class="ll">
                                                               <span>X<?php echo ($info["seat"]); ?></span>
                                                          </div>

                                                          <div class="qian2">
                                                               <span><?php echo ($info["repast_price"]); ?></span>
                                                          </div>
                                                      </div>
                                                  </a>
                                              </li>
                                         </ul>
                                     </li>
                                 </ul>
                             </div>
                         </div>

                         <div class="xiao">
                             <div class="ji">
                                 <span>小计</span>
                             </div>

                             <div class="qqian">
                                 <span>￥<?php echo ($info["total_price"]); ?></span>
                             </div>
                         </div>

                         <div class="fen">
                             <div class="ttop">
                                 <div class="fen2">
                                     <span>分享随机立减</span>
                                 </div>

                                 <div class="jj">
                                     <span>-￥<span><?php echo ($info["lj"]); ?></span></span>
                                 </div>
                             </div>

                             <div class="ttop">
                                 <div class="fen2">
                                     <span>推广佣金</span>
                                 </div>

                                 <div class="jj">
                                     <span>-￥0.00</span>
                                 </div>
                             </div>
                         </div>

                         <div class="ben">
                             <div class="dan">
                                 <span>本单预计收入</span>
                             </div>

                             <div class="zai">
                                 <span>(在线支付)</span>
                             </div>

                             <div class="kk">
                                 <span>￥&nbsp;<?php echo ($info["sf"]); ?></span>
                             </div>
                         </div>


                         <div class="ttui">
                             <div class="td">
                                 <span></span>
                             </div>
                         </div>

                         <div class="bz">
                             <div class="bb">
                                 <span>备注：</span>
                             </div>

                             <div class="int">
                                 <span><?php echo ($info["order_remark"]); ?></span>
                             </div>
                         </div>


                         <div class="xd">
                             <div class="dd">
                                 <span>下单:<?php echo ($info["use_time"]); ?></span>
                             </div>

                             <div class="q">
                                 <div class="qx" id="<?php echo ($info["id"]); ?>" >
                                     <button >取消订单</button>
                                 </div>
                             </div>

                             <div class="ren">
                                 <div class="qr" onclick="qrd(<?php echo ($info["id"]); ?>)">
                                     <span>确认</span>
                                 </div>
                             </div>
                         </div>

                    </div><?php endforeach; endif; ?>
                  <!-- <div class="kong" style="width: 100%;height: 144px;"></div> -->
               </div>
           </div>

            <div class="pane">
               <div class="bao">
              <!--      <div class="xin">
                       <span>新订单&nbsp;5&nbsp;单,总额&nbsp;1810.1&nbsp;元</span>
                   </div> -->
                <?php if(is_array($jx_info)): foreach($jx_info as $key=>$jx_one): ?><div class="he">
                       <div class="top">
                           <div class="jiu">
                               <div class="can">
                                   <span>就餐号</span>
                               </div>

                               <div class="hh">
                                   <span><?php echo ($jx_one["jch"]); ?></span>
                               </div>
                           </div>

                           <div class="hao">
                               <span>订单号:<?php echo ($jx_one["order_code"]); ?></span>
                           </div>
                       </div>

                       <div class="name">
                           <div class="sex">
                               <span><?php echo ($jx_one["buyer_name"]); ?></span>
                           </div>

                           <div class="tel">
                               <span>13800000000</span>
                           </div>

                           <div class="tu">
                               <div class="ttu">
                                   <a href="tel:13716172720">
                                       <img src="/kuaidian/Public/merch/images/phone.png" alt="">
                                   </a>
                               </div>
                           </div>

                           <div class="zw">
                               <div class="wei">
                                   <span>座位</span>
                               </div>

                               <div class="hha">
                                   <span><?php echo ($jx_one["zhuo_hao"]); ?></span>
                               </div>
                           </div>
                       </div>

                       <div class="navMenubox">
                           <div id="slimtest">
                               <ul class="navMenu">
                                   <li>
                                      <a href="javascript:;" class="afinve">
                                          <div class="pp2">
                                              <div class="zz2">
                                                  <span>商品</span>
                                              </div>

                                              <div class="ycc">
                                                  <!-- <img src="/kuaidian/Public/merch/images/tishi.png" alt=""> -->
                                                  <!-- <span>已分堂制作</span> -->
                                                  <span></span>
                                              </div>

                                              <div class="yy2">
                                                  <span onclick="javascript:this.innerHTML=(this.innerHTML=='展开'?'收起':'展开');">展开</span>
                                              </div>
                                            </div>
                                       </a>
                                       <ul class="sub-menu">
                                          <?php if(is_array($jx_one["goods_info"])): foreach($jx_one["goods_info"] as $key=>$jx_one_goods): ?><li>
                                               <a href="javascript:;">
                                                   <div class="hee">
                                                       <div class="cai2">
                                                           <span><?php echo ($jx_one_goods["goods_name"]); ?></span>
                                                       </div>

                                                       <div class="ywc">
                                                           <!-- <span>制作中</span> -->
                                                           <span></span>
                                                       </div>

                                                       <div class="ll2">
                                                           <span>X<?php echo ($jx_one_goods["goods_num"]); ?></span>
                                                       </div>

                                                       <div class="qian3">
                                                           <span><?php echo ($jx_one_goods["goods_price"]); ?></span>
                                                       </div>
                                                   </div>
                                               </a>
                                           </li><?php endforeach; endif; ?>  
                                         <li>
                                                  <a href="javascript:;">
                                                      <div class="hee">
                                                          <div class="cai">
                                                               <span>餐具</span>
                                                          </div>

                                                          <div class="ll">
                                                               <span>X<?php echo ($jx_one["seat"]); ?></span>
                                                          </div>

                                                          <div class="qian2">
                                                               <span><?php echo ($jx_one["repast_price"]); ?></span>
                                                          </div>
                                                      </div>
                                                  </a>
                                              </li>
                                       </ul>
                                   </li>
                               </ul>
                           </div>
                       </div>

                       <div class="xiao">
                           <div class="ji">
                               <span>小计</span>
                           </div>

                           <div class="qqian">
                               <span>￥<?php echo ($jx_one["total_price"]); ?></span>
                           </div>
                       </div>

                       <div class="fen">
                           <div class="ttop">
                               <div class="fen2">
                                   <span>分享随机立减</span>
                               </div>

                               <div class="jj">
                                   <span>-￥<?php echo ($jx_one["lj"]); ?></span>
                               </div>
                           </div>

                           <div class="ttop">
                               <div class="fen2">
                                   <span>推广佣金</span>
                               </div>

                               <div class="jj">
                                   <span>-￥0.00</span>
                               </div>
                           </div>
                       </div>

                       <div class="ben">
                           <div class="dan">
                               <span>本单预计收入</span>
                           </div>

                           <div class="zai">
                               <span>(在线支付)</span>
                           </div>

                           <div class="kk">
                               <span>￥<?php echo ($jx_one["sf"]); ?></span>
                           </div>
                       </div>

                       <div class="bz">
                           <div class="bb">
                               <span>备注：</span>
                           </div>

                           <div class="int">
                               <span><?php echo ($jx_one["order_remark"]); ?></span>
                           </div>
                       </div>

                       <div class="xd">
                           <div class="dd">
                               <span>下单<?php echo ($jx_one["use_time"]); ?></span>
                           </div>

                           <div class="q">
                               <div class="qx" id="<?php echo ($jx_one["id"]); ?>">
                                   <button>取消订单</button>
                               </div>
                           </div>

                           <div class="ren">
                               <div class="qr wc" id="<?php echo ($jx_one["id"]); ?>">
                                   <span>完成</span>
                               </div>
                           </div>
                       </div>

                   </div><?php endforeach; endif; ?>
               </div>
            </div>


            <div class="pane">
               <div class="bao">
                  <div class="xin">
                      <span>已完成<?php echo ($wc_count); ?>单,总额<?php echo ($wc_total_price); ?>元</span>
                  </div>
                <?php if(is_array($wc_order)): foreach($wc_order as $key=>$wc_one): ?><div class="he">
                      <div class="top">
                          <div class="jiu">
                              <div class="can">
                                  <span>就餐号</span>
                              </div>

                              <div class="hh">
                                  <span><?php echo ($wc_one["jch"]); ?></span>
                              </div>
                          </div>

                          <div class="hao">
                              <span>订单号:<?php echo ($wc_one["order_code"]); ?></span>
                          </div>
                      </div>

                      <div class="name">
                          <div class="sex">
                              <span><?php echo ($wc_one["buyer_name"]); ?></span>
                          </div>

                          <div class="tel">
                              <span>13800000000</span>
                          </div>

                          <div class="tu">
                              <div class="ttu">
                                  <a href="tel:13716172720">
                                      <img src="/kuaidian/Public/merch/images/phone.png" alt="">
                                  </a>
                              </div>
                          </div>

                          <div class="zw">
                              <div class="wei">
                                  <span>座位</span>
                              </div>

                              <div class="hha">
                                  <span><?php echo ($wc_one["zhuo_hao"]); ?></span>
                              </div>
                          </div>
                      </div>

                      <div class="navMenubox">
                          <div id="slimtest1">
                              <ul class="navMenu">
                                  <li>
                                      <a href="javascript:;" class="afinve">
                                          <div class="pp">
                                              <div class="zz2">
                                                  <span>商品</span>
                                              </div>

                                              <div class="ycc">
                                                  <img src="/kuaidian/Public/merch/images/tishi.png" alt="">
                                                  <span>已分堂制作</span>
                                              </div>

                                              <div class="yy2">
                                                  <span onclick="javascript:this.innerHTML=(this.innerHTML=='展开'?'收起':'展开');">展开</span>
                                              </div>
                                          </div>
                                      </a>
                                      <ul class="sub-menu">
                                        <?php if(is_array($wc_one["goods_info"])): foreach($wc_one["goods_info"] as $key=>$wc_goods): ?><li>
                                              <a href="javascript:;">
                                                  <div class="hee">
                                                      <div class="cai2">
                                                          <span><?php echo ($wc_goods["goods_name"]); ?></span>
                                                      </div>

                                                      <div class="ywc">
                                                          <span>已完成</span>
                                                      </div>

                                                      <div class="ll2">
                                                          <span>X<?php echo ($wc_goods["goods_num"]); ?></span>
                                                      </div>

                                                      <div class="qian3">
                                                          <span><?php echo ($wc_goods["goods_price"]); ?></span>
                                                      </div>
                                                  </div>
                                              </a>
                                          </li><?php endforeach; endif; ?> 
                                          <li>
                                              <a href="javascript:;">
                                                  <div class="hee">
                                                      <div class="cai">
                                                           <span>餐具</span>
                                                      </div>

                                                      <div class="ll">
                                                           <span>X<?php echo ($wc_one["seat"]); ?></span>
                                                      </div>

                                                      <div class="qian2">
                                                           <span><?php echo ($wc_one["repast_price"]); ?></span>
                                                      </div>
                                                  </div>
                                              </a>
                                          </li>
                                      </ul>
                                  </li>
                              </ul>
                          </div>
                      </div>

                      <div class="xiao">
                          <div class="ji">
                              <span>小计</span>
                          </div>

                          <div class="qqian">
                              <span>￥<?php echo ($wc_one["total_price"]); ?></span>
                          </div>
                      </div>

                      <div class="fen">
                          <div class="ttop">
                              <div class="fen2">
                                  <span>分享随机立减</span>
                              </div>

                              <div class="jj">
                                  <span>-￥<?php echo ($wc_one["lj"]); ?></span>
                              </div>
                          </div>

                          <div class="ttop">
                              <div class="fen2">
                                  <span>推广佣金</span>
                              </div>

                              <div class="jj">
                                  <span>-￥0.00</span>
                              </div>
                          </div>
                      </div>

                      <div class="ben">
                          <div class="dan">
                              <span>本单预计收入</span>
                          </div>

                          <div class="zai">
                              <span>(在线支付)</span>
                          </div>

                          <div class="kk">
                              <span>￥<?php echo ($wc_one["sf"]); ?></span>
                          </div>
                      </div>

                      <div class="bz">
                          <div class="bb">
                              <span>备注：</span>
                          </div>

                          <div class="int">
                              <span><?php echo ($wc_one["order_remark"]); ?></span>
                          </div>
                      </div>

                      <div class="xd">
                          <div class="dd">
                              <span>下单:<?php echo ($wc_one["use_time"]); ?></span>
                          </div>

                          <div class="yy">
                              <img src="/kuaidian/Public/merch/images/yiwancheng.png" alt="">
                          </div>

                      </div>

                  </div><?php endforeach; endif; ?>
                  <!-- <div class="kong" style="width: 100%;height: 144px;"></div> -->
               </div>
            </div>

            <div class="pane">
                <div class="bao">
                    <div class="xin">
                        <span>已取消<?php echo ($qx_count); ?>单,总额<?php echo ($qx_total_price); ?>元</span>
                    </div>
                  <?php if(is_array($qx_info)): foreach($qx_info as $key=>$qx_one): ?><div class="he">
                        <div class="top">
                            <div class="jiu">
                                <div class="can">
                                    <span>就餐号</span>
                                </div>

                                <div class="hh">
                                    <span><?php echo ($qx_one["jch"]); ?></span>
                                </div>
                            </div>

                            <div class="hao">
                                <span>订单号:<?php echo ($qx_one["order_code"]); ?></span>
                            </div>
                        </div>

                        <div class="name">
                            <div class="sex">
                                <span><?php echo ($qx_one["buyer_name"]); ?></span>
                            </div>

                            <div class="tel">
                                <span>13800000000</span>
                            </div>

                            <div class="tu">
                                <div class="ttu">
                                    <a href="tel:13716172720">
                                        <img src="/kuaidian/Public/merch/images/phone.png" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="zw">
                                <div class="wei">
                                    <span>座位</span>
                                </div>

                                <div class="hha">
                                    <span><?php echo ($qx_one["zhuo_hao"]); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="navMenubox">
                            <div id="slimtest1">
                                <ul class="navMenu">
                                    <li>
                                        <a href="javascript:;" class="afinve">
                                            <div class="pp">
                                                <div class="zz2">
                                                    <span>商品</span>
                                                </div>

                                                <div class="ycc">
                                                    <img src="/kuaidian/Public/merch/images/tishi.png" alt="">
                                                    <span>已分堂制作</span>
                                                </div>

                                                <div class="yy2">
                                                    <span onclick="javascript:this.innerHTML=(this.innerHTML=='展开'?'收起':'展开');">展开</span>
                                                </div>
                                            </div>
                                        </a>
                                        <ul class="sub-menu">
                                          <?php if(is_array($qx_one["goods_info"])): foreach($qx_one["goods_info"] as $key=>$qx_goods): ?><li>
                                                <a href="javascript:;">
                                                    <div class="hee">
                                                        <div class="cai2">
                                                            <span><?php echo ($qx_goods["goods_name"]); ?></span>
                                                        </div>

                                                        <div class="ywc">
                                                            <span>已取消</span>
                                                        </div>

                                                        <div class="ll2">
                                                            <span>X<?php echo ($qx_goods["goods_num"]); ?></span>
                                                        </div>

                                                        <div class="qian3">
                                                            <span><?php echo ($qx_goods["goods_price"]); ?></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><?php endforeach; endif; ?>  
                                          <li>
                                              <a href="javascript:;">
                                                  <div class="hee">
                                                      <div class="cai">
                                                           <span>餐具</span>
                                                      </div>

                                                      <div class="ll">
                                                           <span>X<?php echo ($qx_one["seat"]); ?></span>
                                                      </div>

                                                      <div class="qian2">
                                                           <span><?php echo ($qx_one["repast_price"]); ?></span>
                                                      </div>
                                                  </div>
                                              </a>
                                          </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="xiao">
                            <div class="ji">
                                <span>小计</span>
                            </div>

                            <div class="qqian">
                                <span>￥<?php echo ($qx_one["total_price"]); ?></span>
                            </div>
                        </div>

                        <div class="fen">
                            <div class="ttop">
                                <div class="fen2">
                                    <span>分享随机立减</span>
                                </div>

                                <div class="jj">
                                    <span>-￥<?php echo ($qx_one["lj"]); ?></span>
                                </div>
                            </div>

                            <div class="ttop">
                                <div class="fen2">
                                    <span>推广佣金</span>
                                </div>

                                <div class="jj">
                                    <span>-￥0.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="ben">
                            <div class="dan">
                                <span>本单预计收入</span>
                            </div>

                            <div class="zai">
                                <span>(在线支付)</span>
                            </div>

                            <div class="kk">
                                <span>￥<?php echo ($qx_one["sf"]); ?></span>
                            </div>
                        </div>

                        <div class="bz">
                            <div class="bb">
                                <span>备注：</span>
                            </div>

                            <div class="int">
                                <span><?php echo ($qx_one["order_remark"]); ?></span>
                            </div>
                        </div>

                        <div class="xd">
                            <div class="dd">
                                <span>下单:<?php echo ($qx_one["use_time"]); ?></span>
                            </div>

                            <div class="yy">
                                <img src="/kuaidian/Public/merch/images/tuidan.png" alt="">
                            </div>

                        </div>

                    </div><?php endforeach; endif; ?>
                    <div class="kong" style="width: 100%;height: 144px;"></div>
                </div>
            </div>

            <div class="pane">
                <div class="bao">
                    <div class="xin">
                        <span>未使用<?php echo ($no_count); ?>单,总额<?php echo ($no_total_price); ?>元</span>
                    </div>
                  <?php if(is_array($no_info)): foreach($no_info as $key=>$no_one): ?><div class="he">
                        <div class="top">
                            <div class="jiu">
                                <div class="can">
                                    <span>就餐号</span>
                                </div>

                                <div class="hh">
                                    <span><?php echo ($no_one["jch"]); ?></span>
                                </div>
                            </div>

                            <div class="hao">
                                <span>订单号:<?php echo ($no_one["order_code"]); ?></span>
                            </div>
                        </div>

                        <div class="name">
                            <div class="sex">
                                <span><?php echo ($no_one["buyer_name"]); ?></span>
                            </div>

                            <div class="tel">
                                <span>13800000000</span>
                            </div>

                            <div class="tu">
                                <div class="ttu">
                                    <a href="tel:13716172720">
                                        <img src="/kuaidian/Public/merch/images/phone.png" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="zw">
                                <div class="wei">
                                    <span>座位</span>
                                </div>

                                <div class="hha">
                                    <span><?php echo ($no_one["zhuo_hao"]); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="navMenubox">
                            <div id="slimtest">
                                <ul class="navMenu">
                                    <li>
                                        <a href="javascript:;" class="afinve">
                                            <div class="pp2">
                                                <div class="zz2">
                                                    <span>商品</span>
                                                </div>

                                                <div class="ycc">
                                                    <span></span>
                                                </div>

                                                <div class="yy2">
                                                    <span onclick="javascript:this.innerHTML=(this.innerHTML=='展开'?'收起':'展开');">展开</span>
                                                </div>
                                            </div>
                                        </a>
                                        <ul class="sub-menu">
                                          <?php if(is_array($no_one["goods_info"])): foreach($no_one["goods_info"] as $key=>$no_goods): ?><li>
                                                <a href="javascript:;">
                                                    <div class="hee">
                                                        <div class="cai">
                                                            <span><?php echo ($no_goods["goods_name"]); ?></span>
                                                        </div>

                                                        <div class="ll">
                                                            <span>X<?php echo ($no_goods["goods_num"]); ?></span>
                                                        </div>

                                                        <div class="qian2">
                                                            <span><?php echo ($no_goods["goods_price"]); ?></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><?php endforeach; endif; ?>  

                                          <li>
                                              <a href="javascript:;">
                                                  <div class="hee">
                                                      <div class="cai">
                                                           <span>餐具</span>
                                                      </div>

                                                      <div class="ll">
                                                           <span>X<?php echo ($no_one["seat"]); ?></span>
                                                      </div>

                                                      <div class="qian2">
                                                           <span><?php echo ($no_one["repast_price"]); ?></span>
                                                      </div>
                                                  </div>
                                              </a>
                                          </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="xiao">
                            <div class="ji">
                                <span>小计</span>
                            </div>

                            <div class="qqian">
                                <span>￥<?php echo ($no_one["total_price"]); ?></span>
                            </div>
                        </div>

                        <div class="fen">
                            <div class="ttop">
                                <div class="fen2">
                                    <span>分享随机立减</span>
                                </div>

                                <div class="jj">
                                    <span>-￥<?php echo ($no_one["lj"]); ?></span>
                                </div>
                            </div>

                            <div class="ttop">
                                <div class="fen2">
                                    <span>推广佣金</span>
                                </div>

                                <div class="jj">
                                    <span>-￥0.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="ben">
                            <div class="dan">
                                <span>本单预计收入</span>
                            </div>

                            <div class="zai">
                                <span>(在线支付)</span>
                            </div>

                            <div class="kk">
                                <span>￥<?php echo ($no_one["sf"]); ?></span>
                            </div>
                        </div>

                        <div class="bz">
                            <div class="bb">
                                <span>备注：</span>
                            </div>

                            <div class="int">
                                <span><?php echo ($no_one["order_remark"]); ?></span>
                            </div>
                        </div>


                        <div class="xd">
                            <div class="dd">
                                <span>支付:<?php echo ($no_one["pay_time"]); ?></span>
                            </div>

                            <div class="q">
                                <div class="qx" id="<?php echo ($no_one["id"]); ?>">
                                    <button>取消订单</button>
                                </div>
                            </div>

                            <div class="ren">
                                <div class="qr">
                                    <span>未使用</span>
                                </div>
                            </div>
                        </div>

                    </div><?php endforeach; endif; ?>
                    <div class="kong" style="width: 100%;height: 144px;"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer">
        <div class="foot" >
        <audio id="mp3" src="/kuaidian/Public/aut/8868.wav"> </audio>
        <input type="hidden" id="store_id" name="store_id" value="<?php echo ($store_id); ?>">
            <div class="ftu">
                <img src="/kuaidian/Public/merch/images/dingdan2.png" alt="">
            </div>
            <div class="quan">
                <div class="nm">
                    <span class="remind">0</span>
                </div>
            </div>
            <div class="de">
                <span>门店订单</span>
            </div>
        </div>


        <div class="foot2" onclick="location.href='index.html'">
            <div class="ftu2">
                <img src="/kuaidian/Public/merch/images/dian2.png" alt="">
            </div>
            <div class="de2">
                <span>我的门店</span>
            </div>
        </div>
    </div>

</body>
<!--tab栏-->
<script type="text/javascript">
    $(function(){
        $('.tabPanel .ul li').click(function(){
            $(this).addClass('hit').siblings().removeClass('hit ');
            $('.panes>div:eq('+$(this).index()+')').show().siblings().hide();
        })
    })
</script>


<script src="/kuaidian/Public/merch/js/jquery-1.12.4.min.js"></script>
<script src="/kuaidian/Public/merch/js/jquery-1.12.4.js"></script>
<script src="/kuaidian/Public/merch/js/jquery.slimscroll.min.js"></script>
<script type="text/javascript">
    $(function(){
        // nav收缩展开
        $('.navMenu li a').on('click',function(){
            var parent = $(this).parent().parent();//获取当前页签的父级的父级
            var labeul =$(this).parent("li").find(">ul")
            if ($(this).parent().hasClass('open') == false) {
                //展开未展开
                parent.find('ul').slideUp(300);
                parent.find("li").removeClass("open")
                parent.find('li a').removeClass("active").find(".arrow").removeClass("open")
                $(this).parent("li").addClass("open").find(labeul).slideDown(300);
                $(this).addClass("active").find(".arrow").addClass("open")
            }else{
                $(this).parent("li").removeClass("open").find(labeul).slideUp(300);
                if($(this).parent().find("ul").length>0){
                    $(this).removeClass("active").find(".arrow").removeClass("open")
                }else{
                    $(this).addClass("active")
                }
            }

        });
    });
</script>
<script>  
 

  $('.qx').click(function(){
    var hit = $('.hit');
    // console.log(a);
    // return false;
    var order_id = $(this).attr('id');
    var conf = confirm("您确定要取消吗?取消后购买金额将转入您的余额");
    var par = $(this).parents('.he');
    if(conf){
      $.ajax({
        type:'POST',
        dataType: 'json',
        url:'<?php echo U("Merch/Order/qx_order");?>',
        data:{order_id:order_id},
        success: function (result) {
            if(result.code == 200){
                par.hide();
                // location.reload();
                // hit.trigger('click');
                // console.log(hit.text());
                // return false;
            }else{
                alert(result.msg);
            }
        }
      })
      return false;
    }else{
      return false;
    }

  })

  $('.wc').click(function(){
    var wc_order_id = $(this).attr('id');
    var wc_par = $(this).parents('.he');
        $.ajax({
          type:'POST',
          dataType: 'json',
          url:'<?php echo U("Merch/Order/wc_order");?>',
          data:{order_id:wc_order_id},
          success: function (result) {
              if(result.code == 200){
                  wc_par.hide();
              }else{
                  alert(result.msg);
              }
          }
        })

  })
  function qrd(order_id){
    $.ajax({
      type:'POST',
      dataType: 'json',
      url:'<?php echo U("Merch/Order/qr_order");?>',
      data:{order_id:order_id},
      success: function (result) {
          if(result.code == 200){
              window.location.reload();
          }else{
              alert(result.msg);
          }
      }
    })  
  }
</script>

<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
        // var remind = 0;
        var mp3 = $("#mp3")[0];
        // var play= 0;
        var store_id = $('#store_id').val();
        // alert(store_id);
        $('.nm').hide();
        // alert(store_id);
       
        // if(sessionStorage.num){
        //     $(".remind").text(sessionStorage.num);
        // }

        // $.ajax({
        //     type:'post',
        //     url:"<?php echo U('Merch/Order/sendOrderNotice');?>",
        //     dataType: 'json',
        //     data:{store_id:store_id},
        //     success:function (data) {
        //         sessionStorage.num = data;
        //         $(".remind").text(data);
        //         remind = data;play=data;
        //         remind<=0?$(".remind").hide():$(".remind").show();

        //     }
        // })


        setInterval(function () {
            $.ajax({
                type:'post',
                url:"<?php echo U('Merch/Order/sendOrderNotice');?>",
                dataType: 'json',
                data:{store_id:store_id},              
                success:function (data) {
                    if(data > 0){
                      // alert(data);
                        $('.nm').show();
                        $('.remind').text(data);
                        mp3.play();
                        // play=remind;                      
                    }else{
                        $('.nm').hide();

                    }
                    // remind = data;
                    // sessionStorage.num = data;
                    // if(play==remind){
                    //     remind<=0?$(".nm").hide():$(".nm").show()
                    // }else{
                    //     $(".nm").show();
                    //     $('.remind').text(remind);
                    //     mp3.play();
                    //     play=remind;
                    // } 

                }
            })
        },10000)      

    </script>
    <script type="text/javascript">
      $('.foot').click(function(){
        window.location.reload();
      })
    </script>

</html>
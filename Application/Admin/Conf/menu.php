<?php
/**
 * Created by PhpStorm.
 * User: Miracle7Kill
 * Date: 2017/3/6
 * Time: 9:46
 * 后台自定义菜单
 * @return  name 菜单名称
 * @return route 路径
 * @return parent 关联
 * @return level 级别
 * @return icon 图标
 */
return [
//    '1' => ['name' => '控制面板', 'route' => 'Admin/Index/index', 'parent' => 0, 'level' => 1, 'icon' =>
//        'Hui-iconfont-home'],
    // '2' => ['name' => '医疗机构管理', 'route' => '', 'parent' => 0, 'level' => 1, 'icon' =>
    //     'Hui-iconfont-gongsi'],
    //     '200' => ['name' => '医疗机构列表', 'route' => 'Admin/About/index', 'parent' => '2', 'level' => 2,
    //         'icon' => ''],
    // '3' => ['name' => '用户管理', 'route' => '', 'parent' => 0, 'level' => 1, 'icon' => 'Hui-iconfont-user'],
    //     '300' => ['name' => '用户列表', 'route' => 'Admin/User/index', 'parent' => 3, 'level' => 2, 'icon' => ''],
    // '4' => ['name' => '后台管理', 'route' => '', 'parent' => 0, 'level' => 1, 'icon' => 'Hui-iconfont-user-group'],
    //     '400' => ['name' => '管理员列表' ,'route' => 'Admin/Members/index', 'parent' => 4, 'level' => 2,
    //         'icon' => ''],
    //     '401' => ['name' => '角色管理' ,'route' => 'Admin/AuthGroup/index', 'parent' => 4, 'level' => 2, 'icon' => ''],
//        '402' => ['name' => '权限管理' ,'route' => 'Admin/AuthRole/index', 'parent' => 4, 'level' => 2, 'icon' => ''],
//    '5' =>  ['name' => '参数设置' ,'route' => '', 'parent' => 0, 'level' => 1, 'icon' => 'Hui-iconfont-canshu'],
       // '500' => ['name' => '参数设置' ,'route' => '', 'parent' => 5, 'level' => 2, 'icon' => ''],
   '6' => ['name' => '主页' ,'route' => 'Admin/Index/yinczhuye', 'parent' => 0, 'level' => 1, 'icon' => 'Hui-iconfont-list'],
       '600' => ['name' => '主页' ,'route' => 'Admin/Index/yinczhuye', 'parent' => 6, 'level' => 2, 'icon' => ''],
    '7' => ['name' => '门店管理' ,'route' => '', 'parent' => 0, 'level' => 1, 'icon' => 'Hui-iconfont-system'],

        '701' => ['name' => '门店列表' ,'route' => 'Admin/Shop/index', 'parent' => 7, 'level' => 2, 'icon' => ''],

        '702' => ['name' => '门店类别' ,'route' => 'Admin/Shoptype/index', 'parent' => 7, 'level' => 2, 'icon' => ''],
        // '702' => ['name' => '药品/项目单位字典' ,'route' => 'Admin/Yaopinxm/index', 'parent' => 7, 'level' => 2, 'icon' => ''],
        // '703' => ['name' => '医嘱字典' ,'route' => 'Admin/Yizhu/index', 'parent' => 7, 'level' => 2, 'icon' => ''],

        // '704' => ['name' => '生产厂商字典' ,'route' => '', 'parent' => 7, 'level' => 2, 'icon' => ''],
        // '705' => ['name' => '收费项目字典' ,'route' => 'Admin/Shoufei/index', 'parent' => 7, 'level' => 2, 'icon' => ''],
        // '706' => ['name' => '西成药字典' ,'route' => 'Admin/Xiyao/index', 'parent' => 7, 'level' => 2, 'icon' => ''],
        // '707' => ['name' => '用法字典' ,'route' => 'Admin/Yongfa/index', 'parent' => 7, 'level' => 2, 'icon' => ''],
        // '708' => ['name' => '中药字典' ,'route' => 'Admin/China/index', 'parent' => 7, 'level' => 2, 'icon' => ''],
        // '709' => ['name' => '给药途径字典' ,'route' => 'Admin/Tujing/index', 'parent' => 7, 'level' => 2, 'icon' => ''],
        // '710' => ['name' => '频率字典' ,'route' => 'Admin/Pinlv/index', 'parent' => 7, 'level' => 2, 'icon' => ''],
        // '711' => ['name' => '性味归经' ,'route' => 'Admin/XingWeigj/index', 'parent' => 7, 'level' => 2, 'icon' => ''],
    // '8' => ['name' => '配伍禁忌维护' ,'route' => '', 'parent' => 0, 'level' => 1, 'icon' => ''],
    //     '800' => ['name' => '十八反' ,'route' => 'Admin/TabooShiba/index', 'parent' => 8, 'level' => 2, 'icon' => ''],
    //     '801' => ['name' => '十九畏' ,'route' => 'Admin/TabooShijiu/index', 'parent' => 8, 'level' => 2, 'icon' => ''],
    //     '802' => ['name' => '孕妇禁忌' ,'route' => 'Admin/TabooYunfu/index', 'parent' => 8, 'level' => 2, 'icon' => ''],
    //     '803' => ['name' => '药量禁忌' ,'route' => 'Admin/TabooYaoliang/index', 'parent' => 8, 'level' => 2, 'icon' => ''],
    // '9' => ['name' => '药品对照' ,'route' => 'Admin/DuiZhao/index', 'parent' => 0, 'level' => 1, 'icon' => ''],
    //     '900' => ['name' => '药品对照' ,'route' => 'Admin/DuiZhao/index', 'parent' => 9, 'level' => 2, 'icon' => ''],
    //     '901' => ['name' => 'His表操作' ,'route' => 'Admin/DuiZhao/gohis', 'parent' => 9, 'level' => 2, 'icon' => ''],
    // '10' => ['name' => '疾病信息对照' ,'route' => '', 'parent' => 0, 'level' => 1, 'icon' => ''],
    //     '1000' => ['name' => '疾病信息对照' ,'route' => '', 'parent' => 10, 'level' => 2, 'icon' => ''],
    // '11' => ['name' => '用户登录信息' ,'route' => '', 'parent' => 0, 'level' => 1, 'icon' => ''],
    //     '1100' => ['name' => '用户登录信息' ,'route' => 'Admin/User/DLuser', 'parent' => 11, 'level' => 2, 'icon' => ''],

    // '12' => ['name' => '系统设置', 'route' => '', 'parent' => 0, 'level' => 1, 'icon' => ''],
    //     '1200' => ['name' => '接口配置', 'route' => 'Admin/Config/index', 'parent' => 12, 'level' => 2, 'icon' => ''],

    // '13' => ['name' => '第八处方维护', 'route' => '', 'parent' => 0, 'level' => 1, 'icon' => ''],
    //     '1300' => ['name' => '第八处方维护', 'route' => 'Admin/Dibakaif/index', 'parent' => 13, 'level' => 2, 'icon' => ''],

    // '14' => ['name' => '药库管理', 'route' => '', 'parent' => 0, 'level' => 1, 'icon' => ''],
    //     '1404' => ['name' => '药品价格', 'route' => 'Admin/CarryYanku/yaopinchangjia', 'parent' => 14, 'level' => 2, 'icon' => ''],
    //     '1401' => ['name' => '药品入库', 'route' => 'Admin/MediYaoku/add', 'parent' => 14, 'level' => 2, 'icon' => ''],

    //     '1402' => ['name' => '药品出库', 'route' => 'Admin/MediYaoku/out', 'parent' => 14, 'level' => 2, 'icon' => ''],
    //     '1403' => ['name' => '药房发药', 'route' => 'Admin/MediYaoku/Give', 'parent' => 14, 'level' => 2, 'icon' => ''],
    //     // '1407' => ['name' => '厂家维护', 'route' => 'Admin/Business/index', 'parent' => 14, 'level' => 2, 'icon' => ''],
    //     '1405' => ['name' => '药库退药', 'route' => 'Admin/ReturnDrug/index', 'parent' => 14, 'level' => 2, 'icon' => ''],
    //     '1406' => ['name' => '处方退药', 'route' => 'Admin/ReturnDrug/cfReturn', 'parent' => 14, 'level' => 2, 'icon' => ''],

    // '15' => ['name' => '药库盘点', 'route' => '', 'parent' => 0, 'level' => 1, 'icon' => ''],
    //     '1500' => ['name' => '药库盘点', 'route' => 'Admin/Check/index', 'parent' => 15, 'level' => 2, 'icon' => ''],
    //     '1501' => ['name' => '提取盘点信息', 'route' => 'Admin/Check/tiqu', 'parent' => 15, 'level' => 2, 'icon' => ''],
    //     '1502' => ['name' => '盘盈入库', 'route' => 'Admin/Check/ying', 'parent' => 15, 'level' => 2, 'icon' => ''],
    //     '1503' => ['name' => '盘亏出库', 'route' => 'Admin/Check/kui', 'parent' => 15, 'level' => 2, 'icon' => ''],
    //     '1504' => ['name' => '盘点对账', 'route' => 'Admin/Check/differ', 'parent' => 15, 'level' => 2, 'icon' => ''],
    // '16' => ['name' => '信息维护', 'route' => '', 'parent' => 0, 'level' => 1, 'icon' => ''],
    // '1601' => ['name' => '厂家维护', 'route' => 'Admin/Business/index', 'parent' => 16, 'level' => 2, 'icon' => ''],
    // '1602' => ['name' => '供货商维护', 'route' => 'Admin/Supplier/index', 'parent' => 16, 'level' => 2, 'icon' => ''],
    // '1603' => ['name' => '库存维护', 'route' => 'Admin/Amoutstock/index', 'parent' => 16, 'level' => 2, 'icon' => ''],
];
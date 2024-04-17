/**
 * 首页幻灯片
 */
{
    window.onload = function () {
        const options = {
            id: 'lb-1',              // 轮播盒ID
            speed: 600,              // 轮播速度(ms)
            delay: 3000,             // 轮播延迟(ms)
            direction: 'left',       // 图片滑动方向
            moniterKeyEvent: true,   // 是否监听键盘事件
            moniterTouchEvent: true  // 是否监听屏幕滑动事件
        }
        const lb = new Lb(options);
        lb.start();
    }
}

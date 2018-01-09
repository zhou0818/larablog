@extends('layouts.app')
@section('title', '首页')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card w-75">
            <div class="card-header" style="height: 2rem;">
                <div class="circle-red"></div>
                <div class="circle-yellow"></div>
                <div class="circle-green"></div>
            </div>
            <div class="card-body bg-dark" style="height: 20rem;font-size: 20px">
                <span class="text-light">$&nbsp;&nbsp;&nbsp;</span>
                <span class="text-light" id="typed"></span>
            </div>
        </div>
    </div>
    <div class="text-center mt-5">
        <h1><strong>Mr.Zhou</strong></h1>
    </div>
@stop
@section('ribbon')
    <canvas></canvas>
@stop
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/typed.min.js') }}"></script>
    <script>
        new Typed('#typed', {
            strings: ["一个高逼格的软件工程师！", "天天搬砖的码农！", "假装会写点代码而已。。。"], //输入内容, 支持html标签
            typeSpeed: 180, //打字速度
            backSpeed: 80,//回退速度
            startDelay: 1000//开始打字前的延时
        });
        document.addEventListener('touchmove', function (e) {
            e.preventDefault()
        })
        let c = document.getElementsByTagName('canvas')[0],
            x = c.getContext('2d'),
            pr = window.devicePixelRatio || 1,
            w = window.innerWidth,
            h = window.innerHeight,
            f = 90,
            q,
            m = Math,
            r = 0,
            u = m.PI * 2,
            v = m.cos,
            z = m.random
        c.width = w * pr
        c.height = h * pr
        x.scale(pr, pr);
        x.globalAlpha = 0.6

        function i() {
            x.clearRect(0, 0, w, h)
            q = [{x: 0, y: h * .7 + f}, {x: 0, y: h * .7 - f}]
            while (q[1].x < w + f) d(q[0], q[1])
        }

        function d(i, j) {
            x.beginPath()
            x.moveTo(i.x, i.y)
            x.lineTo(j.x, j.y)
            let k = j.x + (z() * 2 - 0.25) * f,
                n = y(j.y)
            x.lineTo(k, n)
            x.closePath()
            r -= u / -50
            x.fillStyle = '#' + (v(r) * 127 + 128 << 16 | v(r + u / 3) * 127 + 128 << 8 | v(r + u / 3 * 2) * 127 + 128).toString(16)
            x.fill()
            q[0] = q[1]
            q[1] = {x: k, y: n}
        }

        function y(p) {
            let t = p + (z() * 2 - 1.1) * f
            return (t > h || t < 0) ? y(p) : t
        }

        document.onclick = i
        document.ontouchstart = i
        i()
    </script>
@stop
<?php

class ShapeFactory {
    public function getShape($shape) {
        if ($shape == 'ellipse') {
            return new Ellipse();
        } elseif($shape == 'rectangle') {
            return new Rectangle();
        } elseif($shape == 'square') {
            return new Rectangle();
        }
    }
}

abstract class Shape {
    public abstract function draw();
}

class Ellipse extends Shape {
    public function draw() {
        //1、创建画布
        $im = imagecreatetruecolor(300,200);//新建一个真彩色图像，默认背景是黑色，返回图像标识符。另外还有一个函数 imagecreate 已经不推荐使用。
        $bgcolor=imagecolorallocate($im,0,0,0);      // 设置画布的背景颜色
        imagefill($im,0,0,$bgcolor);  //填充颜色到画布
        //2、绘制所需要的图像
        $red = imagecolorallocate($im,255,0,0);//创建一个颜色，以供使用

        imageellipse($im,30,30,40,40,$red);//画一个圆。参数说明：30，30为圆形的中心坐标；40，40为宽和高，不一样时为椭圆；$red为圆形的颜色（框颜色）
         //3、输出图像
        header("content-type: image/png");
        imagepng($im);//输出到页面。如果有第二个参数[,$filename],则表示保存图像
        //4、销毁图像，释放内存
        imagedestroy($im);
    }
}

class Rectangle extends Shape {
    public function draw() {
        //1、创建画布
        $im = imagecreatetruecolor(300,200);//新建一个真彩色图像，默认背景是黑色，返回图像标识符。另外还有一个函数 imagecreate 已经不推荐使用。
        $bgcolor=imagecolorallocate($im,0,0,0);      // 设置画布的背景颜色
        imagefill($im,0,0,$bgcolor);  //填充颜色到画布
        //2、绘制所需要的图像
        $red = imagecolorallocate($im,255,0,0);//创建一个颜色，以供使用

        imagerectangle($im,30,30,100,40,$red);
        //3、输出图像
        header("content-type: image/png");
        imagepng($im);//输出到页面。如果有第二个参数[,$filename],则表示保存图像
        //4、销毁图像，释放内存
        imagedestroy($im);
    }
}

class Square extends Shape {
    public function draw() {
        //1、创建画布
        $im = imagecreatetruecolor(300,200);//新建一个真彩色图像，默认背景是黑色，返回图像标识符。另外还有一个函数 imagecreate 已经不推荐使用。
        $bgcolor=imagecolorallocate($im,0,0,0);      // 设置画布的背景颜色
        imagefill($im,0,0,$bgcolor);  //填充颜色到画布
        //2、绘制所需要的图像
        $red = imagecolorallocate($im,255,0,0);//创建一个颜色，以供使用

        imagerectangle($im,30,30,40,40,$red);
        //3、输出图像
        header("content-type: image/png");
        imagepng($im);//输出到页面。如果有第二个参数[,$filename],则表示保存图像
        //4、销毁图像，释放内存
        imagedestroy($im);
    }
}

class Client {
    public static function main() {
        $shapeFactory = new ShapeFactory();
        $shape1 = $shapeFactory->getShape("ellipse");
        //调用 Ellipse 的 draw 方法
        //$shape1->draw();

        $shape2 = $shapeFactory->getShape("rectangle");
        //$shape2->draw();

        $shape3 = $shapeFactory->getShape("square");
        $shape3->draw();
    }
}

Client::main();

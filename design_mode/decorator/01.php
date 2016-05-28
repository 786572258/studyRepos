<meta charset="utf-8">
<?php 
/**
 * 装饰模式
 * 文章要经过小编添加摘要、seo人员优化、广告部添加广告
 * 处理顺序可以换
 *
 */

/**
 * 文章基础类
 */
class ArtBase {
	protected $content;
    protected $artObj;
	public function __construct($content) {
        $this->content = $content;
	}

    //装饰文章
    public function decorator() {
        return $this->content;
    }
}

/**
 * 小编文章类
 * 
 */
class BianArt extends ArtBase {
    public function __construct($artObj) {
        $this->artObj = $artObj;
        //$this->decorator();
    }

    public function decorator() {
        echo '进来了..';
        return $this->content = $this->artObj->decorator() . "加上了摘要.";
    }
}


/**
 * SEO文章类
 * 
 */
class SEOArt extends ArtBase {
   public function __construct($artObj) {
        $this->artObj = $artObj;
        //$this->decorator();
    }

    public function decorator() {
        return $this->content = $this->artObj->decorator() . "加上了seo.";
    }

}

/**
 * 广告文章类
 * 
 */
class ADArt extends ArtBase {
   public function __construct($artObj) {
        $this->artObj = $artObj;
        //$this->decorator();
    }

    public function decorator() {
        return $this->content = $this->artObj->decorator() . "加上了广告.";
    }

}

/*
$artContent = "好好学习天天向上";
$artBase = new ArtBase($artContent);

//让小编加个摘要

//$content = $artBase->decorator();
$bianArt = new BianArt($artContent);
$content = $bianArt->decorator();

//seo优化一下
$seoArt = new SEOArt($content);
echo $content = $seoArt->decorator();
*/

//装饰模式做法↓
$art = new ADArt(new SEOArt(new BianArt(new ArtBase('好好学习天天向上'))));
echo $art->decorator();
?>
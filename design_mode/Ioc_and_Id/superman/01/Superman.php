<?php
//严重依赖
class Superman
{
	protected $power;
	public function __construct()
	{
		$this->power = new Power(999, 100);
	}
}

class Power {
    /**
     * 能力值
     */
    protected $ability;

    /**
     * 能力范围或距离
     */
    protected $range;

    public function __construct($ability, $range)
    {
        $this->ability = $ability;
        $this->range = $range;
    }
}

$superman_1 = new Superman();
print_r($superman_1);

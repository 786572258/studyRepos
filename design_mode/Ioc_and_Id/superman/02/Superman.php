<?php
//要new好多...
class Superman
{
        protected $power;
        public function __construct()
        {
                //$this->power = new Power(999, 100);
                //$this->power = new Fight(9, 100);
                // $this->power = new Force(45);
                // $this->power = new Shot(99, 50, 2);
                
                $this->power = array(
                        new Force(45),
                        new Shot(99, 50, 2)
                );
                
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

class Flight
{
    protected $speed;
    protected $holdtime;
    public function __construct($speed, $holdtime)
    {
        $this->speed = $speed;
        $this->holdtime = $holdtime;
    }   
}

class Force
{
    protected $force;
    public function __construct($force)
    {
        $this->force = $force;
    }
}

class Shot
{
    protected $atk;
    protected $range;
    protected $limit;
    public function __construct($atk, $range, $limit)
    {
        $this->atk = $atk;
        $this->range = $range;
        $this->limit = $limit;
    }
}
$superman_1 = new Superman();
print_r($superman_1);


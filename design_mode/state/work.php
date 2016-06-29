<?php
header("Content-type: text/html; charset=utf-8");
/*
 * 状态模式：消除庞大的if else
 */
abstract class State {
   abstract public function writeProgram(Work $work);
}

class Work {
    //当前状态对象
    private $currentState;
    public $hour;
    public $taskFinished;
    public function __construct() {
        //默认是上午状态对象
        $this->setState(new ForenoonState());
    }

    public function writeProgram() {
        $this->currentState->writeProgram($this);
    }

    public function setState(State $state) {
        $this->currentState = $state;
    }
}

class ForenoonState extends State {
    public function writeProgram(Work $work) {
        if ($work->hour < 12) {
            echo "当前时间：{$work->hour}点，精神百倍";
        } else {
            $work->setState(new NoonState());
            $work->writeProgram();
        }
    }
}

class NoonState extends State {
    public function writeProgram(Work $work) {
        if ($work->hour < 13) {
            echo "当前时间：{$work->hour}点，饿了犯困午休";
        } else {
            $work->setState(new AfternoonState());
            $work->writeProgram();
        }
    }
}

class AfternoonState extends State {
    public function writeProgram(Work $work) {
        if ($work->hour < 17) {
            echo "当前时间：{$work->hour}点，下午状态还不错继续努力";
        } else {
            $work->setState(new EveningState());
            $work->writeProgram();
        }
    }
}

class EveningState extends State {
    public function writeProgram(Work $work) {
        if ($work->taskFinished == true) {
            $work->setState(new RestState());
            $work->writeProgram();
        } else {
            if ($work->hour < 21) {
                echo "当前时间：{$work->hour}点，加班，疲劳至极";
            } else {
                $work->setState(new SleepingState());
                $work->writeProgram();
            }
        }
    }
}

class RestState extends State {
    public function writeProgram(Work $work) {
        echo "当前时间：{$work->hour}点，下班休息";
    }
}

class SleepingState extends State {
    public function writeProgram(Work $work) {
        echo "当前时间：{$work->hour}点，不行了，睡觉";
    }
}
$emergencyProject = new Work();
//$emergencyProject->taskFinished = true;
$emergencyProject->hour = 20;
$emergencyProject->writeProgram();

?>
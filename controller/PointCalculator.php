<?php

class CalculatePoint
{
    public $level;
    public $data;

    public function __construct($level, $data)
    {
        $this->level = (int)$level;
        $this->data = $data;
    }

    private function level1($password)
    {
        if (strlen($password) == 0) return 1;
        $strength = 0;
        $length = strlen($password);
        if (strtolower($password) != $password) $strength += 1;
        if (strtoupper($password) != $password) $strength += 1;
        if ($length >= 6 && $length <= 10) $strength += 1;
        if ($length >= 10 && $length <= 16) $strength += 2;
        if ($length > 16) $strength += 3;
        preg_match_all('/[|!@#$%&*\/=?,;.:\-_+~^\\\]/', $password, $specialchars);
        $strength += sizeof($specialchars[0]) * 4;
        $chars = str_split($password);
        $num_unique_chars = sizeof(array_unique($chars));
        $strength += $num_unique_chars * 2;
        if ($strength < 16) return 1;
        elseif ($strength >= 16 && $strength < 24) return 2;
        elseif ($strength >= 24 && $strength < 30) return 3;
        else return 4;

    }

    public function calculate()
    {
        switch ($this->level) {
            case 1:
                $passStrength = $this->level1($this->data);
                return (int)($passStrength*2.5); // Good enough for demo
                break;
            case 2:
                break;
            case 3:
                break;
        }
        return "";
    }

    public function __toString()
    {
        return (string)$this->calculate();
    }

}
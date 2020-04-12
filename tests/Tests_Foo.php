<?php
class Tests_Foo {
    public static function tests() {
        return [
            [true, true, "True  is true"],
            [true, false, "true is not false"],
            [1,"1", "Number 1 is not String 1"]
        ];
    }
}
<?php

class FooBar {
    public function __construct($a, $b) {
        parent::__construct($a, $b);
    }
}

class BarFoo {
    public function __construct($a, $b) {
        parent::__construct($a, 'XML', $b);
    }
}

class Foo {
    public function export($a, $b = null) {
        return parent::export($a, $b);
    }
}

class Bar {
    public function export($a, $b = null) {
        return parent::export($a);
    }

    public function ignoreNoParent($a, $b) {
        return $a + $b;
    }

    public function differentParentMethod($a, $b) {
        return parent::anotherMethod($a, $b);
    }

    public function methodCallWithExpression($a, $b) {
        return parent::methodCallWithExpression(($a + $b), ($b));
    }

    public function uselessMethodCallWithExpression($a, $b) {
        return parent::uselessMethodCallWithExpression(($a), ($b));
    }

    public function contentAfterCallingParent() {
        parent::contentAfterCallingParent();

        return 1;
    }

    public function ignoreNoParentVoidMethod($a, $b) {
        $c = $a + $b;
    }

    public function modifiesParentReturnValue($a, $b) {
        return parent::modifiesParentReturnValue($a, $b) + $b;
    }

    public function uselessMethodCallTrailingComma($a) {
        return parent::uselessMethodCallTrailingComma($a,);
    }

    public function differentParameterOrder($a, $b) {
        return parent::differentParameterOrder($b, $a);
    }

    public function sameNumberDifferentParameters($a, $b) {
        return parent::sameNumberDifferentParameters($this->prop[$a], $this->{$b});
    }
}

abstract class AbstractFoo {
    abstract public function sniffShouldBailEarly();
}

interface InterfaceFoo {
    public function sniffShouldBailEarly();
}

trait TraitFoo {
    abstract public function sniffShouldBailEarly();
}

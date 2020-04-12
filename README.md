# quicktests
Quick PHP Unit Tests

### Installation
**composer** require thipages\quicktests

### Usage of QTests class
#### through the following static method
```php
    test  ($qTestsOrList, $htmlOutput=false, $idFilter=null)
```

#### Example
```php
  $html=QTests::test(Tests_Foo::class);
                or
  $html=QTests::test([Tests_Foo1::class,Tests_Foo2::class]);
  
  // where Tests_Foo needs to have s static dataSet() method
  // being an array of tests to perform and containing a 3 items array (actual,expected,description)

  class Tests_Foo {                              // test group Tests_Foo
      public static function dataSet() {
          return [
              [true, true, "True  is true"],      // test 1
              [true, false, "true is not false"], // test 2
              [1,"1", "Number 1 is not String 1"] // test 3
          ];
        }
    }

```


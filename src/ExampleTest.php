<?php
// намеспейс прописываем как указали в composer.json
namespace Shtarev\TestExample;
class ExampleTest
{
    public $testVar = 'Das ist Test';
    
    public function TestFunction()
    {
        return $this->testVar;
    }
}

<?php
// намеспейс прописываем как указали в composer.json
namespace Shtarev\TestExample;
class ExampleClass
{
    public $testVar = 'Das ist Test';
    
    public function TestFunction()
    {
        return $this->testVar;
    }
}

# InstanceMonitor: Bundle für Pimcore
---
1. **composer config repositories.paketexample vcs https://github.com/Shtarev/InstanceMonitor**
2. **composer require shtarev/instancemonitor:dev-main**
3. **composer update**

## In Controller:
<pre>
namespace App\Controller;

use App\Controller\FrontendController;
use Symfony\Component\Routing\Annotation\Route;
use Shtarev\InstanceMonitor\InstanceMonitorPimcore;
use Symfony\Component\HttpFoundation\JsonResponse;


class TestController extends FrontendController
{
    /**
     * @Route("/test", name="test")
     */
    public function test(): JsonResponse
    {
        return ExampleClass::testFunction();
    }
}
</pre>

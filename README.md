# InstanceMonitor: Bundle for Pimcore
---
1. **composer config repositories.instancemonitor vcs https://github.com/Shtarev/InstanceMonitor**
2. **composer require shtarev/instancemonitor:dev-main** or **composer require shtarev/instancemonitor:dev-master** - depending on the main branch(here is main)
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
        return InstanceMonitorPimcore::execute();
    }
}
</pre>

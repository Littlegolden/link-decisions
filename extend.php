<?php

/*
 * Link decisions is a Flarum extension created by Billy Wilcosky.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For instructions, please view the README file.
 */

namespace ZerosOnesFun\LinkDecisions;

use Flarum\Extend;
use ZerosOnesFun\LinkDecisions;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->content(LinkDecisions\Listeners\AddAssets::class),
    (new Extend\Locales(__DIR__ . '/locale'))
];

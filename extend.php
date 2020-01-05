<?php

/*
 * Link decisions is a Flarum extension created by Billy Wilcosky.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For instructions, please view the README file.
 */

use Flarum\Extend;
use Flarum\Frontend\Document;

return [
    (new Extend\Frontend('forum'))
        ->content(function (Document $document) {
 $document->head[] = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">';
 $document->foot[] = <<<HTML
<script>
  flarum.core.compat.extend.extend(flarum.core.compat['components/CommentPost'].prototype, 'config', function(output, isInitialized, context) {
    if (context.custommExtLastContentHtml !== context.contentHtml) {
$('.Post-body a').on('click',function(){

var getLink = $(this).attr('href');

swal({
  title: 'This link will open in a new tab/window.',
  text: 'No thanks, <a href="' + getLink + '" target="_self">open in current tab</a>.',
  html: true,
  type: "warning",
  confirmButtonColor: '#2ecc71',
  showCancelButton: true,
  showConfirmButton: true,
},function(){

window.open(getLink,'_blank')

});

return false;

});
    }
    context.custommExtLastContentHtml = context.contentHtml;
  });
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
HTML;
        })
];

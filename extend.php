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
 $document->head[] = '<link rel="stylesheet" href="/assets/extensions/zerosonesfun-link-decisions/sweetalert.css">';
 $document->foot[] = <<<HTML
<script>
  flarum.core.compat.extend.extend(flarum.core.compat['components/CommentPost'].prototype, 'config', function(output, isInitialized, context) {
    if (context.custommExtLastContentHtml !== context.contentHtml) {

      $('a').filter(function() {
        return this.hostname && this.hostname !== location.hostname; 
        }).addClass('External-link');

      $('a[href$=".mp3"], a[href$=".ogg"], a[href$=".wav"], a[href$=".mp4"], a[href$=".m4a"], a[href$=".acc"], a[href$=".opus"], a[href$=".flac"]').filter(function() {
        return this.hostname && this.hostname !== location.hostname; 
        }).removeClass('External-link');

      $('.External-link').on('click',function(){

        var getLink = $(this).attr('href');

        swal({
                title: 'This link will open in a new tab.',
                text: 'No thanks, <a href="' + getLink + '" target="_self">open in current tab</a>.',
                html: true,
                type: "warning",
                confirmButtonColor: '#2ecc71',
                confirmButtonText: "OK, Go!",
                cancelButtonText: "Cancel",
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

<script src='/assets/extensions/zerosonesfun-link-decisions/sweetalert.js'></script>
HTML;
        })
];

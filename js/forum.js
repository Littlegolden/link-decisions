import app from 'flarum/app';
import { extend } from 'flarum/extend';
import CommentPost from 'flarum/components/CommentPost';
import swal from '../assets/sweetalert.min';

const localePrefix = 'zerosonesfun-link-decisions.forum.';


app.initializers.add('zerosonesfun-link-decisions', () => {
  extend(CommentPost.prototype, 'config', function(output, isInitialized, context) {
    if (context.custommExtLastContentHtml !== context.contentHtml) {
      $('a').filter(function() {
        return this.hostname && this.hostname !== location.hostname;
      }).addClass('External-link');
      $('a[href$=".mp3"], a[href$=".ogg"], a[href$=".wav"], a[href$=".mp4"], a[href$=".m4a"], a[href$=".acc"], a[href$=".opus"], a[href$=".flac"]').filter(function() {
        return this.hostname && this.hostname !== location.hostname;
      }).removeClass('External-link');
      $('.External-link').on('click', function() {
        var getLink = $(this).attr('href');
        swal({
          title: app.translator.trans(localePrefix + 'title'),
          text: app.translator.trans(localePrefix + 'noThanks') + 
                  '<a href="' + getLink + '" target="_self">' + 
					app.translator.trans(localePrefix + 'openInCurrentTabText') + 
                  '</a>',
          html: true,
          type: "warning",
          confirmButtonColor: '#2ecc71',
          confirmButtonText: app.translator.trans(localePrefix + 'confirmButtonText'),
          cancelButtonText: app.translator.trans(localePrefix + 'cancelButtonText'),
          showCancelButton: true,
          showConfirmButton: true,
        }, function() {
          window.open(getLink, '_blank')
        });
        return false;
      });
    }

    context.custommExtLastContentHtml = context.contentHtml;
  });
});

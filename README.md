# Link Decisions

A [Flarum](http://flarum.org) extension which lets people choose how to open links within post content in a cool way. Sure, one could right click and choose, "open in new window," but where's the fun in that? :) Plus, just in case someone is visiting your forum and they truly don't realize how to open links in new tabs, or they aren't really thinking about it but deep down they would prefer this behavior, this helps them out with that.

### Installation

```sh
composer require zerosonesfun/link-decisions
```

### Extra
Add this to your Custom CSS (admin appearance page) to add an external link icon at the end of external links. *Important:* Replace mysite.com with your domain name. (Thanks @UaMV for posting this tip long ago [here](https://discuss.flarum.org/d/1645-external-link-styling).

~~~
a[href*="//"]:not([href*="mysite.com"]) {
    position: relative;
}    
a[href*="//"]:not([href*="mysite.com"]):after {
    content: "\f35d";
    font-family: "Font Awesome 5 Free";
    position: relative;
    top: -.4em;
    padding: 0 .4em;
    font-size: 70%;
}
~~~

### Updating

```sh
composer update zerosonesfun/link-decisions
php flarum cache:clear

deactivate and reactive the extension
```

### Removing

```sh
composer remove zerosonesfun/link-decisions

go to your public assets folder, find this extension's assets, delete the folder
```

### Links

- [Packagist](https://packagist.org/packages/zerosonesfun/link-decisions)
- [GitHub](https://github.com/zerosonesfun/link-decisions)

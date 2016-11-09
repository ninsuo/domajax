domajax.fuz.org
===========

Welcome to Domajax repository.

---

If you are looking for the domajax plugin, you can directly click [here](https://raw.githubusercontent.com/ninsuo/domajax/master/js/jquery.domajax.js).

If you want to read the documentation for that plugin, go to [http://domajax.fuz.org](http://domajax.fuz.org).

If you want to contribute to domajax, you're in the right place.

---

This repository contains the whole domajax.com's website. If you want to add new options to domajax, you'll also need to add their documentation. This readme will help you to install the project and develop new features.


Installation
------------

You need to install apache2 and php with some libraries to make Symfony2 work. If you're a linux user, you can do:

    apt-get install apache2 php5 php5-cli php5-intl php5-xcache php5-mysql

Then, download the project:

```
cd /var/www/
mkdir domajax
cd domajax
git clone https://github.com/Ninsuo/domajax.git .
php -r "readfile('https://getcomposer.org/installer');" | php
php composer.phar update
```

Composer will ask you some configuration, press enter each time to keep default values.
If you are using other symfony2 project, just set a different "secret" parameter.

To test the configuration, you can run:

```
php app/check.php
```

And try to go to http://localhost/domajax/web/app.php

Congratulations, you have now a working copy of domajax.com!

---

Add new features to Domajax
--------------------------

The jquery plugin `jquery.domajax.js` is divided into 2 main parts:

- options initialization
- options processing

Code will speak better than me, so I let you check it out yourself in `web/js/domajax/jquery.domajax.js`

---

When you'll be done with your new feature, you'll need to write its documentation.

In this sample, you're writting the `data-script` option, **you'll need to replace this name by yours**. You can check how this documentation page looks [here](http://domajax.fuz.org/documentation/data-script).

#### Configuration

- In `app/config/domajax.yml`, you need to add your new option or your new event:

For an option:
```
    domajax-options:
      # ...
      data-script:
        description: Executes given javascript code when an event occurs.
        see-also: [data-callback, data-confirm]
```

The `name` (here, `data-script`) is the technical name

The `description` should describe the new option very quickly, it will be displayed in menus and table of contents.

The `see-also` should contain related options, separated with a comma ( , ), and encapsulated between square brackets (  [ ] ).

For an event:
```
    domajax-events:
      # ...
      event-click:
        title: Ajax when clicking elements (buttons, links...)
        description: A common way to run ajax calls is to click on links, buttons, or even a div element.
```

The `title` should describe the event very quickly, it will be displayed in menus and table of contents.

The `description` will be used as subtitle below the title in the documentation page.

---

#### Documentation

- In `src/Fuz/DomAjaxBundle/Resources/views/Code/data-script.html.twig`, you need to write the documentation.

Don't hesitate to copy/paste an existing sample to avoid HTML matters.

You can [see the data-script example here](https://github.com/Ninsuo/domajax/blob/master/src/Fuz/DomAjaxBundle/Resources/views/Code/data-script.html.twig).

---

#### Declare samples

- In `src/Fuz/DomAjaxBundle/Resources/views/Samples/data-script.html.twig`, you need to configure live demonstrations.

The syntax is the following:

```
{# src/DomAjaxBundle/Resources/views/Samples/data-script.html.twig #}
{% import 'FuzDomAjaxBundle:Default:macros.html.twig' as macros %}

{{
    macros.demos_tabs('data-script', [
        {
            'title': 'Alert!',
            'content': macros.demo_tabs('script-alert', true, 'php'),
        },
        ...
    ])
}}
```

`title` is the one displayed at the left side of the "live examples" tabs.

`content` is a function that takes 3 arguments:

a) the demo name (here, `script-alert`): this name is used for file names stored in `web/demos`.

There are two files required for a new demonstration:

- the view, `script-alert-view.html`, [like this](https://github.com/Ninsuo/domajax/blob/master/web/demo/script-alert-view.html), that contains the html code with the domajaxed form.

- the handler, `script-alert-handler.php`, [like this](https://github.com/Ninsuo/domajax/blob/master/web/demo/script-alert-handler.php), to process the form.

b) a boolean, that tells if the "This code looks like this: " pane should be displayed or not.

The displayed code below "This code looks like this" is taken from the view, between `<!-- demo starts here -->` and `<!-- demo ends here -->` strings.

c) the demo view's file extension (if unset, 'html').

Sometimes, you need create a view in php (to include the handler who generates a table for example), use this last parameter to do it.

You can [see the data-script example here](https://github.com/Ninsuo/domajax/blob/master/src/Fuz/DomAjaxBundle/Resources/views/Samples/data-script.html.twig).


---

#### Develop samples

- You now need to create your samples.

For each one:

a) create the view: web/demos/script-alert-view.html [see example](https://github.com/Ninsuo/domajax/blob/master/web/demo/script-alert-view.html)

b) create the handler: web/demos/script-alert-handler.php [see example](https://github.com/Ninsuo/domajax/blob/master/web/demo/script-alert-handler.php)

You don't have the choice for the `-view` and `-handler` suffixes, as they are automatically generated.

---

License
---

Domajax is released in the same way as [jQuery fundation projects](https://jquery.org/license/).

Source code :

Domajax is released under the terms of the [MIT license](http://en.wikipedia.org/wiki/MIT_License).
The MIT License is simple and easy to understand and it places almost no restrictions on what you can do with domajax.
You are free to use domajax in any project (even commercial projects) as long as the copyright header is left intact.

Samples code :

All demos and examples, whether in a code project's repository or displayed on this website, are released under the terms of
[CC0](http://en.wikipedia.org/wiki/CC0#Zero_.2F_Public_domain"). CC0 is even more permissive than the MIT license, allowing you to
use the code in any manner you want, without any copyright headers, notices, or other attribution.

Web site :

Contents on domajax web site are released under the terms of the [MIT license](http://en.wikipedia.org/wiki/MIT_License).

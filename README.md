Void
====

* **Void** is a website creation tool (aka CMS).
* Both **static pages** and **blog articles** are possible with [Void](https://gget.it/void/).
* Void pages and blog articles can use (a subset of ?) the [Markdown language](https://guides.github.com/features/mastering-markdown/).

About
----

The core is done in a single PHP file of less than 100 lines of code. Huh, this is bad? See the discussion [here](https://gget.it/void/article/03).
What about performance? See [here](https://gget.it/void/article/05-perf).

Screenshot
----

[![screenshot](https://cloud.githubusercontent.com/assets/2995044/25306550/0b8d5c20-27ad-11e7-818a-aefd1897eca3.png)](https://gget.it/void/demo/)

Credits
----

* Author: Joseph Ernest ([@JosephErnest](http:/twitter.com/JosephErnest))
* Author: Ap.Muthu ([@apmuthu](http://www.gnuacademy.org))

License
----

**Void** uses the [Parsedown](http://github.com/erusev/parsedown) library, licensed under MIT license.

FAQ
----

#### Question: How to display a menu name that is different from the page TITLE?

This version now sports the ALIAS directive which can be used in pages where a different language / name is different from the page TITLE.

#### Question: How to add automatic code highlighting in articles / pages?

Use the library `highlight.js` by adding these three lines in the `<header>` part of `index.php`:

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.5/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.5/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

#### Question: How to count the number of unique visitors per day (analytics)?

[See this blog article](https://gget.it/void/article/simpleanalytics).

#### Question: How to display user variables?

The **02-about.txt** page has sample code to access the `$void_config` array elements that can be set in the `site_vars.php` file.
They can be displayed in content files by wrapping the keys in double curly braces like `{{varname}}` where `varname` is a case sensitive key in the said array.
The default parameters (spaces inside the curly braces should not be there in actual usage) are:
{{ 0 }} => $sitename
{{ 1 }} => Date like `Friday 9th of October 2015`
{{ Webmaster }}
{{ IP }} => The client IP
You can add your own unique key/value pairs to the array and reference them in your content pages.

#### Question: Are there Markdown parsers other than Parsedown used here?

Yes, one such parser is [CommonMark](https://github.com/jgm/CommonMark).

#### Question: How do we change the colour of the links by default in black / grey in the body content?

Line 24 of `style.css` by default which begins with `a { color: black;` can be altered with `a { color: #1155FF;`

#### Question: How do we remove border on tables?

Comment out the following lines in `style.css`:
````
/*
table { border-collapse: collapse; }
table, th, td { border: 1px solid #a9a9a9; }
*/
````

#### Question: How do we use a header image

Use the `$site_header` example for image in the file `site_vars.php` and replace the `.logo` css lines in `style.css` with:
````
.logo { text-align: center; margin-top: 0.3em; }
.logo a { background-color: white; color: black; padding: 0.2em 0.2em; font-size: 1.4em; }
.logo a:hover { color: red; }
````

#### Question: How do we use a background colour for header logo image

Replace the `.logo` css lines in `style.css` with:
````
.logo { float: left; margin-top: 0.3em; background-color: #2980b9; }
.logo a { background-color: #2980b9; color: black; padding: 0.2em 0.2em; font-size: 1.4em; }
.logo a:hover { color: red; }
````

#### Question: How do we enter comments in markdown code in pages and articles?

Use one of the following constructs:
````
[//]: # "Comment"
or
[//]: # (Comment) 
````

#### Question: Firefox is very slow on http when there is no https
* [Firefox 80: HTTPS-only Mode in Settings](https://www.ghacks.net/2020/07/11/firefox-80-https-only-mode-in-settings/) - July 2020
* [Firefox 91 introduces HTTPS by Default in Private Browsing](https://blog.mozilla.org/security/2021/08/10/firefox-91-introduces-https-by-default-in-private-browsing/) - August 2021
* Void CMS is affected by the above and hence the follow settings in `about:config` are in order to mitigate it:
````
dom.security.https_first - false
dom.security.https_first_pbm - false
````

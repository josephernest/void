Void
====

* **Void** is a website creation tool (aka CMS).
* Both **static pages** and **blog articles** are possible with [Void](http://www.thisisvoid.org/).
* Void pages and blog articles can use (a subset of ?) the [Markdown language](https://guides.github.com/features/mastering-markdown/).

The core is done in a single PHP file of less than 100 lines of code. Huh, this is bad? See the discussion [here](http://thisisvoid.org/article/03).
What about performance? See [here](http://thisisvoid.org/article/05-perf).

Screenshot
----

[![screenshot](http://gget.it/9p7avesy/1.jpg)](http://www.thisisvoid.org/demo/)

Abouts
----

Author: Joseph Ernest ([@JosephErnest](http:/twitter.com/JosephErnest))
Author: Ap.Muthu ([@apmuthu](http://www.gnuacademy.org))

Credits
----

**Void** uses the [Parsedown](http://github.com/erusev/parsedown) library, licensed under MIT license.

License
----
MIT license

FAQ
----

####Question: How to add automatic code highlighting in articles / pages?

Use the library `highlight.js` by adding these three lines in the `<header>` part of `index.php`:

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.5/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.5/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

####Question: How to count the number of unique visitors per day (analytics)?

[See this blog article](http://www.thisisvoid.org/article/simpleanalytics).

####Question: How to display user variables?

The **02-about.txt** page has sample code to access the `$void_config` array elements that can be set in the `site_vars.php` file.
They can be displayed in content files by wrapping the keys in double curly braces like `{{varname}}` where `varname` is a case sensitive key in the said array.
The default parameters (spaces inside the curly braces should not be there in actual usage) are:
{{ 0 }} => $sitename
{{ 1 }} => Date like `Friday 9th of October 2015`
{{ Webmaster }}
{{ IP }} => The client IP
You can add your own unique key/value pairs to the array and reference them in your content pages.

####Question: Are there Markdown parsers other than Parsedown used here?

Yes, one such parser is [CommonMark](https://github.com/jgm/CommonMark).

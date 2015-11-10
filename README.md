Void
=============

**Void** is a website creation tool. Just static pages or blog articles? Both are possible with [Void](http://www.thisisvoid.org/).

The core is done in a single PHP file of less than 100 lines of code. Huh, this is bad? See the discussion [here](http://thisisvoid.org/article/03).
What about performance? See [here](http://thisisvoid.org/article/05-perf).

Screenshot
----

[![screenshot](http://gget.it/9p7avesy/1.jpg)](http://www.thisisvoid.org/demo/)

About
----

Author: Joseph Ernest ([@JosephErnest](http:/twitter.com/JosephErnest))

Credit
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

Change Log
----

[2015-9-29] Fix an XSS vulnerability by [this commit](https://github.com/josephernest/void/commit/de04f3cd75f806468c8cd4826bd515f81f4de074).

An update to the latest version is recommended.
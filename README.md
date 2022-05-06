Any csv loader (WIP)
==============
Loading data from any csv to database table

I build this as necessity, because we constantly needed to load different csv files, or only specific rows or columns
from those files.

And constantly building different loaders or adding options or array of columns to load was pain, so I added interface
for other employees (users) to use this without programmers intervention or necessity to know how to code or adjust classes with maps

Currently, in process of porting it into this module, refactoring code and improving user experience.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist matejch/yii2-any-csv-loader "*"
```

or add

```
"matejch/yii2-any-csv-loader": "*"
```

to the require section of your `composer.json` file.


Setup
-----

Usage
----
# Laravel Markdown and Markdown Extra

Laravel Service Provider -- for [Parser for Markdown and Markdown Extra](https://github.com/michelf/php-markdown)

This Package will Add Laravel View Extension to Handle the Markdown language Files which ended with extension  `.md`,
When This Package is installed we can add markdown language files to the view folder , and it will be compiled easily
   
## Installation

Add to the composer.json file the following line :
 
 For Laravel-4 
`"johntaa/markdown":"0.1.0"`

For Laravel-5
`"johntaa/markdown":"1.0.1"`


In app.php add the following line to the service providers array :

`'Johntaa\Markdown\MarkdownServiceProvider'`

Thats All;

## How to Use  it

Laravel will bind  md extension to the Parser library, So when you want to view .md file, you
only need to add the .md file to your view folder and to the View::make .

> Notice : You Can Include the markdown file within a blade template file @include('test') and will be parsed inside
 the blade file .

## Example:

in views folder we have a file called `test.md `, And in route function we reach the file 
using the following code:

	 Route::get('testmdfile',function(){
	 return View::make('test');
	   });
	   
	   
testmdfile just a route you can choose your own route .

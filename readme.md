# Laravel Markdown and Markdown Extra

Laravel 4.1 Markdown Parser Depends on Michel Fortin's Parser for Markdown and Markdown Extra

   
## Installation

In app.php add the following line to the service providers array :

`'Johntaa\Markdown\MarkdownServiceProvider'`

Thats All;

## How to Use  it

Laravel will bind  md extension to the Parser library, So when you want to view .md file, you
only need to add the .md file to your view folder and to the View::make .

## Example:

in views folder we have a file called `test.md `, And in route function we reach the file 
using the following code:

	 Route::get('testmdfile',function(){
	 return View::make('test');
	   });
	   
	   
testmdfile just a route you can choose your own route .
<?php namespace Johntaa\Markdown;
	 
	 use Illuminate\Contracts\View\Engine as Engine;

	 class MarkdownEngine  implements Engine
	 {
		 protected $parser;
		 public function __construct($parser = 'markdown')
		 {
			  
			 $this->parser = $parser;
		 }
		 public function get($path, array $data = [])
		 {  
			 return $this->parser->transform( file_get_contents($path) );
		 }
	 }
<?php namespace Johntaa\Markdown;

use Illuminate\Support\ServiceProvider;
 
class MarkdownServiceProvider extends ServiceProvider {

	/**
	* Indicates if loading of the provider is deferred.
	*
	* @var bool
	*/
	protected $defer = false;
 
	public function boot(){ 
     
      $this->package('johntaa/markdown');
        
     
		}
	
		
	/**
	* Register the service provider.
	*
	* @return void
	*/
	public function register()
	{
		list($app, $view) = array($this->app, $this->app['view']);
		 
		$app->singleton('markdown', 'Johntaa\Markdown\MarkdownExtraParser');

		$view->addExtension('md', 'markdown', function() use ($app) {
			return new MarkdownEngine($app['markdown']);
		});

		 }
		
 
		/**
	* Get the services provided by the provider.
	*
	* @return array
	*/
		public function provides()
		{
			return array('markdown');
		}

	}

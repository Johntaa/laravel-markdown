<?php namespace Johntaa\Markdown;

use Illuminate\View\ViewServiceProvider;
use Michelf;
use Illuminate\View\Engines\EngineResolver;
use Johntaa\Markdown\MarkdownEngine;
 

class MarkdownServiceProvider extends ViewServiceProvider {

	/**
	* Indicates if loading of the provider is deferred.
	*
	* @var bool
	*/
	protected $defer = false;
 
	public function boot(){  }
	
		
	/**
	* Register the service provider.
	*
	* @return void
	*/
	public function register()
	{
	  list($app, $view) = array($this->app, $this->app['view']);
		  
        $app->singleton('markdown', 'Michelf\MarkdownExtra');
		$this->app->view->addExtension('md', 'markdown', function() use ($app) {
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
		
		
		 /**
     * Register the engine resolver instance.
     *
     * @return void
     */
    public function registerEngineResolver()
    {
        $this->app->singleton('view.engine.resolver', function () {
            $resolver = new EngineResolver;

            // Next, we will register the various view engines with the resolver so that the
            // environment will resolve the engines needed for various views based on the
            // extension of view file. We call a method for each of the view's engines.
            foreach (['file', 'php', 'blade','md'] as $engine) {
                $this->{'register'.ucfirst($engine).'Engine'}($resolver);
            }

            return $resolver;
        });
    }
	
	    /**
     * Register the file engine implementation.
     *
     * @param  \Illuminate\View\Engines\EngineResolver  $resolver
     * @return void
     */
    public function registerMdEngine($resolver)
    { 
        $resolver->register('md', function() { 
            return new MarkdownEngine();
        });
		
    }


	}

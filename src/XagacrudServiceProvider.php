<?php

namespace xagaroo\xagacrud;

use Illuminate\Support\ServiceProvider;

class XagacrudServiceProvider extends ServiceProvider
{
	/**
	 * Perform post-registration booting of services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadRoutesFrom(__DIR__.'/routes.php');
		
		$this->loadViewsFrom(__DIR__.'/views', 'xagacrud');

		$this->publishes([
			__DIR__.'/assets' => public_path('xagaroo/xagacrud')
		], 'public');

		$this->publishes([
			__DIR__.'/config/xagacrud.php' => config_path('xagacrud.php'),
		], 'config');
	}

	/**
	 * Register any package services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
}
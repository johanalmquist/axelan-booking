$this->app->bind('bookhelper', function()
{
    return new \App\Axebook\BookHelper;
});
<?php
namespace Tests;
use RuntimeException;
use Symfony\Component\Process\Process;
// use Symfony\Component\Process\ProcessBuilder;
trait StartsSelenium
{
    /**
     * The path to the custom standalone selenium server binary.
     *
     * @var string|null
     */
    protected static $seleniumPath;
    /**
     * The path to the custom geckodriver.
     *
     * @var string|null
     */
    protected static $geckoDriverPath;
    /**
     * The selenium server process instance.
     *
     * @var Process
     */
    protected static $seleniumProcess;
    /**
     * Start the selenium server process.
     *
     * @throws RuntimeException if the selenium server or geckodriver file path
     * doesn't exist.
     *
     * @return void
     */
    public static function startSelenium()
    {
        //static::$seleniumProcess = static::buildSeleniumProcess();
        //static::$seleniumProcess->start();
        static::afterClass(function () {
            static::stopSelenium();
        });
    }
    /**
     * Stop the selenium server process.
     *
     * @return void
     */
    public static function stopSelenium()
    {
        if (static::$seleniumProcess) {
            static::$seleniumProcess->stop();
        }
    }
    /**
     * Build the process to run the selenium server.
     *
     * @throws RuntimeException if the selenium server or geckodriver file path
     * doesn't exist.
     *
     * @return Process
     */
    protected static function buildSeleniumProcess() : Process
    {
        // var_dump(__DIR__);
        // exit;
        if (static::$seleniumPath) {
            $seleniumPath = realpath(static::$seleniumPath);
        } else {
            $seleniumPath = realpath(__DIR__ . '/../storage/bin/selenium-server-4.1.2.jar');
        }
        if ($seleniumPath === false) {
            throw new RuntimeException(
                "Invalid path to selenium server [{$seleniumPath}]."
            );
        }
        if (static::$geckoDriverPath) {
            $geckoDriverPath = realpath(static::$geckoDriverPath);
        } else {
            $geckoDriverPath = realpath(__DIR__ . '/../storage/bin/geckodriver');
        }
        if ($geckoDriverPath === false) {
            throw new RuntimeException(
                "Invalid path to geckodriver [{$geckoDriverPath}]."
            );
        }
        // $processBuilder = (new ProcessBuilder())
        //     ->add('java')
        //     ->add("-Dwebdriver.gecko.driver=$geckoDriverPath")
        //     ->add('-jar')
        //     ->add($seleniumPath);
        // if (env('HEADLESS_MODE')) {
        //     $processBuilder->setEnv('DISPLAY', ':10');
        // }
        // return $processBuilder->getProcess();
    }
    /**
     * Set the path to the custom selenium server.
     *
     * @param  string $path
     * @return void
     */
    public static function useSelenium(string $path)
    {
        static::$seleniumPath = $path;
    }
    /**
     * Set the path to the custom gecko driver.
     *
     * @param  string $path
     * @return void
     */
    public static function useGeckoDriver(string $path)
    {
        static::$geckoDriverPath = $path;
    }
}

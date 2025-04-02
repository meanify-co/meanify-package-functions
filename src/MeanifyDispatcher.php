<?php

namespace Meanify\PackageFunctions;

use Composer\InstalledVersions;

class MeanifyDispatcher
{
    public function __call(string $name, array $arguments)
    {
        return MeanifyRegistry::call($name, $arguments);
    }

    /**
     * Global function for meanify-co/laravel-activity-log
     *
     * @return
     */
    public function activityLog()
    {
        if (!InstalledVersions::isInstalled('meanify-co/laravel-activity-log')) {
            throw new \RuntimeException(
                "The package 'meanify-co/laravel-activity-log' must be installed to use meanify()->activityLog()."
            );
        }

        return $this->__call('meanify_activity_log', []);
    }

    /**
     * Global function for meanify-co/meanify-api-resolver
     *
     * @return \Meanify\ApiResolver\Services\ApiResolverService
     */
    public function api(?string $host = null, ?string $api_key = null, array $constant_headers = [])
    {
        if (!InstalledVersions::isInstalled('meanify-co/meanify-api-resolver')) {
            throw new \RuntimeException(
                "The package 'meanify-co/meanify-api-resolver' must be installed to use meanify()->api()."
            );
        }

        return $this->__call('meanify_api_resolver', [$host, $api_key, $constant_headers]);
    }

    /**
     * Global function for meanify-co/meanify-code-review
     *
     * @return
     */
    public function codeReview()
    {
        if (!InstalledVersions::isInstalled('meanify-co/meanify-code-review')) {
            throw new \RuntimeException(
                "The package 'meanify-co/meanify-code-review' must be installed to use meanify()->codeReview()."
            );
        }

        return $this->__call('meanify_code_review', []);
    }

    /**
     * Global function for meanify-co/meanify-support-commands
     *
     * @return
     */
    public function commands()
    {
        if (!InstalledVersions::isInstalled('meanify-co/meanify-support-commands')) {
            throw new \RuntimeException(
                "The package 'meanify-co/meanify-support-commands' must be installed to use meanify()->commands()."
            );
        }

        return $this->__call('meanify_support_commands', []);
    }

    /**
     * Global function for meanify-co/meanify-file-manager
     *
     * @return \Meanify\FileManager\Services\FileManagerService
     */
    public function fileManager(?string $host = null, ?string $api_key = null)
    {
        if (!InstalledVersions::isInstalled('meanify-co/meanify-file-manager')) {
            throw new \RuntimeException(
                "The package 'meanify-co/meanify-file-manager' must be installed to use meanify()->fileManager()."
            );
        }

        return $this->__call('meanify_file_manager', [$host, $api_key]);
    }

    /**
     * Global function for meanify-co/laravel-helpers
     *
     * @return \Meanify\LaravelHelpers\Kernel
     */
    public function helpers()
    {
        if (!InstalledVersions::isInstalled('meanify-co/laravel-helpers')) {
            throw new \RuntimeException(
                "The package 'meanify-co/laravel-helpers' must be installed to use meanify()->helpers()."
            );
        }

        return $this->__call('meanify_helpers', []);
    }

    /**
     * Global function for meanify-co/laravel-notifications
     *
     * @return \Meanify\LaravelNotifications\Support\NotificationBuilder
     */
    public function notifications(string $notification_template_key, object $to_user, ?string $locale = null)
    {
        if (!InstalledVersions::isInstalled('meanify-co/laravel-notifications')) {
            throw new \RuntimeException(
                "The package 'meanify-co/laravel-notifications' must be installed to use meanify()->notifications()."
            );
        }

        return $this->__call('meanify_notifications', [$notification_template_key, $to_user, $locale]);
    }

    /**
     * Global function for meanify-co/laravel-obfuscator
     *
     * @return
     */
    public function obfuscator()
    {
        if (!InstalledVersions::isInstalled('meanify-co/laravel-obfuscator')) {
            throw new \RuntimeException(
                "The package 'meanify-co/laravel-obfuscator' must be installed to use meanify()->obfuscator()."
            );
        }

        return $this->__call('meanify_obfuscator', []);
    }

    /**
     * Global function for meanify-co/laravel-payment-hub
     *
     * @return \Meanify\LaravelPaymentHub\Factory
     */
    public function paymentHub(string $gatewayActiveKey, string $gatewayVersion, string $gatewayEnvironment, array $gatewayParams = [])
    {
        if (!InstalledVersions::isInstalled('meanify-co/laravel-payment-hub')) {
            throw new \RuntimeException(
                "The package 'meanify-co/laravel-payment-hub' must be installed to use meanify()->paymentHub()."
            );
        }

        return $this->__call('meanify_payment_hub', [$gatewayActiveKey, $gatewayVersion, $gatewayEnvironment, $gatewayParams]);
    }

    /**
     * Global function for meanify-co/laravel-permissions
     *
     * @return \Meanify\LaravelPermissions\Support\PermissionManager
     */
    public function permissions(?string $application = null, ?string $source = null, bool $throws = true)
    {
        if (!InstalledVersions::isInstalled('meanify-co/laravel-permissions')) {
            throw new \RuntimeException(
                "The package 'meanify-co/laravel-permissions' must be installed to use meanify()->permissions()."
            );
        }

        return $this->__call('meanify_permissions', [$application, $source, $throws]);
    }
}
